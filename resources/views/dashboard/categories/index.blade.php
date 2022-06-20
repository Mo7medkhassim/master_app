@extends('dashboard.layouts.app')

@section('title')
Categories
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
                        <h2 class="page--title h5">Categories</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>Categories</span> <span>{{ $categories -> total() }}</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">

                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Navbar Search Start -->
                            <div class="navbar--search">
                                <form action="{{ route('dashboard.categories.index') }}" action="get">
                                    <input type="search" name="search" value="{{ request() ->search }}" class="form-control" placeholder="Search Something...">
                                    <button class="btn-link"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Navbar Search End -->
                            <div class="">
                               
                                @if (auth () -> user () -> hasPermission ('categories_create'))
                                <a href="{{ route ('dashboard.categories.create') }}" class="btn btn-rounded btn-warning fw--600 ">Add New</a>
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

    

    @if (! empty($categories) && $categories -> count() > 0)
    <div class="panel">

        <!-- Records List Start -->
        <div class="records--list px-2" data-title="Listing">
            <table id="recordsListView" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Products Counts</th>
                        <th>Related Products</th>
                        <th>Status</th>
                        
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>
                            {{  $loop->iteration }}
                        </td>
                        <td>{{ $category -> name }} </td>
                        <td>{{ $category -> products -> count() }} </td>
                        <td> <a href="{{ route('dashboard.products.index', ['category_id' => $category->id] ) }}" class="btn btn-info" >Products Related</a> </td>
                        <td> Active </td>
                        <td>
                            <div class="dropleft">

                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                    @if (auth() -> user () -> hasPermission ('categories_update'))
                                    <a href="{{ route('dashboard.categories.edit', $category -> id ) }}" class="dropdown-item">Edit</a>
                                    @else
                                    <a href="#" class="dropdown-item disabled">Edit</a>
                                    @endif
                                    @if (auth() -> user () ->hasPermission ('categories_delete'))
                                    <form action="{{ route('dashboard.categories.destroy', $category -> id) }}" method="post">
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
            {{ $categories -> appends (request() -> query()) -> links() }}
        </div>
        <!-- Records List End -->
    </div>
    @else
    <h3> No data found ! </h3>
    @endif
</section>
<!-- Main Content End -->

@endsection()
