@extends('frontend.home-master')
@section('title','adDev by azOneDev')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4">
                <div class="p-3"></div>
                <div class="sidenav">
                   
                    <a class="sub-title" href="{{url('/user/account')}}">Account</a>
                    <div class="p-2"></div>
                    <a class="sub-title" href="{{url('/user/profile')}}">Profile</a> 
                    <div class="p-2"></div>
                </div>
            </div>
        
            <div class="col-md-10 col-sm-8 ">
                <div class="p-3"></div>
                    <h4 class="primary">Account  settings</h4>
                <div class="p-2"></div>
               
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <p class="text-center">All ads that you post</p>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Valid</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                         @foreach ($userData as $item)
                        <tr>
                            <th scope="row">{{$i+=1}}</th>
                            <td>{{$item->ad_title}}</td>
                            <td>{{$item->price}} USD</td>
                            <td><img src="{{asset("$item->image")}}" width="100px" alt=""></td>
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
                                <a href="{{url('/')}}/{{$item->id}}/{{$item->ad_title}}" target="_blank" title="view on single page">
                                    <button type="button" class="btn btn-success btn-circle"><i class="fa fa-link"></i></button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/user/ad-post/edit')}}/{{$item->id}}" title="Edit this product">
                                    <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/user/post/delete')}}/{{$item->id}}" onclick="return confirm('Are you sure to delete this ad post ?')">
                                    <button type="button" class="btn btn-danger btn-inline btn-circle"><i class="fa fa-times"></i></button>  
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection