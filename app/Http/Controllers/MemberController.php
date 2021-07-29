<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher=Member::where('school_id',Auth::user()->id)->where('role_id','1')->paginate(5);
        $student=Member::where('school_id',Auth::user()->id)->where('role_id','2')->orWhere('role_id','3')->paginate(5);
        return view('member.index',compact('teacher','student'));
    }


    public function create()
    {
        return view('member.edit');
    }

    public function store(Request $request)
    {
        if($request->ajax() ){
                $validate=Validator::make($request->all(),[
                    'name'=>'required',
                    'email'=>'required|unique:members',
                    'role'=>'required'
                ]);

                if(!$validate->fails()){
                    $pass=Str::random(8);
                    $newMember=new Member;
                    $newMember->name        =$request->name;
                    $newMember->email       =$request->email;
                    $newMember->password    =Hash::make($pass);
                    $newMember->is_actived  ='1';
                    $newMember->school_id   =Auth::id();
                    $newMember->role_id     =$request->role;
                    $newMember->save();
                    if($newMember){
                        $details=[
                            'title'=>'Smart School invitation',
                            'body'=>'you have invited join to smart school, by click the link below to start your account, here is your account ',
                            'url'=>env('APP_URL','http://localhost').':8000/account',
                            'name'=>$request->name,
                            'username'=>$request->email,
                            'password'=>$pass,
                            'school_id'=>$newMember->school_id,
                            'status'=>$request->role=='1'?'Teacher':'Student',
                            ];

                            try {
                            Mail::to($request->email)->send(new TestMail($details));
                                return response()->json(['message'=>'invitation sent successfully','status'=>'ok']);
                            } catch(\Exception $e){
                                return response()->json(['message'=>'internal server error for sending email '.$e->getMessage(),'status'=>'error']);
                            }
                    }else{
                        return response()->json(['message'=>'internal server error for saving member','status'=>'error']);
                    }

                }else{
                    return response()->json(['message'=>'internal server error','status'=>'error','data'=>$validate->errors()->first()]);
                }

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('member.edit',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */

    public function edit(Member $member)
    {
        return view('member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->name        =$request->name;
        if(!empty($request->password)){
            $member->password    =Hash::make($request->password);
        }
        $member->is_actived  =$request->is_actived;
        $member->role_id     =$request->role_id;
        $member->save();
        if($member){
            return response()->json(['message'=>'member was updated successfully','status'=>'ok']);
        }else{
            return response()->json(['message'=>'member was updated failed','status'=>'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return response()->json(['message'=>'delete member was successfully','status'=>'ok']);

    }

}
