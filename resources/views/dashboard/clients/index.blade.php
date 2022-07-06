@extends('dashboard.layouts.app')

@section('title')
clients
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
                        <h2 class="page--title h5">Clients</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>Clients</span> <span>{{ $clients -> total() }}</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">

                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Navbar Search Start -->
                            <div class="navbar--search">
                                <form action="{{ route('dashboard.clients.index') }}" action="get">
                                    <input type="search" name="search" value="{{ request() ->search }}" class="form-control" placeholder="Search Something...">
                                    <button class="btn-link"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Navbar Search End -->
                            <div class="">

                                @if (auth () -> user () -> hasPermission ('clients_create'))
                                <a href="{{ route ('dashboard.clients.create') }}" class="btn btn-rounded btn-warning fw--600 ">Add New</a>
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



    @if (! empty($clients) && $clients -> count() > 0)
    <div class="panel">

        <!-- Records List Start -->
        <div class="records--list px-2" data-title="Listing">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Add order</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $key => $client)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $client -> name }} </td>
                        <td>{{ implode ('__',$client -> phone) }} </td>
                        <td>{{ $client -> address }} </td>

                        <td>
                            @if (auth() -> user () -> hasPermission ('orders_create'))
                            <a href="{{ route('dashboard.clients.orders.create', $client -> id) }}" class="btn btn-outline-success btn-sm">Add Order</a>
                            @else
                            <a href="#" class="btn btn-outline-primary btn-small" disabled>Add Order</a>
                            @endif

                        </td>
                        <td>

                            <div class="dropleft">

                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">

                                    <!-- edit  -->
                                    @if (auth() -> user () -> hasPermission ('clients_update'))
                                    <a href="{{ route('dashboard.clients.edit', $client -> id ) }}" class="dropdown-item">Edit</a>
                                    @else
                                    <a href="#" class="dropdown-item disabled">Edit</a>
                                    @endif

                                    <!-- delete  -->
                                    @if (auth() -> user () ->hasPermission ('clients_delete'))
                                    <form action="{{ route('dashboard.clients.destroy', $client -> id) }}" method="post">
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
            {{ $clients -> appends (request() -> query()) -> links() }}
        </div>
        <!-- Records List End -->
    </div>
    @else
    <div class="panel p-5">
        <h5> No records ! </h5>
    </div>
    @endif
</section>
<!-- Main Content End -->

@endsection()
