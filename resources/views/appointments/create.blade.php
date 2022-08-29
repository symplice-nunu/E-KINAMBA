<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>E-KINAMBA</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type='text/javascript'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet" />
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" rel="stylesheet" />
    <style>
        #success_message{ display: none;}
    </style>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-liberty-market.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{ asset('img/car.jpg') }}" style="border-radius: 1em; height: 4em; width: 4em;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="{{ url('carHome') }}" class="active">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="{{ url('appointments/create') }}" class="active">Make Appointment</a></li>
                        <li><a href="{{ url('login') }}">Login</a></li>
                    </ul>   
                    <!-- <a class='menu-trigger'>
                        <span>Menu</span>
                    </a> -->
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Book Your Appointment</h2>
                </div>
              </div>
              
              <div class="container">

    <form class="well form-horizontal" action="{{ route('appointments.store') }}" method="POST"  id="contact_form">
    @csrf
<fieldset>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="form-group">
  <label class="col-md-4 control-label" >Names</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-user"></i></span>
  <input name="names" placeholder="Enter Your Names" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Phone Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-user"></i></span>
  <input name="phone" placeholder="Enter Your Phone Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Plate Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-user"></i></span>
  <input name="plateNumber" placeholder="Enter Your Plate Number" class="form-control"  type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Car Model</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-list"></i></span>
        <select name="carModel" class="form-control selectpicker" id="model"  onclick="checkTest()">
      <option value="">Select your Car Model</option>
      <option>Toyota TXL</option>
      <option>Toyota Collora</option>
      <option >Toyota RAVA4</option>
      <option >Mercedes Benz ML</option>
    </select>
  </div>
</div>
</div>

<div class="form-group"> 
<label class="col-md-4 control-label">Service</label>
  <div class="col-md-4 selectContainer">
  <div class="input-group">
      <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-list"></i></span>
      <select name="Service" class="form-control selectpicker" id="service" onclick="checkTest()">
    <option value="">Select Your Service</option>
    <option value="Body Washing">Body Washing</option>
    <option value="Polishing">Polishing</option>
    <option value="Garpet Cleaning">Garpet Cleaning</option>
    <option value="Ice wax Foam">Ice wax Foam</option>
    <option value="Interior Cleaning">Interior Cleaning</option>
  </select>
</div>
</div>
</div>
<div class="form-group"> 
<label class="col-md-4 control-label">Additional Service</label>
  <div class="col-md-4 selectContainer">
  <div class="input-group">
      
      &nbsp; &nbsp; <p style="color: #000000;"><input type="checkbox" name="AdditionalService[]" value="Body Washing" id="s1" onclick="checkAdditionalService()"> &nbsp;Body Washing&nbsp;&nbsp;&nbsp;<input type="checkbox" name="AdditionalService[]" value="Polishing"  onclick="checkAdditionalService()" id="s2">  &nbsp;Polishing&nbsp;&nbsp;&nbsp;<input type="checkbox" name="AdditionalService[]" value="Garpet Cleaning"  onclick="checkAdditionalService()" id="s3"> &nbsp;Garpet Cleaning&nbsp;&nbsp;&nbsp;<input type="checkbox" name="AdditionalService[]" value="Ice wax Foam"  onclick="checkAdditionalService()" id="s4">&nbsp;Ice wax Foam&nbsp;&nbsp;&nbsp;<input type="checkbox" name="AdditionalService[]" value="Interior Cleaning"  onclick="checkAdditionalService()" id="s5">&nbsp;Interior Cleaning</p>
      
</div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Cost</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-user"></i></span>
  <input name="cost"  id="cost" readonly class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Date</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-user"></i></span>
  <input name="carwashdate" placeholder="Enter Your Plate Number" class="form-control"  type="datetime-local">
    </div>
  </div>
</div>



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon" style="width: 3em;"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>
             
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  

  

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 <a href="#">E-KINAMBA</a> Car Wash. All rights reserved.
          &nbsp;&nbsp;
          Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">HIRWA Jackson</a></p>
        </div>
      </div>
    </div>
  </footer>
<script>
    
function checkTest(){
  var model = $("#model").val();
  var service = $("#service").val();
  if ( model == 'Toyota TXL' && service == 'Body Washing'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota TXL' && service == 'Polishing'){
    var Cost = 4000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota TXL' && service == 'Garpet Cleaning'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota TXL' && service == 'Ice wax Foam'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota TXL' && service == 'Interior Cleaning'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota Collora' && service == 'Body Washing'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota Collora' && service == 'Polishing'){
    var Cost = 2000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota Collora' && service == 'Garpet Cleaning'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota Collora' && service == 'Ice wax Foam'){
    var Cost = 2000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota Collora' && service == 'Interior Cleaning'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota RAVA4' && service == 'Body Washing'){
    var Cost = 4000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota RAVA4' && service == 'Polishing'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota RAVA4' && service == 'Garpet Cleaning'){
    var Cost = 4000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota RAVA4' && service == 'Ice wax Foam'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Toyota RAVA4' && service == 'Interior Cleaning'){
    var Cost = 4000;
    $('#cost').val(Cost);
  }else if ( model == 'Mercedes Benz ML' && service == 'Body Washing'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else if ( model == 'Mercedes Benz ML' && service == 'Polishing'){
    var Cost = 4000;
    $('#cost').val(Cost);
  }else if ( model == 'Mercedes Benz ML' && service == 'Garpet Cleaning'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else if ( model == 'Mercedes Benz ML' && service == 'Ice wax Foam'){
    var Cost = 3000;
    $('#cost').val(Cost);
  }else if ( model == 'Mercedes Benz ML' && service == 'Interior Cleaning'){
    var Cost = 5000;
    $('#cost').val(Cost);
  }else{
    $('#cost').val('');
  }
}
// $("#s1").click(function () {
//      if($("#s1:checked").length == false){
//         $("#cost").val();
//      }
     
//    });
function checkAdditionalService(){
  var model = $("#model").val();
  var s1 = $("#s1").val();
  var s2 = $("#s2").val();
  var s3 = $("#s3").val();
  var s4 = $("#s4").val();
  var s5 = $("#s5").val();
  var costs = parseInt($("#cost").val());
  if ( model == 'Mercedes Benz ML' && s1 == 'Body Washing' && $("#s1:checked").length == true){
    var Cost = 5000;
    var totalAdd = (Cost + costs);
    $('#s1').prop('disabled', true);
    $('#cost').val(totalAdd);
  }else if ( model == 'Mercedes Benz ML' && s2 == 'Polishing' && $("#s2:checked").length == true){
    var Cost = 4000;
    var totalAdd = (Cost + costs);
    $('#s2').prop('disabled', true);
    $('#cost').val(totalAdd);
  }else if ( model == 'Mercedes Benz ML' && s3 == 'Garpet Cleaning' && $("#s3:checked").length == true){
    var Cost = 5000;
    var totalAdd = (Cost + costs);
    $('#s3').prop('disabled', true);
    $('#cost').val(totalAdd);
  }else if ( model == 'Mercedes Benz ML' && s4 == 'Ice wax Foam' && $("#s4:checked").length == true){
    var Cost = 3000;
    var totalAdd = (Cost + costs);
    $('#s4').prop('disabled', true);
    $('#cost').val(totalAdd);
  }else if ($("#s5:checked").length == true){
    var Cost = 5000;
    var totalAdd = (Cost + costs);
    $('#s5').prop('disabled', true);
    $('#cost').val(totalAdd);
  }else if ($("#s1:checked").length == false){
    var Cost = 5000;
    var totalAdd = (costs - Cost);
    $('#cost').val(totalAdd);
  }else if ($("#s2:checked").length == false){
    var Cost = 4000;
    var totalAdd = (costs - Cost);
    $('#cost').val(totalAdd);
  }else if ($("#s3:checked").length == false){
    var Cost = 5000;
    var totalAdd = (costs - Cost);
    $('#cost').val(totalAdd);
  }else if ($("#s4:checked").length == false){
    var Cost = 3000;
    var totalAdd = (costs - Cost);
    $('#cost').val(totalAdd);
  }else if ( model == 'Mercedes Benz ML' && s5 == 'Interior Cleaning' && $("#s5:checked").length == false){
    var Cost = 5000;
    var totalAdd = (costs - Cost);
    $('#cost').val(totalAdd);
  }
}
    
</script>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('js/isotope.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/wow.js') }}"></script>
  <script src="{{ asset('js/tabs.js') }}"></script>
  <script src="{{ asset('js/popup.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

  </body>
</html>