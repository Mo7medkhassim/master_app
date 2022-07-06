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
                    <div class="col-lg-5">
                        <!-- Page Title Start -->
                        <h2 class="page--title h5">Products</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>products</span> <span>{{ $products -> total() }}</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-7 " id="search_pro">

                        <div class="d-flex justify-content-end align-items-center">

                            <!-- Navbar Search Start -->

                            <div class="navbar--search">
                                <form action="{{ route('dashboard.products.index') }}" action="get">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <select name="category_id" class="form-control" id="">
                                                <option value=""> All categories </option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category -> id }}" {{ request() -> category_id == $category -> id ? "selected" : "" }}> {{ $category -> name }} </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-md-6"> <input type="search" name="search" value="{{ request() -> search }}" class="form-control" placeholder="Search Something..."> <button class="btn-link"><i class="fa fa-search"></i></button></div>

                                    </div>

                                </form>
                            </div>
                            <!-- Navbar Search End -->
                            <div class="">

                                @if (auth () -> user () -> hasPermission ('products_create'))
                                <a href="{{ route ('dashboard.products.create') }}" class="btn btn-rounded btn-warning fw--600 ">Add New</a>
                                @else
                                <a href="#" class="btn btn-rounded btn-warning fw--600 disabled">Add New</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Header End -->
    </div>



    @if (! empty($products) && $products -> count() > 0)
    <div class="panel">

        <!-- Records List Start -->
        <div class="records--list px-2" data-title="Listing">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Purchase Price</th>
                        <th>Sale Price</th>
                        <th>Profit </th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $product -> name }} </td>
                        <td> {{ $product -> purchase_price }} </td>
                        <td> {{ $product -> sale_price }} </td>
                        <td> {{ $product -> profit_percent }} </td>
                        <td> {{ $product -> stock }} </td>
                        <td> <img src="{{ $product -> image_path }}" width="80" class="thumbnail" alt=""> </td>
                        <td>
                            <div class="dropleft">

                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                    @if (auth() -> user () -> hasPermission ('products_update'))
                                    <a href="{{ route('dashboard.products.edit', $product -> id ) }}" class="dropdown-item">Edit</a>
                                    @else
                                    <a href="#" class="dropdown-item disabled">Edit</a>
                                    @endif
                                    @if (auth() -> user () ->hasPermission ('products_delete'))
                                    <form action="{{ route('dashboard.products.destroy', $product -> id) }}" method="post">
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
            {{ $products -> appends (request() -> query()) -> links() }}
            @else
            <div class="panel p-5">
                <h5> No records ! </h5>
            </div>
            @endif
        </div>
        <!-- Records List End -->
    </div>
</section>
<!-- Main Content End -->

@endsection()
