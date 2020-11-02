@extends('admin.admin-master')

@section('page-title','Deactivated ads')

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
                                                    <th>Type</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allAds as $item)
                                                   @php
                                                        $today = date('Y-m-d');
                                                        $ad_end = $item->ad_end;
                                                    @endphp
                                                    @if ($today<$ad_end)
                                                    @else   
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
                                                            <td>
                                                                @if ($item->status=="paid")
                                                                   <button class='btn btn-info btn-small'>Paid</button>
                                                                @else
                                                                    <button class='btn btn-warning btn-small'>Unpaid</button>
                                                                @endif
                                                            </td>
                                                        
                                                            
                                                            <td>
                                                                 <a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}" target="_black">
                                                                <button type="button" class="btn btn-success btn-circle"><i class="fa fa-link"></i></button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a 
                                                                title="Delete-cateogry"
                                                                href="{{url('/admin/ads/delete')}}/{{$item->id}}" 
                                                                
                                                                class="text-danger" 
                                                                
                                                                style="padding-left:10px;" 
                                                                
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                
                                                                >
                                                                    <button type="button" class="btn btn-danger btn-inline btn-circle"><i class="fa fa-times"></i></button>
                                                                </a>
                                                                
                                                            </td>
                                                        </tr> 
                                                    @endif

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