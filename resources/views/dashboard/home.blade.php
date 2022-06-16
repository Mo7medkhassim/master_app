@extends('dashboard.layouts.app')

@section('content')

<!-- Page Header Start -->
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Page Title Start -->
                <h2 class="page--title h5">Home here !!</h2>
                <!-- Page Title End -->

                <ul class="breadcrumb">
                    <li class="breadcrumb-item active"><span>Dashboard</span></li>
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

<!-- Main Content Start -->
<section class="main--content">
    <div class="row gutter-20">

    </div>
</section>
<!-- Main Content End -->



@endsection()
