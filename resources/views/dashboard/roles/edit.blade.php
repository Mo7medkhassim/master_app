@extends('admin.layouts.app')

@section('title')
admins
@stop()

@section('content')

<!-- Main Content Start -->
<section class="main--content">
    <div class="panel">

        <!-- Page Header Start -->
        <section class="page--header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Page Title Start -->
                        <h2 class="page--title h5">Roles</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="ecommerce.html">Ecommerce</a></li>
                            <li class="breadcrumb-item active"><span>Roles</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <!-- Summary Widget Start -->
                        <div class="summary--widget">
                            <div class="summary--item">
                                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">2,9,7,9,11,9,7,5,7,7,9,11</p>

                                <p class="summary--title">This Month</p>
                                <p class="summary--stats text-green">2,371,527</p>
                            </div>

                            <div class="summary--item">
                                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">2,3,7,7,9,11,9,7,9,11,9,7</p>

                                <p class="summary--title">Last Month</p>
                                <p class="summary--stats text-orange">2,527,371</p>
                            </div>
                        </div>
                        <!-- Summary Widget End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Header End -->
    </div>

    <div class="panel">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <form method="post" action="">
            @csrf
            @method('post')
            <!-- Records List Start -->
            <div class="col-md-10 mx-auto">
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create New Role</h3>
                    </div>

                    <div class="panel-content">

                        <div class="form-group">
                            <label>
                                <span class="label-text">Name</span>
                                <input type="text" name="name" placeholder="Enter Your Name..." class="form-control">
                            </label>
                        </div>


                        <!-- Form Group Start -->
                        <div class="form-group row">
                            <span class="label-text col-md-2 col-form-label py-0">Permission</span>

                            <div class="col-md-10">
                                @foreach($data as $value)
                                <label class="form-check">
                                    <input type="checkbox" name="checkbox" value="{{ $value -> id }}" class="form-check-input" checked>
                                    </br><span class="form-check-label"> {{ $value -> name }} </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <!-- Form Group End -->




                        <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">

                    </div>
                </div>
                <!-- Panel End -->
            </div>
            <!-- Records List End -->
        </form>
    </div>
</section>
<!-- Main Content End -->

@endsection()
