@extends('admin.admin-master')

@section('page-title')
    Category
@endsection

@section('main-content')
   <div class="row">
       <div class="col-md-6">
            <form action="{{url('admin/category/save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h4 class="text-center">Add Cateogry <i class="fa fa-plus"></i>  </h4>
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input name="cat-name" type="text" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Category Image</label>
                    <input name="cat-image" type="file" id="cateogry-image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Category Icon</label>
                    <input name="cat-icon" type="text" id="name" class="form-control" placeholder="Example: fa fa-car" required>
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary">Save</button>
                </div>
                
            </form>
       </div>
       <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   <i class="fa fa-list"></i>    All Cateogry
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Cateogry Name</th>
                                                    <th>Image</th>
                                                    <th>Font-awesome Icon</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=0;
                                                @endphp
                                                @foreach ($category as $item)
                                                    <tr>
                                                        <td>{{$i+=1}}</td>
                                                        <td>{{$item->cat_name}}</td>
                                                        <td><img src='{{asset("$item->cat_image")}}' width="50px" alt=""></td>
                                                        <td>{{$item->cat_icon}}</td>
                                                        <td>
                                                            
                                                            <a href="{{url('/admin/category/edit')}}/{{$item->id}}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a 
                                                            title="Delete-cateogry"
                                                            href="{{url('/admin/category/delete')}}/{{$item->id}}" 
                                                            
                                                            class="text-danger" 
                                                            
                                                            style="padding-left:10px;" 
                                                            
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            
                                                            >
                                                                <i class="fa fa-trash"></i>
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
   </div>
@endsection