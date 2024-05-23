@extends('user.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Order Request</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Order Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Order Request</h5>

                        <!-- General Form Elements -->
                        <form action="{{route('user.order.insert')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title | Product title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ old('title') }}" required class="form-control @error('email') is-invalid @enderror" >
                                </div>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control @error('email') is-invalid @enderror">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Order From</label>
                                <div class="col-sm-10">
                                    <input type="text" name="order_from" value="{{ old('order_from') }}" required class="form-control @error('email') is-invalid @enderror">
                                </div>
                                @error('order_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Reference Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ref_link" value="{{ old('ref_link') }}"  class="form-control @error('email') is-invalid @enderror">
                                </div>
                                @error('ref_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Pick-up Date</label>
                                <div class="col-sm-10">
                                    <input type="date" name="pickup_date" value="{{ old('pickup_date') }}"  class="form-control @error('email') is-invalid @enderror">
                                </div>
                                @error('pickup_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>

@endsection