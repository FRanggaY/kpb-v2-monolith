<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\advertise;


class AdvertiseController extends Controller
{
    public function index(){
        $datas = advertise::all();
        return view('admin.advertise.index', ['datas' => $datas]);
    }
    public function store(Request $request){
        request()->validate(
            [
                'title' => 'required',

                'image' => 'nullable|file|mimes:jpg,png,jpeg',
                'link' => 'nullable'
        ]);
        if($request->image){
            $random = Str::random(5);
            $file_name = time().''.$random. '.' . $request->image->extension();
            $request->image->move(public_path('images/advertise'), $file_name);
            $path = "images/advertise/$file_name";

            advertise::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'image' => $path,
                'link' => $request->link,
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            advertise::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'link' => $request->link,
                'user_id' => Auth::user()->id
            ]);
        }
        return redirect('dashboard/advertise')->with('success', 'advertise has been created');
    }
    public function edit($slug){
        $data = advertise::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id){
            return view('admin.advertise.edit', ['data' => $data]);
        }
        else{
            return redirect('dashboard/advertise')->with('error', 'You are not authorized to access this page');
        }
    }
    public function detail($slug){
        $data = advertise::where('slug', $slug)->first();
        return view('admin.advertise.detail', ['data' => $data]);
    }
    public function update($id, Request $request){
        $data = advertise::findOrFail($id);
        request()->validate([
                'title' => 'required',
                'image' => 'nullable|file|mimes:jpg,png,jpeg',
                'link' => 'nullable',
        ]);
        if(Auth::user()->id == $data->user_id){
            if($request->image){
                if($data->image){
                    File::delete(public_path($data->image));
                }
                $random = Str::random(5);
                $file_name = time().''.$random. '.' . $request->image->extension();
                $request->image->move(public_path('images/advertise'), $file_name);
                $path = "images/advertise/$file_name";

                $data->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-'),
                    'image' => $path,
                    'link' => $request->link
                ]);
            }
            else{
                $data->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title, '-'),
                    'link' => $request->link
                ]);
            }
        }
        else{
            return redirect('dashboard/advertise')->with('error', 'You are not authorized to access this page');
        }
    }
    public function destroy($slug){
        $data = advertise::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id || Auth::user()->role == 'admin'){
            $data->delete();
            if($data->image){
                File::delete(public_path($data->image));
            }
            return redirect('dashboard/advertise')->with('success', 'Advertise has been deleted');
        }
        else{
            return redirect('dashboard/advertise')->with('error', 'You are not authorized to access this page');
        }
    }
    public function changeStatus($slug){
        $data = advertise::where('slug', $slug)->first();
        if($data->status == 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update([
            'status' => $data->status
        ]);
        return redirect('dashboard/advertise')->with('success', 'advertise status has been updated');
    }
}
