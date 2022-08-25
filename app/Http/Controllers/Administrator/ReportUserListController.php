<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class ReportUserListController extends Controller
{
    //


    public function index(){
        $users = User::orderBy('lname', 'asc')
            ->get();
        
        return view('administrator.report.report-users-list')
            ->with('users', $users);
    }
}
