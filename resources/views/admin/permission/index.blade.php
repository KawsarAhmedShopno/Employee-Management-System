@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Permissions</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($pers)>0)
                    @foreach($pers as $key=>$per)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$per->role->name}}</td>
                        <td>
                            @if(isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                            <a href="{{route('permission.edit',[$per->id])}}"><i class="fas fa-edit"></i></a>
                            @endif
                        </td>

                        <td>
                            <form action="{{route('permission.destroy',[$per->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                @if(isset(auth()->user()->role->permission['name']['permission']['can-delete']))
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <td>No permissions to display</td>
                    @endif



                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection