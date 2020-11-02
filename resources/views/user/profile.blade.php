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
                    <h4 class="primary">Profile  settings</h4>
                <div class="p-2"></div>
                @foreach ($userData as $item)
                    
                <form action="{{url('user/profile/update')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Name or company name</label>
                        <input name="name" type="text" class="form-control" id="inputEmail4" value="{{$item->name}}">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Email</label>
                        <input name="email" type="email" class="form-control" id="inputEmail4" value="{{$item->email}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Phone</label>
                        <input name="mobile_no" type="text" class="form-control" id="inputEmail4" value="{{$item->mobile_no}}" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input name="password" type="text" class="form-control" id="inputEmail4" value="{{$item->password}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Address</label>
                        <input name="address" type="text" class="form-control" id="inputEmail4" value="{{$item->address}}" >
                        </div>
                        {{-- <div class="form-group col-md-6">
                        <label for="inputPassword4">Update profile picture</label>
                        <input name="profile_url" type="file" class="form-control" id="inputEmail4">
                        </div> --}}
                    </div>
                    <div class="form-group">
						<div class="float-right">
							<input type="submit" class="btn contact-btn btn-md" value="Update Profile">
						</div>
					</div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
@endsection