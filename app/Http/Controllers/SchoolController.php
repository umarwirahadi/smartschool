<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{

    public function index()
    {
        $teacher=Member::where('school_id',Auth::user()->school_id)->where('role_id','1')->paginate(5);
        $student=Member::where('school_id',Auth::user()->school_id)->where('role_id','2')->orWhere('role_id','3')->paginate(5);
        return view('school.index',compact('teacher','student'));
    }
}
