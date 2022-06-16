@extends('admin.layouts.app')

@section('title')
Invoice
@stop()

@section('content')
<!-- Page Header Start -->
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Page Title Start -->
                <h2 class="page--title h5">Invoices</h2>
                <!-- Page Title End -->

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="ecommerce.html">Dashboard</a></li>
                    <li class="breadcrumb-item active"><span>Invoices</span></li>
                </ul>
            </div>


        </div>
    </div>
</section>
<!-- Page Header End -->

<!-- Main Content Start -->
<section class="main--content">
    <div class="panel">
        <!-- Records Header Start -->
        <div class="records--header">
            <!-- <div class="title fa-shopping-bag">
                <h3 class="h3">Ecommerce Orders <a href="#" class="btn btn-sm btn-outline-info">Manage Orders</a></h3>
                <p>Found Total 1,330 Orders</p>
            </div> -->

            <div class="actions">
                <form action="#" class="search">
                    <input type="text" class="form-control" placeholder="Order ID or Customer Name..." required>
                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <!-- Records Header End -->
    </div>

    <div class="panel">
        <!-- Records List Start -->
        <div class="records--list" data-title="Orders Listing">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>Section No</th>
                        <th>Section Name</th>
                        <th>Descriptions</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>
                            <a href="#" class="btn-link">#315321</a>
                        </td>

                        <td>
                            <a href="#" class="btn-link">Justin Adams</a>
                        </td>
                        <td>Bertt Harris</td>
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
