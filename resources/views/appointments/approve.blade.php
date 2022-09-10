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
                    <a href="{{ route('cleaner.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Manage Cleaner</span></a>
                </li>
                <li>
                    <a href="{{ route('vehicles.index') }}"><span class="las la-shopping-bag"></span>
                        <span>Manage Vehicles</span></a>
                </li>
                
                <li>
                    <a href="{{ route('service.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Services</span></a>
                </li>
                <!-- <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Washed Vehicles List</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Vehicles (waiting services)</span></a>
                </li> -->
                <li>
                    <a href="{{ route('appointments.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Appointments List</span></a>
                </li>
                <li>
                    <a href="{{ url('approvedAppointments') }}"  class="active"><span class="las la-clipboard-list"></span>
                        <span>Approved Appointments</span></a>
                </li>
                <li>
                    <a href="{{ url('DenyAppointments') }}" ><span class="las la-clipboard-list"></span>
                        <span>Canceled Appointments</span></a>
                </li>
                <li>
                    <a href="{{ url('payment') }}"><span class="las la-clipboard-list"></span>
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
                Appointment

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
   <div class="card" style="padding: 0.5em; margin-top: 2.5em;">
   <div class="container">
   <div class="pull-left">
                <h2>Approve Customers Appointment</h2>
    </div> <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- <a class="btn btn-success" href="{{ route('appointments.create') }}"><span class="las la-plus"></span> New Customer</a> -->
<div class="card" style="padding: 0.5em; padding-left: 1em;">
<div class="row">
        <div>
        <form action="{{ route('appointments.update',$appointment->id) }}" method="POST">
    	@csrf
        @method('PUT')
        
        <input type="hidden" name="confirmEmail" value="{{ $appointment->email }}">
        
         <br> <br>
           <input type="hidden"name="status" value="1">
           <input type="hidden" name="ConfirmBAN" value="APPROVE">
           <input type="hidden" name="app_id" value="{{ $appointment->id }}">
            <div>
                
           <select name="cleaner" class="form-control" id="">
            <option value="">Select Cleaner</option>
            @foreach ( $cleaners as $app)
    <option value="{{ $app->Name}}">{{ $app->Name}}</option>
            @endforeach

           </select> <br>    <button class="btn btn-success"><span class="las la-check"></span> Confirm Approval</button>
            
            </div>
</form>
        </div>
    </div>
</div>



   </div>
   </div>
   <div>
   </div>
</div>

@endsection