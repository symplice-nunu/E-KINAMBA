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
                    <a href="{{ route('customers.index') }}" class="active"><span class="las la-users"></span>
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
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Washed Vehicles List</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Vehicles (waiting services)</span></a>
                </li>
                <li>
                    <a href="{{ route('appointment.index') }}"><span class="las la-clipboard-list"></span>
                        <span>Appointments List</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-clipboard-list"></span>
                        <span>Approved Appointments</span></a>
                </li>
                <li>
                    <a href="# "><span class="las la-clipboard-list"></span>
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
                <h2>E-Kinamba Customers List</h2>
    </div> <br>
   <div class="card" style="padding: 0.5em; margin-bottom: 0.5em;">
   <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-right">
                @can('customer-create')
                <a class="btn btn-success" href="{{ route('customers.create') }}"><span class="las la-plus"></span> New Customer</a>
                @endcan
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
    
        <tr>
            
            <th style="backgroung-color: red;">No</th>
            <th>Customer Name</th>
            <th>CustomerAddress</th>
            <th>Phone Number</th>
            <th>Plate Number</th>
            <th width="190px">Action</th>
        </tr>
	    @foreach ($customers as $customer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $customer->CustomerName }}</td>
	        <td>{{ $customer->CustomerAddress }}</td>
	        <td>{{ $customer->CustomerPhoneNumber }}</td>
	        <td>{{ $customer->PlateNumber }}</td>
	        <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                    <!-- <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a> -->
                    @can('customer-edit')
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}"><span class="las la-pen"></span> Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('customer-delete')
                    <button type="submit" class="btn btn-danger"><span class="las la-trash"></span> Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
</div>



   </div>
   </div>
   <div>
   <!-- {!! $customers->links() !!} -->
   </div>
</div>

@endsection