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
                    <div class="row">
                        <div class="col-md-10">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Welcome to Dashboard</h3>


                                </div>
                            </div>
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
