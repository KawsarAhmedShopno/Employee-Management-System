@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Roles</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif


            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>start_from</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Edit</th>


                    </tr>
                </thead>

                <tbody>
                    @if(count($users)>0)
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset('profile')}}/{{$user->image}}" width="100"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id}}</td>
                        <td>{{$user->department_id}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->start_from}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['user']['can-edit']))
                            <a href="{{route('user.edit',[$user->id])}}"><i class="fas fa-edit"></i></a>
                            @endif
                        </td>

                        <td>


                            <form action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                @if(isset(auth()->user()->role->permission['name']['user']['can-delete']))
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                    @endif </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td>No departments to display</td>
                    @endif



                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection