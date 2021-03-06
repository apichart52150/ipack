@extends('layouts.payment')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('success') }}">back</a></li>
                        <li class="breadcrumb-item active">Payment - {{ $status }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Payment - {{ $status }}</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Payment Form</h4> 
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form action="{{ route('paymentConfirm') }}" id="basic-form" method="POST" class="mt-3" onsubmit="return confirm('Are you sure?')">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ auth('web')->user()->id }}">
                                <input type="hidden" name="package" value="{{ $status }}">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="simpleinput">Your Package</label>
                                    <div class="col-sm-10">
                                        @if($status == 'gold')
                                        <input type="text" id="simpleinput" class="form-control text-uppercase" name="price" value="{{ $status }}" disabled>
                                        @elseif($status == 'platinum')
                                        <input type="text" id="simpleinput" class="form-control text-uppercase" name="price" value="{{ $status }}" disabled>
                                        @else
                                        <input type="text" id="simpleinput" class="form-control text-uppercase" name="price" value="{{ $status }} 1 on 1 Tutorial + Writing & Speaking marked" disabled>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email"  placeholder="Email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="first_name">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{ auth()->user()->first_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="last_name">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ auth()->user()->last_name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="example-textare">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="example-textarea" name="address" rows="5" spellcheck="false" placeholder="Address..." required>{{ auth()->user()->address }}</textarea>
                                    </div>
                                </div>
                               
                              

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Payment Type</label>
                                    <div class="col-md-10">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cc" name="payMethod" value="CC" class="custom-control-input" required>
                                            <label class="custom-control-label h3" for="cc"><i class="far fa-credit-card"></i> Credit card</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="ali" name="payMethod" value="ALIPAY" class="custom-control-input" required>
                                            <label class="custom-control-label h3" for="ali"><i class="fab fa-alipay"></i> Alipay</label>
                                        </div>
										<div class="custom-control custom-radio">
                                            <input type="radio" id="tra" name="payMethod" value="Transfer" class="custom-control-input" required>
                                            <label class="custom-control-label h3" for="tra"><i class="fas fa-receipt"></i> Transfer</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Next</button>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- end container -->
@endsection
