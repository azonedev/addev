@extends('admin.admin-master')

@section('page-title','Add to paid')

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
                                                    <th> ID</th>
                                                    <th>Ad title</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Category</th>
                                                    <th>Valid</th>
                                                    <th>Add to paid</th>
                                                    <th>Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allAds as $item)
                                                  
                                                        <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->ad_title}}</td>
                                                            <td>{{$item->price}}</td>
                                                            <td><img src='{{asset("$item->image")}}' width="75px" alt=""></td>
                                                            <td>{{$item->contact}}</td>
                                                            <td>{{$item->address}}</td>
                                                            <td>{{$item->category}}</td>
                                                            <td>
                                                               @php
                                                                   $today = date('Y-m-d');
                                                                   $ad_end = $item->ad_end;
                                                                   if($today<$ad_end){
                                                                       echo "<p class='text-primary'>$ad_end</p>";
                                                                    }else{
                                                                        echo "<button class='btn btn-danger btn-small'>Deactivated</button>";
                                                                   }
                                                               @endphp
                                                            </td>
                                                            <form action="{{url('/admin/add-to-paid/update')}}/{{$item->id}}" method="POST">
                                                                @csrf
                                                                <td>
                                                                    <select class="form-control" name="add-to-paid" id="">
                                                                        <option value="15" class="form-control">Paid for 15 days</option>
                                                                        <option value="30" class="form-control">Paid for 30 days</option>
                                                                    </select>
                                                                </td>
                                                            
                                                                
                                                                <td>
                                                                    <button type="submit" class="btn btn-info btn-circle btn-lg"><i class="fa fa-check"></i></button>
                                                                </td>
                                                            </form>
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