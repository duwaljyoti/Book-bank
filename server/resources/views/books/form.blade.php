@extends('layout')

@section('title')
    {{--Title Here--}} Books
@stop

@section('header_styles')
    {{--header style here --}}
@stop


@section('content')
    <section class="content-header clearfix">
        <h1 class="pull-left">
         Book Add
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        Add New Book
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
@stop

@section('footer_scripts')
   {{--scripts here--}}
@stop