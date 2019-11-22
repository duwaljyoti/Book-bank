@extends('backend.layout')
@section('content')
    <?php
    $status=Config::get('constants.POST_STATUS');
    $user_types=Config::get('constants.USER_TYPE');
    ;?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backend.includes.all_breadcumb')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{$table['all']['subtitle']}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Organization</th>
                                    <th class="is-show">Status</th>

                                    <th>Edit</th>
                                    <th class="is-show">Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($datas as $index=>$data)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{array_key_exists($data->type,$user_types)?$user_types[$data->type]: 'Unknown'}}</td>

                                        <td>{{$data->type ==1?'N/A':(array_key_exists($data->organization_id,$organizations)?$organizations[$data->organization_id]: 'Unknown')}}</td>
                                        <td>
                                            @if($data->status)
                                                <i class="fa fa-check-circle" aria-hidden="true" style="color: green;font-size:25px"></i>
                                            @else
                                                <i class="fa fa-times-circle" aria-hidden="true" style="color: red;font-size:25px"></i>
                                            @endif

                                        </td>

                                        <td><a href="{{url($table['action'].'/'.$data->id.'/edit')}}">Edit</a></td>
                                        <td class="is-show">
                                            {!! Form::open(['url' => $table['action'].'/'.$data->id, 'method' => 'delete']) !!}
                                            <button type="button" class="btn btn-danger btn-sm btn-icon icon-left" href="#"
                                                    data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-window-close-o" aria-hidden="true"></i>
                                                Delete</button>
                                            {!! Form::close() !!}
                                        </td>

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
    </div>
@endsection

@section('scripts')
    @include('backend.includes.showScripts')
@endsection
