<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\User;
use App\Models\advertise;
use App\Models\activity;

class DashboardController extends Controller
{
    public function index(){
        // user
        $user_total_admin = User::where('role', 'admin')->count();
        $user_total_user = User::where('role', 'user')->count();
        $user_total = $user_total_admin + $user_total_user;

        // gallery
        $gallery_total = gallery::count();
        $gallery_active = gallery::where('status', 1)->count();
        $gallery_unactive = gallery::where('status', 0)->count();

        // advertise
        $advertise_total = advertise::count();
        $advertise_active = advertise::where('status', 1)->count();
        $advertise_data = advertise::where('status', 1)->orderBy('created_at')->limit(6)->get();
        $advertise_unactive = advertise::where('status', 0)->count();

        //activity
        $activity_total = activity::count();
        $activity_today = activity::whereDate('date', now())->limit(4)->get();

        $datas = [
            'user_total' => $user_total,
            'user_total_admin' => $user_total_admin,
            'user_total_user' => $user_total_user,
            'gallery_total' => $gallery_total,
            'gallery_active' => $gallery_active,
            'gallery_unactive' => $gallery_unactive,
            'advertise_total' => $advertise_total,
            'advertise_active' => $advertise_active,
            'advertise_unactive' => $advertise_unactive,
            'advertise_data' => $advertise_data,
            'activity_total' => $activity_total,
            'activity_today' => $activity_today,
        ];

        return view('admin.dashboard.index', ['datas' => $datas]);
    }
}
