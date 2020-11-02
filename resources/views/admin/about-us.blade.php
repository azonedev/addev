@extends('admin.admin-master')
@section('page-title','About Us')

@section('main-content')
@foreach ($aboutData as $item)
    <form action="{{url('admin/about-us/update/')}}/{{$item->id}}" method="post" enctype="multipart/form-data">
    @csrf
            <div class="form-group">
                <label for="name">About Us Details</label>
                <textarea name="details" id="" cols="30" rows="10">{!!$item->details!!}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Image </label>
                <input name="image" type="file" id="cateogry-image" class="form-control">
                <input type="text" name="prev_img" value="{{$item->image}}" hidden>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save & Update</button>
            </div>
        </form>
@endforeach
@endsection

@section('extra-js')
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
	<script>
      CKEDITOR.replace('details');
    </script>
@endsection