<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\gallery;

class GalleryController extends Controller
{
    public function index(){
        $datas = gallery::all();
        return view('admin.gallery.index', ['datas' => $datas]);
    }
    public function store(Request $request){
        request()->validate(
            [
                'title' => 'required',

                'image' => 'required|file|mimes:jpg,png,jpeg',
        ]);
        if($request->image){
            $random = Str::random(5);
            $file_name = time().''.$random. '.' . $request->image->extension();
            $request->image->move(public_path('images/gallery'), $file_name);
            $path = "images/gallery/$file_name";

            gallery::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'image' => $path,
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            gallery::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'user_id' => Auth::user()->id
            ]);
        }
        return redirect('dashboard/gallery')->with('success', 'gallery has been created');
    }
    public function edit($slug){
        $data = gallery::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id){
            return view('admin.gallery.edit', ['data' => $data]);
        }
        else{
            return redirect('dashboard/gallery')->with('error', 'You are not authorized to access this page');
        }
    }
    public function detail($slug){
        $data = gallery::where('slug', $slug)->first();
        return view('admin.gallery.detail', ['data' => $data]);
    }
    public function update($id, Request $request){
        $data = gallery::findOrFail($id);
        if(Auth::user()->id == $data->user_id){
            if($request->image){
                request()->validate([
                    'title' => 'required',
                    'image' => 'required|file|mimes:jpg,png,jpeg',
                ]);
                if($data->image){
                    File::delete(public_path($data->image));
                }
                $random = Str::random(5);
                $file_name = time().''.$random. '.' . $request->image->extension();
                $request->image->move(public_path('images/gallery'), $file_name);
                $path = "images/gallery/$file_name";

                $data->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-'),
                    'image' => $path,
                ]);
            }
            else{
                request()->validate([
                    'title' => 'required'
                ]);
                $data->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-'),
                ]);
            }
        }
        else{
            return redirect('dashboard/gallery')->with('error', 'You are not authorized to access this page');
        }
    }
    public function destroy($slug){
        $data = gallery::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id || Auth::user()->role == 'admin'){
            $data->delete();
            if($data->image){
                File::delete(public_path($data->image));
            }
            return redirect('dashboard/gallery')->with('success', 'gallery has been deleted');
        }
        else{
            return redirect('dashboard/gallery')->with('error', 'You are not authorized to access this page');
        }
    }
    public function changeStatus($slug){
        $data = gallery::where('slug', $slug)->first();
        if($data->status == 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update([
            'status' => $data->status
        ]);
        return redirect('dashboard/gallery')->with('success', 'gallery status has been updated');
    }
}
