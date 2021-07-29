@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                    <p>Welcome, {{Auth::user()->name??''}} </p>
                    @if (Auth::guard('member')->check())
                        You are logged in as a {{Auth::user()->role_id==1?'Teacher':'Student'}} of {{Auth::user()->school_name->school_name}}
                        @endif
                    </div>
                    <div class="col-md-8">
                        @if(Auth::user()->role_id==1)
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="pill" href="#teacher">Teacher</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="pill" href="#student">Student</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div id="teacher" class="container tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex flex-row">
                                            <div class="p-2 mr-auto"><p class="text text-primary">List of Teachers</p></div>
                                            <div class="p-2"><p class="text-primary">Count : {{$teacher->total()}}</p></div>
                                          </div>
                                    </div>
                                    </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                  <th>Name</th>
                                                  <th>Email</th>
                                                  <th>Status</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tbody>@if ($teacher->count()>0)
                                                    @foreach ($teacher as $item)
                                                    <tr>
                                                      <td>{{$item->name}}</td>
                                                      <td>{{$item->email}}</td>
                                                      <td>{!!$item->is_actived==1?'<p class="text-success">Active</p>':'<p class="text-danger">Inactive</p>'!!}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                      <td colspan="3">No teacher available!</td>
                                                    </tr>
                                                    @endif
                                                  </tbody>
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div id="student" class="container tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex flex-row">
                                            <div class="p-2 mr-auto"><p class="text text-primary">List of Students</p></div>
                                            <div class="p-2"><p class="text-primary">Count : {{$student->total()}}</p></div>
                                          </div>
                                    </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                      <th>Name</th>
                                                      <th>Email</th>
                                                      <th>Status</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>@if ($student->count()>0)
                                                    @foreach ($student as $item)
                                                    <tr>
                                                      <td>{{$item->name}}</td>
                                                      <td>{{$item->email}}</td>
                                                      <td>{!!$item->is_actived==1?'<p class="text-success">Active</p>':'<p class="text-danger">Inactive</p>'!!}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                      <td colspan="3">No student available!</td>
                                                    </tr>
                                                    @endif
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                          </div>
                          @else
                          <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row">
                                    <div class="p-2 mr-auto"><p class="text text-primary">List of Students</p></div>
                                    <div class="p-2"><p class="text-primary">Count : {{$student->total()}}</p></div>
                                  </div>
                            </div>
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>@if ($student->count()>0)
                                            @foreach ($student as $item)
                                            <tr>
                                              <td>{{$item->name}}</td>
                                              <td>{{$item->email}}</td>
                                              <td>{!!$item->is_actived==1?'<p class="text-success">Active</p>':'<p class="text-danger">Inactive</p>'!!}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                              <td colspan="3">No student available!</td>
                                            </tr>
                                            @endif
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                          @endif
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
