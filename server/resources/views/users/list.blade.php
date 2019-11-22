@extends('layout')

@section('title')
    Users Lists
@stop

@section('header_styles')
    {{--header style here --}}
@stop

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Users Lists</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="">Users</a></li>
                <li class="active">All Lists</li>
            </ol>
        </section>
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of all Users</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $index=>$data)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

@stop

@section('footer_scripts')
    {{--scripts here--}}
@stop