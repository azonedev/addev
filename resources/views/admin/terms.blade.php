@extends('admin.admin-master')

@section('page-title','Terms & Condition')
    

@section('main-content')
@foreach ($termsData as $item)
    <form action="{{url('admin/terms/update/')}}/{{$item->id}}" method="post" >
    @csrf
            <div class="form-group">
                <label for="name">About Us Details</label>
                <textarea name="details" id="" cols="30" rows="10">{!!$item->details!!}</textarea>
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