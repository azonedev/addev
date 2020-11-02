@extends('frontend.home-master')

@section('title','adDev - edit-ad-post')
	
@section('main')
    		<div class="fluid bg-light p-3">
			<div class="container bg-white ad-post p-5">
				<h2>Edit your ad post :)</h2>
				<hr>
                @foreach ($editData as $edit)
                    <form action="{{url('/user/account/update/')}}/{{$edit->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Ad Title</label>
                        <input name="ad_title" type="text" class="form-control" id="inputEmail4" value="{{$edit->ad_title}}" placeholder="This title is show as product name">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputPassword4">Price</label>

                        <input name="price" type="text" class="form-control" id="inputPassword4" value="{{$edit->price}}" placeholder="Price $">
                        </div>
                        <div class="form-group col-md-2">
                        <label  for="inputPassword4">Negotiable Price ?</label>
                        @if ($edit->price_negotiable !=NULL)
                           <input name="price_negotiable" type="checkbox" class="form-control" placeholder="check me" value="Negotiable Price" checked> 
                        @else
                            <input name="price_negotiable" type="checkbox" class="form-control" placeholder="check me" value="Negotiable Price">
                        @endif
                        
                        </div>
                        <div class="form-group col-md-2">
                        <label  for="inputPassword4">No Price ?</label>
                        @if ($edit->no_price)   
                            <input name="no_price" type="checkbox" class="form-control" placeholder="check me" value="No Price" checked>
                        @else
                            <input name="no_price" type="checkbox" class="form-control" placeholder="check me" value="No Price">
                            
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Contact</label>
                        <input name="contact" type="text" class="form-control" id="inputAddress" placeholder="Example : +01 234 659,  +1234 569" value="{{$edit->contact}}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inputAddress2">Address</label>
                            <input name="address" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{$edit->address}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputAddress2">Location</label>
                            <input name="location" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{$edit->location}}">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="select">Select Category</label>
                                    <select name="category" class="form-control" id="select">
                                        <option value="{{$edit->category}}">{{$edit->category}}</option>
                                        @foreach ($category as $item)
                                            @if($item->cat_name == $edit->category)
                                                @continue
                                            @else
                                                <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                            @endif
                                        @endforeach
                                        <option value="ohters">others</option>

                                    </select>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="inputState">Feature Image</label>
                                    <input name="feature_image" type="file" class="form-control" id="inputCity">
                                    <input type="text" name="prev_img" value="{{$edit->image}}" hidden>
                                </div>
                        </div>
                    <div class="form-group">
                        <label for="inputAddress2">Product Details : </label>
                        <textarea name="product_details" class="form-control" id="" cols="30" rows="10">
                            {!!$edit->product_details!!}
                        </textarea>
                    </div>
                        <legend class="col-form-label pt-2">Ad validity time :
                            <div class="p-2"></div>
                            <div class="form-row">

                                <div class="form-group col-3">
                                <input type="radio" name="validity" class="form-check-label" id="inputCity" value="15" checked> 15 Days
                                </div>
                                <div class="form-group col-3">
                                <input type="radio" name="validity" class="form-check-label" id="inputCity" value="30"> 30 Days
                                </div>
                            </div>
                        </legend>
                    
                    <button type="submit" class="btn btn-danger pl-5 pr-5">Update Ad</button>
                    </form>
                @endforeach
			</div>
		</div>
		<div class="p-4"></div>
@endsection

@section('extra-js')
    
	<!-- only ad-post page -->
	<script src="{{asset('assets/js/taginput.js')}}"></script>
	<script>
	    $('.myContainer').TagsInput({
	        tagInputPlaceholder:'Input Tags',
	        tagHiddenInput: $('.inputTags'),
	        tagContainerBorderColor: '#fff',
	        tagBackgroundColor: '#222',
	        tagColor: '#fff',
	        tagBorderColor: '#688eac'
	    });
	</script>
	<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
	<script>
      CKEDITOR.replace('product_details');
    </script>

    
	<!-- image gallery input -->

	<script>
		function add(){
            let field = `
                <div class="row">
                            <div class="col-md-10">
                                <div class="form-group" style="margin-left:0px;">
                                    
                                    <input type="file" class="form-control" name="images[]" required>
                                </div>
                            </div>
                           
                            <div class="col-md-1 col pt-0">
                                 <button type="button" class="remove btn btn-danger"><i class="fa fa-times-circle"></i></button>
                            </div>
                        </div>
            `;
            $("#input_fields").append(field);
        

        $(document).on('click', '.remove', function(){
            $(this).parent('.col').parent('.row').remove();
        });
    
    }
	</script>
@endsection