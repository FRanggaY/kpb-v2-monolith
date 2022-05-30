<?php

namespace App\Http\Controllers\shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\activity;
use App\Models\advertise;
use App\Models\gallery;


class HomeController extends Controller
{
    public function index(){
        $user_active = User::where('status', 1)->orderBy('created_at', 'DESC')->limit(6)->get();

        $datenow = Carbon::now()->format('Y-m-d');
        $datetomorrow = Carbon::tomorrow()->format('Y-m-d');
        $activity_active_now = activity::where('date', $datenow)->orderBy('created_at', 'DESC')->limit(4)->get();
        $activity_active_tommorow = activity::where('date', $datetomorrow)->orderBy('created_at', 'DESC')->limit(4)->get();

        $advertise_active = advertise::where('status', 1)->orderBy('created_at', 'DESC')->limit(6)->get();
        $gallery_active = gallery::where('status', 1)->orderBy('created_at', 'DESC')->limit(2)->get();

        $datas = [
            'user_active' => $user_active,
            'activity_active_now' => $activity_active_now,
            'activity_active_tommorow' => $activity_active_tommorow,
            'advertise_active' => $advertise_active,
            'gallery_active' => $gallery_active,
        ];

        return view('shared.home', ['datas' => $datas]);
    }
    public function userIndex(){
        $datas = User::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('shared.user', [
            'datas' => $datas->items() ,
            'paginator' => $datas,
        ]);
    }
    public function activityIndex(Request $request){
        $datenow = Carbon::now()->format('Y-m-d');
        $datefilter = $request->query()['date'] ?? $datenow;
        $datas = activity::where('date', $datefilter)->orderBy('created_at', 'DESC')->orderBy('time', 'DESC')->get();

        return view('shared.activity', [
            'datas' => $datas,
            'date' => $datefilter
        ]);
    }
    public function activityDetail($slug){
        $data = activity::where('slug', $slug)->first();
        return view('admin.activity.detail', ['data' => $data]);
    }
    public function advertiseIndex(){
        $datas = advertise::where('status', 1)->with('user')->orderBy('created_at', 'DESC')->paginate(20);
        return view('shared.advertise', [
            'datas' => $datas->items() ,
            'paginator' => $datas
        ]);
    }
    public function galleryIndex(){
        $datas = gallery::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('shared.gallery', [
            'datas' => $datas->items() ,
            'paginator' => $datas
        ]);
    }
    public function contactIndex(){
        return view('shared.contact');
    }
    public function aboutIndex(){
        return view('shared.about');
    }
    public function documentationIndex(){
        return view('shared.documentation');
    }
}
