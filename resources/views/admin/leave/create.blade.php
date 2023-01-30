@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Leave Form

            </li>
        </ol>
    </nav>
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <form action="{{route('leave.store')}}" method="post" enctype="multipart/form-data">@csrf

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Leave</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>From date</label>
                            <input name="from" type="date" class="form-control @error('from') is-invalid @enderror" placeholder="dd-mm-yyyy" required="" id="datepicker">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To date</label>
                            <input name="to" type="date" class="form-control @error('to') is-invalid @enderror" placeholder="dd-mm-yyyy" required="" id="datepicker">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of Leave</label>
                            <select class="form-control" name="type" required="">

                                <option value="annual">annual</option>
                                <option value="eid">eid</option>
                                <option value="sick">sick</option>
                                <option value="festive">festive</option>
                                <option value="relex">relex</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" required=""></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                    </div>

                </div>
                <br>
                <div class="form-group">
                    @if(isset(auth()->user()->role->permission['name']['leave']['can-add']))
                    <button class="btn btn-primary " type="submit">Submit</button>
                    @endif
                </div>
            </div>

        </div>
    </form>
</div>

@endsection