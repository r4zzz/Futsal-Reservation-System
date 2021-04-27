@extends('Clients.ClientDashBoard')
@section('MenuContent')
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Payment Details</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container-fluid">    
  <br />
  <h3 align="center" style="color: white;">Upload details for payment</h3>
    <br />
    @if($errors->any())
    <div class="alert alert-danger">
           <ul>
           @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
           @endforeach
           </ul>
        </div>
    @endif

    @if(session()->has('success'))
     <div class="alert alert-success">
     {{ session()->get('success') }}
     </div>
    @endif
    <br />

    <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">User Form</h3>
         </div>
         <div class="panel-body">
         <br />
         <form method="post" action="{{ url('store_image/insert_image') }}"  enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          <div class="row">
           <label class="col-md-4" align="right">Esewa Payment Details</label>
           <div class="col-md-8">
            <input type="text" readonly="readonly" class="form-control" placeholder="9860981785" />
           </div>
          </div>
         </div>

         <div class="form-group">
          <div class="row">
           <label class="col-md-4" align="right">Enter Name</label>
           <div class="col-md-8">
            <input type="text" name="user_name" class="form-control" />
           </div>
          </div>
         </div>

         <div class="form-group">
          <div class="row">
           <label class="col-md-4" align="right">Select Transaction Slip Image</label>
           <div class="col-md-8">
            <input type="file" name="user_image" />
           </div>
          </div>
         </div>
         <div class="form-group" align="center">
          <br />
          <br />
          <input type="submit" name="store_image" class="btn btn-primary" value="Submit" />
         </div>
         </form>
      </div>
     </div>
   </body>
</html>
@endsection