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
                    <a href="{{ url('/home') }}"  class="active"><span class="las la-igloo"></span>
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
                Dashboard

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
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            40
                        </h1>
                        <span>Users</span>
                    </div>
                    <div>
                        <span class="las la-users">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            370
                        </h1>
                        <span>Appointments</span>
                    </div>
                    <div>
                        <span class="las la-clipboard">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            124
                        </h1>
                        <span>Washed Vehicles</span>
                    </div>
                    <div>
                        <span class="las la-car">

                        </span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            90
                        </h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet">

                        </span>
                    </div>
                </div>

            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>APPOINTMENTS</h3>
                            <button>
                                See all <span class="las la-arrow-down">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["New Appointments", "Approved Appointments", "Canceled Appointments"];
var yValues = [55, 49, 44];
var barColors = [
  "#2b5797",
  "#00aba9",
  "#b91d47"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Appointment Status"
    }
  }
});
</script>
                        </div>
                    </div>

                </div>
                
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Vehicles</h3>
                            <button>
                                See all <span class="las la-arrow-down">

                                </span>
                            </button>

                        </div>
                        <div class="card-body">
                           
<canvas id="myCharts" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Washed Vehicles", "Waiting Service Vehicles"];
var yValues = [55, 49];
var barColors = [
//   "#b91d47",
//   "#00aba9",
//   "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myCharts", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Vehicle Service Status"
    }
  }
});
</script>
                            
                        </div>
                        <br>
                        
               
        </main>
        <div class="card">
                        <div class="card-header">
                            <h3>Overall Status</h3>

                        </div>
        <div class="card-body">
        <canvas id="myChartss" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Rejected Services", "Accepted Services", "Washed Vehicles", "Customers", "Users"];
var yValues = [55, 49, 44, 29, 22];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChartss", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Overall Status"
    }
  }
});
</script>
                        </div>
    </div>
</div>
@endsection
