@extends('layouts.app')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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
                <!-- <li>
                    <a href="{{ route('vehicles.index') }}"><span class="las la-shopping-bag"></span>
                        <span>Manage Vehicles</span></a>
                </li> -->
                
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
                    <a href="{{ url('approvedAppointments') }}"><span class="las la-clipboard-list"></span>
                        <span>Approved Appointments</span></a>
                </li>
                <li>
                    <a href="{{ url('DenyAppointments') }}"><span class="las la-clipboard-list"></span>
                        <span>Canceled Appointments</span></a>
                </li>
                
                <li>
                    <a href="{{ url('payment') }}"  class="active"><span class="las la-clipboard-list"></span>
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
                Customer

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
                <h2>E-Kinamba Customers Payment List</h2>
    </div> <br>
   <div class="card" style="padding: 0.5em; margin-bottom: 0.5em;">
   <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
              
                <a class="btn btn-primary" href="{{ url('generate-payment-pdf') }}"><span class="las la-download"></span>Download</a>
            
                <div style=" text-align: right;">
                <input id="myInput" class="" type="text" placeholder="Search.." style="height: 2em; margin-top: -2.3em;">
            </div> 
            </div>
        </div>
    </div>
    
   </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="card" style="padding: 0.5em;">
    
<table class="table table-bordered">
    <thead>
        <tr>
            
            <th style="backgroung-color: red;">No</th>
            <th>Customer Names</th>
            <th>Service</th>
            <th>Amount</th>
            <th>Payment Date</th>
        </tr></thead>
	    @foreach ($payments as $customer)
        <tbody id="myTable">
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $customer->names }}</td>
	        <td>{{ $customer->service }}</td>
	        <td>{{ $customer->amount }}&nbsp;Frw</td>
	        <td>{{ $customer->paymentDate }}</td>
	        
	    </tr>
        </tbody>
	    @endforeach
    </table>
</div>



   </div>
   </div>
   <div>
   </div>
</div>

@endsection