@extends('layouts.master')
@section('body')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">DataTables</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Datatable</a>
                                        </li>
                                        <li class="breadcrumb-item active">Basic
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                        <div class="form-group breadcrumb-right">
                            <div class="dropdown">
                                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        <div class="content-body">
            {{-- <div class="row">
                        <div class="col-12">
                            <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
                        </div>
                    </div> --}}
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        <h6 class="mb-0">Members List</h6>
                                    </div>
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons d-inline-flex">
                                            <button class="btn btn-primary" tabindex="0" type="button"
                                                data-toggle="modal" data-target="#addMmember"> <i
                                                    class="fas fa-plus"></i> Add New Record</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mx-0 row">
                                </div>
                                <table class="datatables-basic table dataTable no-footer dtr-column" id="members-table"
                                    role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1591px;">
                                    <thead>
                                        {{-- <tr role="row">
                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 0px; display: none;" aria-label=""></th>
                                            <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled"
                                                rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                                <div class="custom-control custom-checkbox"> <input
                                                        class="custom-control-input" type="checkbox" value=""
                                                        id="checkboxSelectAll"><label class="custom-control-label"
                                                        for="checkboxSelectAll"></label></div>
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 412px;"
                                                aria-label="Name: activate to sort column ascending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 399px;"
                                                aria-label="Email: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 150px;"
                                                aria-label="Date: activate to sort column ascending">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 144px;"
                                                aria-label="Salary: activate to sort column ascending">Salary</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" style="width: 173px;"
                                                aria-label="Status: activate to sort column ascending">Status</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 106px;"
                                                aria-label="Actions">Actions</th>
                                        </tr> --}}
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                        <tr>
                                            <td>{{$member->id}}</td>
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->email}}</td>
                                            <td>{{$member->phone_number}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="addMmember" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog sidebar-sm">
                        <form class="add-new-record modal-content pt-0">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                            </div>
                            <div class="modal-body flex-grow-1">

                                <div class="form-group">
                                    <label for="exampleInput">Name</label>
                                    <input type="text" required class="form-control" id="name"
                                        placeholder="Erfan Ahmed Siam">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Phone Number</label>
                                    <input type="phone" required class="form-control" id="phone"
                                        placeholder="01420420420">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="erfan@example.com">
                                </div>

                                <button type="button" onclick="addMember()"
                                    class="btn btn-primary data-submit mr-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>


            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('script')
<!-- BEGIN: Page Vendor JS-->
{{-- <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script> --}}
{{-- <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script> --}}
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
{{-- <script src="{{asset('app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script> --}}
{{-- <script src="{{asset('custom-asset/js/scripts.js')}}"></script> --}}
<!-- END: Page JS-->
@endsection