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
        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#2bb3c0">5,6,9,4,9,5,3,5,9,15,3,2,2,3,9,11,9,7,20,9,7,6</p>

                        <p class="miniStats--label text-white bg-blue">
                            <i class="fa fa-level-up-alt"></i>
                            <span>10%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-user text-blue"></i>

                        <p class="miniStats--caption text-blue">Monthly</p>
                        <h3 class="miniStats--title h4">New Users</h3>
                        <p class="miniStats--num text-blue">13,450</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#e16123">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                        <p class="miniStats--label text-white bg-orange">
                            <i class="fa fa-level-down-alt"></i>
                            <span>10%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-ticket-alt text-orange"></i>

                        <p class="miniStats--caption text-orange">Monthly</p>
                        <h3 class="miniStats--title h4">Tickets Answered</h3>
                        <p class="miniStats--num text-orange">450</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel">
                    <div class="miniStats--header bg-darker">
                        <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#009378">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                        <p class="miniStats--label text-white bg-green">
                            <i class="fa fa-level-up-alt"></i>
                            <span>10%</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-rocket text-green"></i>

                        <p class="miniStats--caption text-green">Monthly</p>
                        <h3 class="miniStats--title h4">Projects Launched</h3>
                        <p class="miniStats--num text-green">3,130,300</p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>

        <div class="col-xl-8 col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Yearly Earning Graph Overview</h3>

                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-chart">
                    <!-- Morris Area Chart 01 Start -->
                    <div id="morrisAreaChart01" class="chart--body area--chart style--1"></div>
                    <!-- Morris Area Chart 01 End -->

                    <div class="chart--stats style--1">
                        <ul class="nav">
                            <li data-overlay="1 orange">
                                <p class="amount">$10,320,340</p>
                                <p>
                                    <span class="label">Order</span>
                                    <span class="text-red"><i class="fa fa-long-arrow-alt-down"></i>2.25%</span>
                                </p>
                            </li>
                            <li data-overlay="1 red">
                                <p class="amount">$235,090</p>
                                <p>
                                    <span class="label">Shipment</span>
                                    <span class="text-green"><i class="fa fa-long-arrow-alt-up"></i>2.25%</span>
                                </p>
                            </li>
                            <li data-overlay="1 blue">
                                <p class="amount">$134,900</p>
                                <p>
                                    <span class="label">Tax</span>
                                    <span class="text-red"><i class="fa fa-long-arrow-alt-down"></i>2.25%</span>
                                </p>
                            </li>
                            <li data-overlay="1 green">
                                <p class="amount">$1,340</p>
                                <p>
                                    <span class="label">Revenue</span>
                                    <span class="text-green"><i class="fa fa-long-arrow-alt-up"></i>2.25%</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- Main Content End -->



@endsection()
