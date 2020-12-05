@extends('layouts.admin')

@section('bloodgroup_active')
    active
@endsection


@section('admin_content')

    <div class="page-breadcrumb">
        <ol class="breadcrumb container">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('bloodgroup.bloodgroup.index') }}"></a> Bloodgroup Manager </li>
            <li class="active"> Add blood group </li>
        </ol>
    </div>
    <div class="page-title">
        <div class="container">
            <h3> Bloodgroup Manager </h3>
        </div>
    </div>
    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- all error and validation messages here start --}}
                <div>
                    @error('bd')
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    @error('bd_title')
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                {{-- all error and validation messages here end --}}
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add blood group</h3>
                    </div>
                    <div class="panel-body">
                        <br>
                        <p class="text-center">You can add blood groups form this form.</p>
                        <form action="{{ route('bloodgroup.bloodgroup.store') }}" method="post">
                        @csrf
                            <div class="form-group mt-3">
                                <label for="">Blood group title</label>
                                <input type="text" class="form-control" name="bd_title" id="" placeholder="Type blood group title">
                            </div>

                            <div class="form-group">
                                <label for="">Blood group</label>
                                <input type="text" class="form-control" name="bd" id="" placeholder=" Type blood group">
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Add blood group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->


@endsection

