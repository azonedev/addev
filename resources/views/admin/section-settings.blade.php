@extends('admin.admin-master')
@section('page-title','Home page section placement');
@section('main-content')
@foreach ($selected_section as $selected)
    @php
        $section_1 = $selected->section_1;
        $section_2 = $selected->section_2;
        $section_3 = $selected->section_3;
        $section_4 = $selected->section_4;
        $section_5 = $selected->section_5;
        $section_6 = $selected->section_6;
    @endphp
@endforeach
<form action="{{url('/admin/section-settings/update')}}" method="POST">
    @csrf
     <table class="table table-striped">
                    <tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Section Position</th>
                                <th>Category Place</th>
                            </tr>
                        </thead>
                        <tr>
                            <th scope="row">1</th>
                            <td>Section 1</td>
                            <td>
                               <div class="form-group">
                                <select name="section_1" id="" class="form-control">
                                    <option value="{{$section_1}}">{{$section_1}}</option>
                                    @foreach ($category as $item)
                                        @if ($item->cat_name==$section_1)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Section 2</td>
                            <td>
                               <div class="form-group">
                                <select name="section_2" id="" class="form-control">
                                    <option value="{{$section_2}}">{{$section_2}}</option>
                                     @foreach ($category as $item)
                                        @if ($item->cat_name==$section_2)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Section 3</td>
                            <td>
                               <div class="form-group">
                                <select name="section_3" id="" class="form-control">
                                    <option value="{{$section_3}}">{{$section_3}}</option>
                                    @foreach ($category as $item)
                                        @if ($item->cat_name==$section_3)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Section 4</td>
                            <td>
                               <div class="form-group">
                                <select name="section_4" id="" class="form-control">
                                    <option value="{{$section_4}}">{{$section_4}}</option>
                                     @foreach ($category as $item)
                                        @if ($item->cat_name==$section_4)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Section 5</td>
                            <td>
                               <div class="form-group">
                                <select name="section_5" id="" class="form-control">
                                    <option value="{{$section_5}}">{{$section_5}}</option>
                                     @foreach ($category as $item)
                                        @if ($item->cat_name==$section_5)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Section 6</td>
                            <td>
                               <div class="form-group">
                                <select name="section_6" id="" class="form-control">
                                    <option value="{{$section_6}}">{{$section_6}}</option>
                                         @foreach ($category as $item)
                                        @if ($item->cat_name==$section_6)
                                            @continue
                                        @else
                                            <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Save & Update" class="btn btn-success">
                <div class="p-4"></div>
            </form>
@endsection