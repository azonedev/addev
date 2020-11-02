@extends('admin.admin-master')

@section('page-title','All messages')

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
                                                    <th>Subject</th>
                                                    <th>Date & Time</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allMessages as $item)
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->phone}}</td>
                                                            <td>{{$item->subject}}</td>
                                                            <td>{{$item->date}}</td>
                                                            <td>
                                                                @if ($item->status == 'read')
                                                                    <button class="btn btn-info">Read</button>
                                                                @else
                                                                    <button class="btn btn-danger btn-small">Didn't read</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{url('/admin/message')}}/{{$item->id}}">
                                                                    <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fa fa-link"></i></button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('/admin/message/delete')}}/{{$item->id}}">
                                                                    <button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-times"></i></button>
                                                                </a>
                                                            </td>
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