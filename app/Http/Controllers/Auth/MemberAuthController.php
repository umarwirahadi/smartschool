<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MemberAuthController extends Controller
{

    public function loginMember()
    {return view('member.login');}
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required',
            'school_id'=>'required'
        ]);
        if (Auth::guard('member')->attempt(['email'=>$credentials['email'],'password'=>$credentials['password'],'school_id'=>$credentials['school_id'],'is_actived'=>'1'])) {
            $request->session()->regenerate();
            return redirect('/account');
        }else{
            return redirect('account/login')->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'school_id' => 'The provided credentials of school ID do not match our records.',
                'password' => 'the password does not match',
                'supended' => 'the password does not match',
            ]);
        }
    }


}

