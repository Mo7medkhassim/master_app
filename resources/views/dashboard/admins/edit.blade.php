@extends('dashboard.layouts.app')

@section('title')
admins
@stop()

@section('content')


<!-- Main Content Start -->
<section class="main--content">
    <section class="main--content">
        <div class="panel">

            <!-- Page Header Start -->
            <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Page Title Start -->
                            <h2 class="page--title h5">Users</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Users</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->
        </div>

        <div class="panel">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @php
            $models = ['admins','categories', 'products','test'];
            @endphp


            <!-- Records List Start -->
            <div class="col-md-12 mx-auto">
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit User</h3>
                    </div>

                    <form method="post" action="{{ route('dashboard.admins.update', $admin -> id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="panel-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">First Name</span>
                                            <input type="text" name="first_name" value="{{ $admin->first_name }}" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Last name</span>
                                            <input type="text" name="last_name" value="{{ $admin->last_name }}" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Email Address</span>
                                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="label-text ">Photo</span>

                                        <div class="">
                                            <label class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <span class="custom-file-label">Choose File</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 mb-3">
                                    <div class="panel-subtitle">
                                        <span class="label-text">Permissions</span>
                                    </div>

                                    <!-- Tabs Nav Start -->
                                    <ul class="nav nav-tabs">
                                        @foreach ($models as $index => $model)
                                        <li class="nav-item">
                                            <a href="#{{ $model }}" data-toggle="tab" class="nav-link {{ $index == 0 ? 'active' : '' }}">{{ $model }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <!-- Tabs Nav End -->

                                    <!-- Tab Content Start -->
                                    <div class="tab-content">
                                        @foreach ($models as $index=>$model)
                                        <!-- Tab Pane Start -->
                                        <div class="tab-pane fade {{ $index == 0 ? ' show active' : '' }}" id="{{ $model }}">
                                            <div class="d-flex  res_flex">

                                                <label class="form-check mt-1 mr-3">
                                                    <input type="checkbox" name="permissions[]" {{ $admin->hasPermission($model.'_create') ? 'checked' : '' }} value="{{ $model }}_create" class="form-check-input">
                                                    <span class="form-check-label">create</span>
                                                </label>

                                                <label class="form-check mr-3">
                                                    <input type="checkbox" name="permissions[]" {{ $admin -> hasPermission($model.'_read') ? 'checked' : '' }} value="{{ $model }}_read" class="form-check-input">
                                                    <span class="form-check-label">read</span>
                                                </label>

                                                <label class="form-check mr-3">
                                                    <input type="checkbox" name="permissions[]" {{ $admin -> hasPermission($model.'_update') ? 'checked' : '' }} value="{{ $model }}_update" class="form-check-input">
                                                    <span class="form-check-label">update</span>
                                                </label>

                                                <label class="form-check ">
                                                    <input type="checkbox" name="permissions[]" {{ $admin -> hasPermission($model.'_delete') ? 'checked' : '' }} value="{{ $model }}_delete" class="form-check-input">
                                                    <span class="form-check-label">delete</span>
                                                </label>

                                            </div>
                                        </div>
                                        <!-- Tab Pane End -->
                                        @endforeach


                                    </div>
                                    <!-- Tab Content End -->


                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" value="Edit" class="btn btn-sm btn-rounded btn-success">
                                </div>

                            </div>
                        </div>
                        <!-- Panel End -->
                    </form>
                </div>
                <!-- Records List End -->
            </div>
    </section>
</section>
<!-- Main Content End -->

@endsection()
