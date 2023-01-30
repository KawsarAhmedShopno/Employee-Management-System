@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Notices</li>
                </ol>
            </nav>
            @if(count($notices)>0)
            @foreach($notices as $notice)
            <div class="card alert alert-info">
                <div class="card-header alert alert-warning" style="color:black;">{{$notice->title}}</div>

                <div class="card-body" style="color:black;">
                    <p>{{$notice->description}}</p>
                    <p class="badge badge-success" style="color:black;">Data:{{$notice->date}}</p>
                    <p class="badge badge-warning" style="color:black;">Created By:{{$notice->name}}</p>
                </div>
                <div class="card-footer">
                    @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                    <a href="{{route('notice.edit',[$notice->id])}}"><i class="fas fa-edit"></i></a>
                    @endif
                    <span class="float-end">
                        @if(isset(auth()->user()->role->permission['name']['notice']['can-delete']))



                        <form action="{{route('notice.destroy',[$notice->id])}}" method="post">@csrf
                            {{method_field('DELETE')}}
                            @if(isset(auth()->user()->role->permission['name']['notice']['can-delete']))
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endif
                        </form>

                        @endif


                    </span>
                </div>
            </div>
            @endforeach

            @else
            <p>No notices created yet</p>
            @endif

        </div>
    </div>
</div>
@endsection