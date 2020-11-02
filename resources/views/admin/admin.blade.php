@extends('admin.admin-master')

@section('page-title','Dashboard')

@section('main-content')
                        <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <a href="{{url('/admin/new-messages')}}">
                                        <div class="col-xs-9 text-right" style="color:#fff;">

                                            <div class="huge ">{{$message}}</div>
                                            <div>New Messages</div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{url('/admin/new-messages')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-money fa-5x"></i>
                                        </div>
                                        <a href="{{url('/admin/paid-ads')}}">
                                        <div class="col-xs-9 text-right" style="color:#fff;">

                                            <div class="huge ">{{$paid}} </div>
                                            <div>Paid Ads
                                            </div>
                                        </div>
                                        </a>
                                        
                                    </div>
                                </div>
                                <a href="{{url('/admin/paid-ads')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$all_ad}}</div>
                                            <div>All Ads!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('/admin/all-ads')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{$deactive_ad}}</div>
                                            <div>All Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('admin/user-list')}}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
@endsection