@extends('admin.admin-master')

@section('page-title','Export data')

@section('main-content')
                       <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                {{-- <div class="panel-heading">
                                    DataTables Advanced Tables
                                </div> --}}
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userData as $item)
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->mobile_no}}</td>
                                                            <td>{{$item->address}}</td>
                                                            <td>{{$item->role}}</td>
                                                        </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                   
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div> 
@endsection

@section('extra-js')
    <!-- DataTables JavaScript -->
    <script src="{{asset('assets/admin/js/dataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
    <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
@endsection