@extends('layout')

@section('title')
    Dashboard
@stop

@section('header_styles')
    {{--header style here --}}
@stop

@section('content')

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Dashboard</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--<div class="row">
                        <div class="col-md-10">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Welcome to Dashboard</h3>


                                </div>
                            </div>
                        </div>--}}
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{$books_count}}</h3>

                                        <p>Books</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-book"></i>
                                    </div>
                                    <a href="{{url('admin/books')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{$user_count}}</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{$personal_request_count}}</h3>

                                        <p>Personal Requests</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-chatbox"></i>
                                    </div>
                                    <a href="{{url('admin/personal_requests')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>{{$mass_request_count}}</h3>

                                        <p>Mass Requests</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-chatboxes"></i>
                                    </div>
                                    <a href="{{url('admin/mass_requests')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.box -->


        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footer_scripts')
    {<script>
        $(".sidebar-menu").find(".dashboard").addClass('active');
    </script>
@stop
