@extends('layouts.app')


@section('content')
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <a href="{{ url('/home') }}">
                <span><img src="{{ asset('img/car.jpg') }}" style="border-radius: 1em; color: white;" width="40px" height="40px" alt=""></span><span>E-KINAMBA</span></a></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/home') }}"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('customers.index') }}"><span class="las la-users"></span>
                        <span>Manage Customers</span></a>
                </li>
                <li>
                    <a href="{{ route('cleaner.index') }}" class="active"><span class="las la-clipboard-list"></span>
                        <span>Manage Cleaner</span></a>
                </li>
                <li>
                    <a href="{{ route('vehicles.index') }}"><span class="las la-shopping-bag"></span>
                        <span>Manage Vehicles</span></a>
                </li>
                
                <li>
                    <a href="{{ route('cleaner.index') }}"><span class="las la-clipboard-list"></span>
                        <span>cleaners</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Washed Vehicles List</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Vehicles (waiting cleaners)</span></a>
                </li>
                <li>
                    <a href="{{ route('appointments.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Appointments List</span></a>
                </li>
                <li>
                    <a href="{{ url('approvedAppointments') }}"><span class="las la-clipboard-list"></span>
                        <span>Approved Appointments</span></a>
                </li>
                <li>
                    <a href="{{ url('DenyAppointments') }}"><span class="las la-clipboard-list"></span>
                        <span>Canceled Appointments</span></a>
                </li>
                
                <li>
                    <a href="{{ route('payment.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Payment list</span></a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}"> <span class="las la-clipboard-list"></span>
                        <span>Manage Roles</span></a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"><span class="las la-user-circle"></span>
                        <span>Manage Users</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"> </span>

                </label>
                Cleaner

            </h2>
            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div> -->
            <div class="user-wrapper">
                <img src="{{ asset('img/pict.jpg') }}" width="40px" height="40px" alt="">
                <div>
                    <h4>{{ Auth::user()->name }}</h4>
                </div>
                <div>
                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <img style="margin-left: 1em; margin-right: -0.1em;" src="{{ asset('img/logout.jpg') }}" width="20px" height="20px" alt="">  {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
            </div>
            
        </header>
   <div class="container">
   <div class="card" style="padding: 1em; width: 40em;  margin-top: 2.5em;">
   <div class="row">
        <div>
            <div class="pull-left">
                <h2>Add New Cleaner</h2>
            </div>
            
        </div>
    </div>
	<br>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('cleaner.store') }}" method="POST">
    	@csrf
	<div class="card" style="padding: 1em;">
	<div class="row">
		    <div class="col-xs-6 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="Name" class="form-control CustomerLabel" placeholder="cleaner Name">
		        </div>
		    </div>
		    <div class="col-xs-6 col-sm-6 col-md-12">
		        <div class="form-group">
		            <strong>Phone</strong>
		             <input type="text" name="Phone" class="form-control CustomerLabel" placeholder="cleaner Phone">
		         </div>
		    </div>
		    <div class="col-xs-6 col-sm-6 col-md-12">
		        <div class="form-group">
		            <strong>Address</strong>
		             <input type="text" name="Address" class="form-control CustomerLabel" placeholder="cleaner Address">
		         </div>
		    </div>
		   
		   
		</div>
	</div>
	<div class="card" style="padding: 1em; margin-top: 1em;">
	<div class="col-xs-7 col-sm-7 col-md-7 text-center" style="">
		            <button type="submit" class="btn btn-primary">Save</button>
			
                <a class="btn btn-success" href="{{ route('cleaner.index') }}"> Back</a>
		    </div>
	</div>
    </form>
   </div>
   </div>
@endsection