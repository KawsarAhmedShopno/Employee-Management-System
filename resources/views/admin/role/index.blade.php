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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>

                <tbody>
                    @if(count($roles)>0)
                    @foreach($roles as $key=>$role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['role']['can-edit']))
                            <a href="{{route('role.edit',[$role->id])}}"><i class="fas fa-edit"></i></a>
                            @endif
                        </td>

                        <td>
                            <form action="{{route('role.destroy',[$role->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                @if(isset(auth()->user()->role->permission['name']['role']['can-delete']))
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                    @endif</button>

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