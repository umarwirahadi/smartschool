@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Member') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('member.update',[$member->id])}}" autocomplete="off" id="data-update-member">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="school_id" class="col-sm-3 col-form-label">ID School</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="school_id" name="school_id" value="{{$member->school_id}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="member_name" name="name" value="{{$member->name}}" />
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">email</label>
                            <div class="col-sm-9">
                              <input type="email" readonly class="form-control" id="email" name="email" placeholder="email" value="{{$member->email}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Change Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="password" name="password" placeholder="please fill free if no change password" autocomplete="off">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="role_id" class="col-sm-3 col-form-label">role as</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="role_id" name="role_id">
                                    <option value="1" {{$member->role_id==1?'selected="selected"':''}}>Teacher</option>
                                    <option value="2" {{$member->role_id==2?'selected="selected"':''}}>Student</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="is_actived" class="col-sm-3 col-form-label">status</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="is_actived" name="is_actived">
                                    <option value="1" {{$member->is_actived==1?'selected="selected"':''}}>Active</option>
                                    <option value="0" {{$member->is_actived==0?'selected="selected"':''}}>Inactive</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-sm btn-primary">Update</button>
                              <button onclick="window.location.href='{{route('member.index')}}'" type="button" class="btn btn-sm btn-danger">Back</button>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img class="profile-picture" src="{{asset('storage/images/default-teacher.png')}}" alt="{{env('APP_NAME')}}">
                            <div class="card-body">
                            <div class="justify-content-center">

                                <h4 class="card-title m-0 text-uppercase">{{$member->name}}</h4>
                                <p class="card-text text-danger m-0"><b>{!!$member->role_id==1?'<p class="text-danger">Teacher</p>':'<p class="text-danger">Student</p>'!!}</b></p>
                                <p class="card-text">{{$member->email}}</p>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="inputGroupFile01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                  </div>
                            </div>
                            </div>
                          </div>
                    </div>
                    </div>

                      </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
