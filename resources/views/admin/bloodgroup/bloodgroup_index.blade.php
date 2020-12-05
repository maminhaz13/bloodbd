@extends('layouts.admin')

@section('bloodgroup_active')
    active
@endsection

@section('admin_content')

    <div class="page-breadcrumb">
        <ol class="breadcrumb container">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active"><a href="{{ route('bloodgroup.bloodgroup.index') }}"></a> Bloodgroup Manager </li>
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
                <div class="panel panel-info">
                    <div class="panel-heading ">
                        <h3 class="panel-title">All blood groups</h3>
                    </div>
                    <div class="panel-body">
                        <p> All blood groups information is here. You can create, edit, delete these information form here.</p>
                    </div>

                    {{-- all error and validation messages here start --}}
                    <div>
                        @if(session('bd_added'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Well done! {{ session('bd_added') }}</strong>
                            </div>
                        @endif

                        @if(session('bd_edited'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Well done! {{ session('bd_edited') }}</strong>
                            </div>
                        @endif

                        @if(session('bd_deleted'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Well done! {{ session('bd_deleted') }}</strong>
                            </div>
                        @endif
                    </div>
                    {{-- all error and validation messages here end --}}

                    <div class="text-right">
                        <a class="btn btn-success btn-rounded text-right" href="{{ route('bloodgroup.bloodgroup.create') }}"> Add blood group</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial no</th>
                                <th>Blood group title</th>
                                <th>Blood group</th>
                                <th>Blood group added</th>
                                <th>Blood group added by</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bds as $bd)
                                <tr>
                                    <th scope="row">{{ $loop->index ++ }}</th>
                                    <td>{{ $bd->bd_title }}</td>
                                    <td>{{ $bd->bd }}</td>
                                    <td>{{ $bd->created_at->diffForHumans() }}</td>
                                    <td>{{ users()->find($bd->added_by)->name }}</td>
                                    <td>
                                        <a class="btn btn-success btn-rounded" href="{{ route('bloodgroup.bloodgroup.edit', $bd->id) }}">Edit</a>
                                        <form action="{{ route('bloodgroup.bloodgroup.destroy', $bd->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-success btn-rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->

@endsection

