@extends('dashboard.layouts.app')

@section('title')
Orders
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
                            <h2 class="page--title h5">Orders</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Orders</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->
        </div>

        @php
        $i = 5;
        @endphp

        <div class="panel">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel-heading">
                        <h5 class="h3"> Categories </h5>
                    </div>
                    @if ($categories)
                    <div id="accordion02">
                        @foreach ($categories as $key => $category)
                        <!-- Card Start -->
                        <div class="card p-2">
                            <div class="card-header  bg-orange">
                                <h5 class="h5">
                                    <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse0{{ $key + 1 }}">{{ $category -> name }}</button>
                                </h5>
                            </div>

                            @if($category -> products -> count() > 0)
                            <div id="collapse0{{ $key + 1 }}" class="collapse" data-parent="#accordion02">
                                <div class="card-body">
                                    <div class="invoice--order">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>name</th>
                                                    <th>stock</th>
                                                    <th>price</th>
                                                    <th>order</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($category -> products as $product)
                                                <tr>
                                                    <td>{{ $product -> name }}</td>
                                                    <td>{{ $product -> stock }}</td>
                                                    <td>{{ number_format ($product -> sale_price, 2) }}</td>

                                                    <td>
                                                        <a href="" id="product-{{ $product -> id }}" data-name="{{ $product -> name }}" data-id="{{ $product -> id }}" data-price="{{ $product -> sale_price }}" class="btn btn-success btn-sm add-product-btn"><i class="fa fa-plus"></i></a>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div id="collapse0{{ $key + 1 }}" class="collapse" data-parent="#accordion02">
                                <div class="card-body">
                                    <div class="m-2">
                                        <h6>No related products yet!</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- Card End -->
                        @endforeach
                    </div>
                    @else
                    <h5>No categories yet!</h5>
                    @endif

                </div> <!-- end of sec one -->


                <div class="col-md-6 order">
                    <div class="panel-heading bg-oran">
                        <h5 class="h3"> Orders </h5>
                    </div>

                    <div class="invoice--order">
                        <form action="{{ route ('dashboard.clients.orders.store', $client -> id ) }}" method="post">
                            @csrf
                            @method('post')

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>product</th>
                                        <th>quantity</th>
                                        <th>price</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody class="order-list">

                                    <!-- table body -->

                                </tbody>
                            </table>

                            <div class="col-12 bg-default px-3 my-3">
                                <h5>Total : <span class="total-price"></span></h5>

                                <button type="submit" id="order-form-btn" class="btn btn-rounded btn-success disabled">Add Order</button>
                            </div>

                        </form>
                    </div>

                </div>
                <!-- end of sec two -->
            </div>
        </div>
    </section>
</section>
<!-- Main Content End -->

@endsection()
