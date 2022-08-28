<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        <!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
    </style>
</head>
<body>
    

   <div class="card" style="padding: 0.5em; margin-top: 2.5em;">
   <div class="container"  align="center">
   <div class="pull-left">
                <h2>E-Kinamba Cleaners List</h2>
    </div> <br>
 
    
   </div>
<div class="card" style="padding: 0.5em;">
    
<table class="table table-bordered" id="customers" align="center">
    
<tr>
            
            <th style="backgroung-color: red;">No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
	    @foreach ($cleaners as $cleaner)
	    <tr>
	        <td>{{ $cleaner->id }}</td>
	        <td>{{ $cleaner->Name }}</td>
	        <td>{{ $cleaner->Phone }}</td>
	        <td>{{ $cleaner->Address }}</td>
	       
	    </tr>
	    @endforeach
    </table>
</div>



   </div>
   </div>
   <div>
   </div>
</div>

</body>
</html>