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
                        <h3 class="panel-title">Edit</h3>
                    </div>

                    <!-- return validtion errors -->
                    @include('partials._error_val')

                    <form method="post" action="{{ route('dashboard.clients.update', $client -> id) }}">
                        @csrf
                        @method('put')

                        <div class="panel-content">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Name <span class="text-danger">*</span></span>
                                            <input type="text" name="name" required value="{{ $client-> name }}" class="form-control">
                                        </label>
                                    </div>
                                </div>

                                @for ($i = 0; $i < 2; $i++)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">phone <span class="text-danger">*</span></span>
                                            <input type="text" name="phone[]" required value="{{ $client-> phone[$i] ?? '' }}" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                @endfor

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Address <span class="text-danger">*</span></span>
                                            <input type="text" name="address" value="{{ $client-> address }}" class="form-control">
                                        </label>
                                    </div>
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
