@extends('admin.layouts.app')

@section('title')
Roles
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
                        <h2 class="page--title h5">Role Management</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="ecommerce.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><span>Roles</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-rounded btn-warning fw--600 ">Create New Role</a>
                        </div>
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
        <!-- Records List Start -->
        <div class="records--list" data-title="Roles List">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>ID</th>

                        <th>Name</th>
                        <th>admin count</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td> 1</td>
                        <td> admin </td>
                        <td> 45 </td>
                        <td> 12/45/2502 </td>
                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Edit</a>
                                    <a href="#" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
        <!-- Records List End -->
    </div>
</section>
<!-- Main Content End -->


@endsection()
