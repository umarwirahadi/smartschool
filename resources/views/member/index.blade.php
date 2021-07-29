@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Member') }}</div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addTeacher"><i class="fa fa-envelope"></i> invite member</button>
                    </div>
                </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#home">Teacher</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu1">Student</a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row">
                                <div class="p-2 mr-auto"><h3 class="text text-primary">List of Teachers</h3></div>
                                <div class="p-2"><p class="text-primary">Count : {{$teacher->total()}}</p></div>
                              </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered table-sm list-teacher">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>School name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teacher as $item)
                                              <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->school_name->school_name}}</td>
                                                <td>{!!$item->is_actived==1?'<p class="text-success">Active</p>':'<p class="text-danger">Inactive</p>'!!}</td>
                                                <td>
                                                    <a href="{{route('member.edit',[$item->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-user-edit"></i></a>
                                                    <a href="javascript:void(0)"data-id={{$item->id}} class="btn btn-sm btn-outline-danger remove-teacher"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                              </tr>
                                              @endforeach
                                        </tbody>
                                      </table>
                                      {{$teacher->links()}}
                                </div>
                            </div>
                        </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row">
                                        <div class="p-2 mr-auto"><h3 class="text text-danger">List of Students</h3></div>
                                        <div class="p-2"><p class="text-danger">Count : {{$student->total()}}</p></div>
                                      </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive-sm">
                                            <table class="table table-bordered table-sm list-student">
                                                <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>School name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($student as $item)
                                                          <tr>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->school_name->school_name}}</td>
                                                            <td>{!!$item->is_actived==1?'<p class="text-success">Active</p>':'<p class="text-danger">Inactive</p>'!!}</td>
                                                            <td>
                                                                <a href="{{route('member.edit',[$item->id])}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-user-edit"></i></a>
                                                                <a href="javascript:void(0)" data-id={{$item->id}} class="btn btn-sm btn-outline-danger remove-student"><i class="fa fa-trash-alt"></i></a>
                                                            </td>
                                                          </tr>
                                                          @endforeach
                                                    </tbody>
                                              </table>
                                              {{$student->links()}}
                                        </div>
                                    </div>
                                </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- add modal teacher  --}}
<div class="modal fade" id="addTeacher">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Invitation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form  action="{{route('member.store')}}" id="form-mail-send-teacher" method="POST">
            @csrf
                <div class="form-group mb-2 input-group-sm">
                  <label for="school_name">School name</label>
                  <input type="text" class="form-control" placeholder="School name" name="school_name" id="school_name"  value="{{Auth::user()->school_name}}" readonly/>
                </div>
                <div class="form-group mb-2 input-group-sm">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" placeholder="full name" name="name" id="name" />
                </div>
                <div class="form-group mb-2 input-group-sm">
                  <label for="email">email</label>
                  <input type="email" class="form-control" placeholder="a valid email" name="email" id="email" />
                </div>
                <div class="form-group mb-2 input-group-sm">
                  <label for="role">role</label>
                  <select name="role" id="role" class="form-control">
                    <option value="1">Teacher</option>
                    <option value="2">Student</option>
                    <option value="3">Guest</option>
                  </select>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> send</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> close</button>
                </div>
              </form>
        </div>


      </div>
    </div>
  </div>
{{-- add modal student  --}}
<div class="modal fade" id="addStudent">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">invite student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-send-mail-student">
                <div class="input-group mb-2 input-group-sm">
                  <label for="mailteacher" class="mr-2">email</label>
                  <input type="email" class="form-control" placeholder="a valid email" name="mailstudent" id="mailstudent" />
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-paper-plane"></i> send</button>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> close</button>
        </div>

      </div>
    </div>
  </div>
@endsection
