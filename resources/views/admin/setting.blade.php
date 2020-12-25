@extends('admin.admin-master')

@section('page-title','Settings')
    
@section('main-content')
@foreach ($settingData as $item)
    <form action="{{url('admin/setting/update/')}}/{{$item->id}}" method="post" enctype="multipart/form-data">
    @csrf
           
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Favicon </label>
                        <input name="favicon" type="file" id="cateogry-image" class="form-control">
                        <input type="hidden" name="prev_favicon" value="{{$item->favicon}}">
                    </div>
                </div>
                <div class="col-6"><img src='{{asset("$item->favicon")}}' height="70px"  alt=""></div>
            </div>
            <div class="form-group">
                <label for="name">Logo </label>
                <input name="logo" type="file" id="cateogry-image" class="form-control">
                <input type="hidden" name="prev_logo" value="{{$item->logo}}">
                <img src='{{asset("$item->logo")}}' height="70px"  alt="">
            </div>
            <div class="form-group">
                <label for="name">Extra Ad </label>
                <input name="extra_ad" type="file" id="cateogry-image" class="form-control">
                <input type="hidden" name="prev_extra_ad" value="{{$item->note}}">
                <img src='{{asset("$item->note")}}' height="70px"  alt="">

            </div>
            <div class="form-group">
                <label for="name">Footer Details</label>
                <input name="footer_details" type="text"  class="form-control" value="{{$item->footer_details}}">
            </div>
            <div class="form-group">
                <label for="name">Location</label>
                <input name="location" type="text"  class="form-control" value="{{$item->location}}">
            </div>
            <div class="form-group">
                <label for="name">Location Link</label>
                <input name="location_link" type="text"  class="form-control" value="{{$item->location_link}}">
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input name="phone" type="text"  class="form-control" value="{{$item->phone}}">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input name="email" type="text"  class="form-control" value="{{$item->email}}">
            </div>
            <div class="form-group">
                <label for="name">Youtube Link</label>
                <input name="youtube_link" type="text"  class="form-control" value="{{$item->youtube_link}}">
            </div>
            <div class="form-group">
                <label for="name">Facebook Link</label>
                <input name="facebook_link" type="text"  class="form-control" value="{{$item->facebook_link}}">
            </div>
            <div class="form-group">
                <label for="name">Twitter Link</label>
                <input name="twitter_link" type="text"  class="form-control" value="{{$item->twitter_link}}">
            </div>
            <div class="form-group">
                <label for="name">Copyright</label>
                <input name="copyright" type="text"  class="form-control" value="{{$item->copyright}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save & Update</button>
            </div>
        </form>
@endforeach  
@endsection