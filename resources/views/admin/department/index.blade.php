@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Departments</li>
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
                    @if(count($depts)>0)
                    @foreach($depts as $key=>$dept)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$dept->name}}</td>
                        <td>{{$dept->description}}</td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
                            <a href="{{route('department.edit',[$dept->id])}}"><i class="fas fa-edit"></i></a>
                            @endif

                        </td>

                        <td>

                            <form action="{{route('department.destroy',[$dept->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                @if(isset(auth()->user()->role->permission['name']['department']['can-delete']))
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
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