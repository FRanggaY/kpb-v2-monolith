<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\activity;


class ActivityController extends Controller
{
    public function index(){
        $datas = activity::all();
        return view('admin.activity.index', ['datas' => $datas]);
    }
    public function create(){
        return view('admin.activity.add');
    }
    public function store(Request $request){
        request()->validate(
            [
                'title' => 'required',
                'body' => 'nullable',
                'image' => 'nullable|file|mimes:jpg,png,jpeg',
                // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
                'date' => 'nullable',
                'time' => 'nullable',
        ]);
        if($request->image){
            $random = Str::random(5);
            $file_name = time().''.$random. '.' . $request->image->extension();
            $request->image->move(public_path('images/activity'), $file_name);
            $path = "images/activity/$file_name";

            activity::create([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title, '-'),
                'image' => $path,
                'date' => $request->date,
                'time' => $request->time,
                'user_id' => Auth::user()->id
            ]);
        }
        else{
            activity::create([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title, '-'),
                // 'image' => $request->image,
                'date' => $request->date,
                'time' => $request->time,
                'user_id' => Auth::user()->id
            ]);
        }


        return redirect('dashboard/activity')->with('success', 'Activity has been created');
    }
    public function edit($slug){
        $data = activity::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id){
            return view('admin.activity.edit', ['data' => $data]);
        }
        else{
            return redirect('dashboard/activity')->with('error', 'You are not authorized to access this page');
        }
    }
    public function update($slug, Request $request){
        $data = activity::where('slug', $slug)->first();
        request()->validate(
            [
                'title' => 'required',
                'body' => 'nullable',
                'image' => 'nullable|file|mimes:jpg,png,jpeg',
                // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
                'date' => 'nullable',
                'time' => 'nullable',
        ]);
        if(Auth::user()->id == $data->user_id){
            if($request->image){
                if($data->image){
                    File::delete(public_path($data->image));
                }
                $random = Str::random(5);
                $file_name = time().''.$random. '.' . $request->image->extension();
                $request->image->move(public_path('images/activity'), $file_name);
                $path = "images/activity/$file_name";

                $data->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'slug' => Str::slug($request->title, '-'),
                    'image' => $path,
                    'date' => $request->date,
                    'time' => $request->time,
                ]);
            }
            else{
                $data->update([
                    'title' => $request->title,
                    'body' => $request->body,
                    'slug' => Str::slug($request->title, '-'),
                    'date' => $request->date,
                    'time' => $request->time,
                ]);
            }
            return redirect('dashboard/activity')->with('success', 'Activity has been updated');
        }
        else{
            return redirect('dashboard/activity')->with('error', 'You are not authorized to access this page');
        }
    }
    public function destroy($slug){
        $data = activity::where('slug', $slug)->first();
        if(Auth::user()->id == $data->user_id || Auth::user()->role == 'admin'){
            $data->delete();
            if($data->image){
                File::delete(public_path($data->image));
            }
            return redirect('dashboard/activity')->with('success', 'Activity has been deleted');
        }
        else{
            return redirect('dashboard/activity')->with('error', 'You are not authorized to access this page');
        }
    }
    public function detail($slug){
        $data = activity::where('slug', $slug)->first();
        return view('admin.activity.detail', ['data' => $data]);
    }
}
