@extends('dashboard.layouts.app')

@section('title')
clients
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
                            <h2 class="page--title h5">clients</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>clients</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->
        </div>

        <div class="panel">




            <!-- Records List Start -->
            <div class="col-md-12 mx-auto">
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create New </h3>
                    </div>

                    <!-- return validtion errors -->
                    @include('partials._error_val')

                    <form method="post" action="{{ route('dashboard.clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="panel-content">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Name <span class="text-danger">*</span></span>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                        </label>
                                    </div>
                                </div>


                                @for ($i = 0; $i < 2; $i++)
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Phone @if($i == 0)  <span class="text-danger">*</span>@else <small>(option)</small> @endif</span>
                                            <input type="text" name="phone[]" class="form-control" value="{{ old('name[$i]' ?? '') }}" placeholder="05 000 0000">
                                        </label>
                                    </div>
                                </div>
                                @endfor



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Address <span class="text-danger">*</span></span>
                                        <textarea type="text" name="address" value="{{ old('address') }}" class="form-control"> </textarea>
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <input type="submit" value="Create" class="btn btn-sm btn-rounded btn-success">
                            </div>

                        </div>
                </div>

                </form>
            </div>
            <!-- Panel End -->
        </div>
        <!-- Records List Start -->
    </section>
</section>
<!-- Main Content End -->

@endsection()
