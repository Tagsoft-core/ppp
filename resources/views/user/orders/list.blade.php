@extends('user.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>My Package History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">My Package History</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Package History</h5>
                        <p>Manage your packages at your community! Below is a comprehensive list of all your recent packages:</p>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable" id="orderTable">
                                <thead>
                                <tr>
                                    <th>QR</th>
                                    <th>Identifier</th>
                                    <th>Request Type</th>
                                    <th>Product Link</th>
                                    <th>Request Date</th>
                                    <th>Requested Pickpost On</th>
                                    <th>Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($requests as $request)
                                <tr>
                                    <td>{!! $request->qr_code !!}</td>
                                    <td>{{$request->slug}}</td>
                                    <td>{{$request->title}}</td>
                                    <td><a href="#">{{$request->ref_link}}</a></td>
                                    <td>{{$request->created_at}}</td>
                                    <td>{{$request->pickup_date}}</td>
                                    <td>@if($request->status == 1)
                                    Active
                                            @else
                                        Pending
                                            @endif
                                    </td>
                                </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
