@extends('dashboard.layouts.app')

@section('title')
Products
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
                        <h2 class="page--title h5">Orders</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>orders</span> <span>{{ $orders -> total() }}</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">

                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Navbar Search Start -->
                            <div class="navbar--search">
                                <form action="{{ route('dashboard.orders.index') }}" action="get">
                                    <input type="search" name="search" value="{{ request() ->search }}" class="form-control" placeholder="Search Something...">
                                    <button class="btn-link"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Navbar Search End -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Header End -->
    </div>



    @if (! empty($orders) && $orders -> count() > 0)
    <div class="panel">

        <div class="container-">
            <div class="row">
                <div class="col-md-12">
                    <!-- Records List Start -->
                    <div class="records--list px-2" data-title="Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Client Name</th>
                                    <th>Price</th>
                                    <th>Stutas</th>
                                    <th>Create_at</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>

                                    <td> {{ $order -> client -> name }} </td>
                                    <td> {{ number_format($order -> total_price, 2) }} </td>
                                    <td> <button class="btn btn-default"> stutas </button> </td>
                                    <td> {{ $order -> created_at -> toFormattedDateString () }} </td>

                                    <td>

                                        <div class="dropleft">

                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu">

                                                <button data-url="{{ route('dashboard.orders.products', $order -> id ) }}" data-method="get" class="dropdown-item show-products-btn">Show</button>

                                                <!-- edit  -->
                                                @if (auth() -> user () -> hasPermission ('orders_update'))
                                                <a href="{{ route('dashboard.orders.edit', $order -> id ) }}" class="dropdown-item">Edit</a>
                                                @else
                                                <a href="#" class="dropdown-item disabled">Edit</a>
                                                @endif

                                                <!-- delete  -->
                                                @if (auth() -> user () ->hasPermission ('orders_delete'))
                                                <form action="{{ route('dashboard.orders.destroy', $order -> id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item delete">Delete</button>
                                                </form>
                                                @else
                                                <button type="submit" href="#" disabled class="dropdown-item">Delete</button>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders -> appends (request() -> query()) -> links() }}
                    </div>
                    <!-- Records List End -->
                </div>
                <div class="col-md-6">
                    <div class="show-product-orders pb-3">

                    </div>
                </div>
            </div>
        </div>


    </div>
    @else
    <div class="panel p-5">
        <h5> No records ! </h5>
    </div>
    @endif
</section>
<!-- Main Content End -->

@endsection()
