@extends('Admins.AdminDashBoard')
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
 <div class="container">    
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">User Data</h3>
         </div>
         <div class="panel-body">
         <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                     <th width="30%">Transaction Slip</th>
                     <th width="70%">Name</th>
                  </tr>
                  @foreach($data as $row)
                  <tr>
                   <td>
                    <img src="store_image/fetch_image/{{ $row->id }}"  class="img-thumbnail" width="75" />
                   </td>
                   <td>{{ $row->user_name }}</td>
                  </tr>
                  @endforeach
              </table>
              {!! $data->links() !!}
             </div>
         </div>
     </div>
    </div>
 </body>
</html>