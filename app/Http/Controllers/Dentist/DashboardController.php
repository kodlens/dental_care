<?php

namespace App\Http\Controllers\Dentist;

use App\Http\Controllers\Controller;
use App\Models\Admit;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('dentist');

    }

    public function index(){
        return view('dentist.dentist-dashboard');
    }


    public function getDashboardInfo(){
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $user = Auth::user();
        $admit = Admit::where('dentist_id', $user->user_id)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $appointment = Appointment::where('dentist_id', $user->user_id)
            ->where('appoint_date', '>=',  Carbon::now()->format('Y-m-d'))
            ->where('appoint_status', '!=', 2)
            ->count();

        return response()->json([
            'admit' => $admit,
            'appointment' => $appointment
        ],200);
    }




}
