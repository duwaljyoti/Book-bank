@extends('layout')

@section('title')
    Mass Requests
@stop

@section('header_styles')
    {{--header style here --}}
@stop

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Mass Request For Books</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="">Books</a></li>
                <li class="active">Mass Requests</li>
            </ol>
        </section>
    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List of All Mass Request For Books</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Book Name</th>
                                    <th>Number of Books</th>
                                    <th>Name of Organization</th>
                                    <th>Pan Number</th>
                                    <th>Reason</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($books as $index=>$book)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$book->name}}</td>
                                        <td>{{$book->number_of_books}}</td>
                                        <td>{{$book->organization_name}}</td>
                                        <td>{{$book->pan_no}}</td>
                                        <td>{{$book->reason}}</td>
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