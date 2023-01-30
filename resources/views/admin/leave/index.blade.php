@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Leaves</li>
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
                        <th>From</th>
                        <th>TO</th>
                        <th>Type od Leave</th>
                        <th>Description</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>


                    </tr>
                </thead>

                <tbody>
                    @if(count($leaves)>0)
                    @foreach($leaves as $key=>$leave)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$leave->user->name}}</td>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}}</td>
                        <td>{{$leave->type}}</td>
                        <td>{{$leave->description}}</td>
                        <td>{{$leave->status}}</td>
                        <td>{{$leave->message}}</td>

                        <td>
                            @if(isset(auth()->user()->role->permission['name']['leave']['can-edit']))
                            <a href="{{route('leave.edit',[$leave->id])}}"><i class="fas fa-edit"></i></a>
                            @endif
                        </td>

                        <td>


                            <form action="{{route('leave.destroy',[$leave->id])}}" method="post">@csrf
                                {{method_field('DELETE')}}
                                @if(isset(auth()->user()->role->permission['name']['leave']['can-delete']))
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