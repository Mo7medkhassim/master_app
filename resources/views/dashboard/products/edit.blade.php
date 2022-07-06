@extends('dashboard.layouts.app')

@section('title')
Categories
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
                            <h2 class="page--title h5">Categories</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Categories</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->
        </div>

        <div class="panel">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif




            <!-- Records List Start -->
            <div class="col-md-12 mx-auto">
                <!-- Panel Start -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit</h3>
                    </div>

                    <form method="post" action="{{ route('dashboard.products.update', $product -> id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="panel-content">
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-grou">
                                        <label>
                                            <span class="label-text">Category<span class="text-danger">*</span></span> </label>
                                        <select name="category_id" class="form-control">
                                            <option value="">All Categories </option>

                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product -> category->id == $category->id ? 'selected' : '' }} >{{$category->name}} </option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @foreach (config('translatable.locales') as $locale)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Name {{ $locale }}<span class="text-danger">*</span></span>
                                            <input type="text" name="{{$locale}}[name]" required value="{{ $product ->  name }}" class="form-control">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Description {{ $locale }}<span class="text-danger">*</span></span>
                                            <textarea type="text" name="{{$locale}}[description]" required class="form-control ckeditor">{{ $product -> description }}</textarea>
                                        </label>
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Purchase price<span class="text-danger">*</span></span>
                                            <input type="number" name="purchase_price" step="0.01" required value="{{ $product -> purchase_price }}" class="form-control">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Sale price<span class="text-danger">*</span></span>
                                            <input type="number" name="sale_price" step="0.01" required value="{{ $product -> sale_price }}" class="form-control">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            <span class="label-text">Stock<span class="text-danger">*</span></span>
                                            <input type="number" name="stock" required value="{{ $product -> stock }}" class="form-control">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="label-text">Photo</span>

                                        <div class="">
                                            <label class="custom-file">
                                                <input type="file" name="image" class="custom-file-input">
                                                <span class="custom-file-label">Choose File</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <input type="submit" value="Edit" class="btn btn-sm btn-rounded btn-success">
                                </div>

                            </div>
                        </div>
                        <!-- Panel End -->
                    </form>
                </div>
                <!-- Records List End -->
            </div>
    </section>
</section>
<!-- Main Content End -->

@endsection()
