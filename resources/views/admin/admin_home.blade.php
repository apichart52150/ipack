@extends('layouts.main_admin')



@section('page-title')
    <!-- start page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>     
@endsection


@section('content')

    <div class="row">
        
        <div class="col-xl-6 col-md-6">
            <a href="{{ route('writing_dashboard')}}">
                <div class="widget-bg-color-icon card-box">
                    <div class="avatar-lg rounded-circle bg-icon-warning float-left">
                        <i class="fas fa-highlighter font-24 avatar-title text-white"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span class="counter">IELTS Practice</span></h3>
                        <h3 class="text-warning mb-0"><span class="counter">Writing</span></h3>
                    </div>
                    <div class="clearfix"></div>
            </div>
            </a>
        </div>

        <div class="col-xl-6 col-md-6">
            <a href="{{route('speaking_dashboard')}}">
                <div class="widget-bg-color-icon card-box">
                    <div class="avatar-lg rounded-circle bg-icon-success float-left">
                        <i class="fas fa-comments font-24 avatar-title text-white"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span class="counter">IELTS Practice</span></h3>
                        <h3 class="text-success mb-0"><span class="counter">Speaking</span></h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

    </div>
    <!-- end row -->

    <div class="row">     

        <div class="col-xl-12 col-md-12 col-sm-12">
            <a href="{{route('staff')}}">
                <div class="widget-bg-color-icon card-box">
                    <div class="avatar-lg rounded-circle bg-icon-primary float-left">
                        <i class="fas fa-address-card font-24 avatar-title text-white"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span class="counter">Manage</span></h3>
                        <h3 class="text-primary mb-0"><span class="counter">User</span></h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

    </div>
    <!-- end row -->

    <div class="row">
        
        <div class="col-xl-6 col-md-6">
            <a href="{{ route('clubs-list')}}">
                <div class="widget-bg-color-icon card-box">
                    <div class="avatar-lg rounded-circle bg-icon-info float-left">
                        <i class="fas fa-users font-24 avatar-title text-white"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span class="counter">IELTS Practice</span></h3>
                        <h3 class="text-info mb-0"><span class="counter">Clubs</span></h3>
                    </div>
                    <div class="clearfix"></div>
            </div>
            </a>
        </div>

        <div class="col-xl-6 col-md-6">
            <a href="{{route('tutorial-list')}}">
                <div class="widget-bg-color-icon card-box">
                    <div class="avatar-lg rounded-circle bg-icon-info float-left">
                        <i class="fab fa-leanpub font-24 avatar-title text-white"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span class="counter">IELTS Practice</span></h3>
                        <h3 class="text-info mb-0"><span class="counter">Tutorial</span></h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

    </div>
    
@endsection

