@extends('dashboard.layouts.app')

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
                        <h2 class="page--title h5">Users</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>Users</span> <span>{{ $data -> total() }}</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">

                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Navbar Search Start -->
                            <div class="navbar--search">
                                <form action="{{ route('admins.index') }}" action="get">
                                    <input type="search" name="search" value="{{ request() ->search }}" class="form-control" placeholder="Search Something..." >
                                    <button class="btn-link"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Navbar Search End -->
                            <div class="">
                                @if (auth () -> user () -> hasPermission ('admins_create'))
                                <a href="{{ route ('admins.create') }}" class="btn btn-rounded btn-warning fw--600 ">Add New User</a>
                                @else
                                <a href="#" class="btn btn-rounded btn-warning fw--600 disabled">Add New User</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Header End -->
    </div>

    @if (! empty($data) && $data -> count() > 0)
    <div class="panel">

        <!-- Records List Start -->
        <div class="records--list px-2" data-title="Listing">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>ID</th>
                        <!-- <th class="not-sortable">Image</th> -->
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $admin)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <!-- <td><a href="#" class="btn-link"> <img src="assets/img/products/thumb-80x60.jpg" alt=""> </a></td> -->
                        <td>{{ $admin -> first_name }} {{ $admin -> last_name }}</td>
                        <td> {{ $admin -> email }} </td>
                        <td><img src="{{ $admin -> image_path }}" width="80" class="thumbnil" alt=""></td>
                        <td> {{ $admin -> created_at }} </td>
                        <td>
                            <div class="dropleft">

                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                    @if (auth() -> user () -> hasPermission ('admins_update'))
                                    <a href="{{ route('admins.edit', $admin -> id ) }}" class="dropdown-item">Edit</a>
                                    @else
                                    <a href="#" class="dropdown-item disabled">Edit</a>
                                    @endif
                                    @if (auth() -> user () ->hasPermission ('admins_delete'))
                                    <form action="{{ route('admins.destroy', $admin -> id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"  class="dropdown-item delete">Delete</button>
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
            {{ $data -> appends (request() -> query()) -> links() }}
        </div>
        <!-- Records List End -->
    </div>
    @else
    <h3> No data found ! </h3>
    @endif
</section>
<!-- Main Content End -->

@endsection()
