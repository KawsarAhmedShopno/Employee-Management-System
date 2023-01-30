@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Notice

            </li>
        </ol>
    </nav>
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <form action="{{route('notice.update')}}" method="post" enctype="multipart/form-data">@csrf

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Notice</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" value="{{$notice->title}}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="dd-mm-yyyy" required="" id="datepicker">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" required="">{{$notice->date}} </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>From date</label>
                            <input name="fdate" value="{{$notice->date}}" type="date" class="form-control @error('fdate') is-invalid @enderror" placeholder="dd-mm-yyyy" required="" id="datepicker">
                            @error('fdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Created By</label>
                            <select class="form-control" name="type" required="">

                                <option value="{{auth()}->user()->name}}">{{auth()}->user()->name}}</option>



                            </select>
                        </div>

                    </div>

                </div>
                <br>
                <div class="form-group">
                    @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                    <button class="btn btn-primary " type="submit">Update</button>
                    @endif
                </div>
            </div>

        </div>
    </form>
</div>

@endsection