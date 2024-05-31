@extends('layouts.app')

@section('template_title')
   Showing all requests
@endsection

@section('template_linked_css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Showing all Requests
                            </span>


                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('usersmanagement.users-table.caption', 1, ['userscount' => $requests->count()]) }}
                                </caption>
                                <thead class="thead">
                                <tr>
                                    <th>QR</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Order From</th>
                                    <th>Ref Link</th>
                                    <th>Pickup</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th class="no-search no-sort">Actions</th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                                </thead>
                                <tbody id="users_table">
                                @foreach($requests as $request)
                                    <tr>
                                        <td>{!! $request->qr_code !!}</td>
                                        <td><a href="{{url('users/' . $request->user->id)}}" target="_blank">{{$request->user->first_name .' '. $request->user->last_name}}</a></td>
                                        <td>{{$request->title}}</td>
                                       <td>{{$request->description}}</td>
                                        <td>{{$request->order_from}}</td>
                                        <td><a href="{{$request->ref_link}}" target="_blank">{{$request->ref_link}}</a></td>
                                        <td>{{$request->pickup_date}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$request->created_at}}</td>
                                        <td>
                                            @if ($request->status == 1)
                                                <span class="badge badge-success">Active</span>                                            @elseif ($user_role->name == 'Admin')
                                            @elseif ($request->status == 2)
                                                <span class="badge badge-danger">In-active</span>
                                            @else
                                                <span class="badge badge-default">Pending</span>
                                            @endif

                                        </td>

                                        <td>
                                            {!! Form::open(array('url' => '/' . $request->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Reject')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('Reject', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Reject Request', 'data-message' => 'Are you sure you want to delete this request ?')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('/' . $request->id) }}" data-toggle="tooltip" title="Show">
                                                Show Request
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('users/' . $request->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                Change Status / Edit Request
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('usersmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('usersmanagement.enablePagination'))
                                {{ $requests->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($requests) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
