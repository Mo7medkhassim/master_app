@extends('admin.layouts.app')

@section('title')
Sections
@stop()



@section('content')
<!-- Page Header Start -->
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <!-- Page Title Start -->
                <h2 class="page--title h5">Sections</h2>
                <!-- Page Title End -->

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="ecommerce.html">Dashboard</a></li>
                    <li class="breadcrumb-item active"><span>Sections</span></li>
                </ul>
            </div>


        </div>
    </div>
</section>
<!-- Page Header End -->

<!-- Main Content Start -->
<div class="container-fluid">
    <div class="panel my-2">
        <section class="main--content">
            @if(session() -> has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{session()->get('success')}} </strong>
                <button class="close" type="btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </section>
        <div class="panel-content py-5">
            <a href="#formInModal" class="btn btn-rounded btn-block btn-success" data-toggle="modal">Add Section</a>
        </div>
    </div>

    <div class="panel">
        <!-- add Modal Start -->
        <div id="formInModal" class="modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Section</h5>

                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('section.store')}}" method="POST">
                            @csrf
                            <div class="modal-body pt-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Name</span>
                                        <input type="text" name="section_name" placeholder="Enter Section name..." class="form-control">
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Description</span>
                                        <input type="text" name="section_desc" placeholder="Enter description..." class="form-control">
                                    </label>
                                </div>




                            </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

                        <!-- <button type="button" class="btn btn-success">Save</button> -->
                        <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">
                        <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--add Modal End -->

        <!-- Edite Model Start -->
        <div id="formInModal1" class="modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edet Section</h5>

                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form action="section/update" method="POST">
                            @csrf
                            {{method_field('patch')}}
                            <div class="modal-body pt-4">
                                <div class="form-group">
                                    <input type="text" hidden id="section_id" name="section_id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Name</span>
                                        <input type="text" id="section_name" name="section_name" placeholder="Enter Section name..." class="form-control">
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Description</span>
                                        <input type="text" id="section_desc" name="section_desc" placeholder="Enter description..." class="form-control">
                                    </label>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">
                        <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edite Model End -->

        <!-- Delete model Start -->
        <div id="formInModal2" class="modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are You Sure To Delete Section</h5>

                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <form action="section/destroy" method="POST">
                            @csrf
                            {{method_field('patch')}}
                            <div class="modal-body pt-4">
                                <div class="form-group">
                                    <input type="text" hidden id="section_id" name="section_id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Name</span>
                                        <input type="text" id="section_name" name="section_name" placeholder="Enter Section name..." class="form-control">
                                    </label>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" value="Delete" class="btn btn-sm btn-rounded btn-success">
                        <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete model End -->
    </div>

</div>

<div class="container-fluid">
    <!-- sections data table start -->
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
                    <?php $i = 0; ?>
                    @foreach ($sections as $section)
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            {{$section->section_name}}
                        </td>
                        <td>{{$section->section_desc}}</td>
                        <td>
                            <div class="dropleft">
                                <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                    <a href="#formInModal1" data-section_id='{{$section->id}}' data-section_desc='{{$section->section_desc}}' data-section_name='{{$section->section_name}}' class="dropdown-item" data-toggle="modal">Edit</a>
                                    <a href="#formInModal2" class="dropdown-item" data-toggle="modal" data-section_id='{{$section->id}}' data-section_name="{{$section->section_name}}">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Records List End -->
    </div>
    <!-- section data table end  -->
</div>

<!-- Main Content End -->
@endsection()

@section('script')

<script>
    $('#formInModal1').on('show.bs.modal', function(event) {
        var btn1 = $(event.relatedTarget)

        var section_id = btn1.data('section_id')
        var section_name = btn1.data('section_name')
        var section_desc = btn1.data('section_desc')
        // alert(section_id);
        var model = $(this);
        model.find('.modal-body #section_id').val(section_id)
        model.find('.modal-body #section_name').val(section_name)
        model.find('.modal-body #section_desc').val(section_desc)
    });
</script>

<script>
    $('#formInModal2').on('show.bs.modal', function(event) {
        var btn1 = $(event.relatedTarget)
        var section_id = btn1.data('section_id')
        var section_name = btn1.data('section_name')
        // alert(section_id);
        var model = $(this);
        model.find('.modal-body #section_id').val(section_id)
        model.find('.modal-body #section_name').val(section_name)
    });
</script>
@stop
