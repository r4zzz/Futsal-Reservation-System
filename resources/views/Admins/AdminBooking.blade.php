
@extends('Admins.bookNowAdmin')


@section('MenuContent')
<style type="text/css">
  .btnTime
  {
    padding-top:20px;
  }
</style>

<div class="container-fluid"  id="availTime">
  
  <div class="panel panel-info" >
  <div class="panel-heading"><h3>Available Time</h3></div>
  <div class="panel-body">
  	 <div class="row">
   @php

          $tt = date("Y-m-d",time());//current date
              $choice_date = ($_REQUEST['datecal'])? $_REQUEST["datecal"]:false;//date that came from the datepicker
              $need_sorting = ($tt==$choice_date)? true:false;
                foreach($availableTime as $time)
                {
                  $printer = '<div class="col-md-4"><div class="btn btn-primary btn-block btnTime" data-toggle="modal" data-target="#bookModal" value="'.$time->price.'">'.$time->label.'</div></div>';
                    foreach ($booking as $book ) {

  
                  if ($time->label==$book->time) {
                     $printer = '<div class="col-md-4"><div class="btn btn-danger btn-block btnTime" disabled data-toggle="modal" data-target="#bookModal" value="'.$time->price.'" style="pointer-events: none;">'.$time->label.'</div></div>';
                  }
                }

                  if($need_sorting){
                    $hour= date("H",time());

                    if ($time->label==$book->time) {
                     $printer = '<div class="col-md-4"><div class="btn btn-danger btn-block btnTime" disabled data-toggle="modal" data-target="#bookModal" value="'.$time->price.'">'.$time->label.'</div></div>';
                  }

                    if($hour>($time->maxTime)-2){
                      $printer = false;
                    }
                  }
                
                  
                  
                  echo $printer;
                }

   @endphp

  </div>
  </div>
  
 <div class="modal fade" role="dialog" id="bookModal" data-backdrop="static">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal">&times;</button>
 				<h3 class="modal-title">Admin Booking Manual</h3>
 				
 			</div>
 			<div class="modal-body">
				<div class="form">
 				<form class="form-horizontal" action="/bookNowAdmin" method="post">
          {{csrf_field()}}
  				<div class="form-group">
    				<label class="control-label col-sm-3" >Date:</label>
  				  	<div class="col-sm-9">
   				   	<input type="text" name="popupDate" class="form-control" id="popupDate" value={{$_REQUEST["datecal"]}} readonly="readonly">
 				    </div>
			  	</div>
			  	<div class="form-group">
    				<label class="control-label col-sm-3" >Time:</label>
  				  	<div class="col-sm-9">
   				   	<input type="text" name="time" class="form-control" id="time" readonly="readonly">
 				    </div>
			  	</div>
			    				<div class="form-group">
    				<label class="control-label col-sm-3" >Price:</label>
    				<div class="col-sm-9"> 
     			    <input type="text" name="price"class="form-control" id="price" readonly="readonly">
    			</div>
  				</div>
  				<div class="form-group">
            <input type="hidden" name="hiddenMail" value="{{Sentinel::getUser()->email}}">
            <input type="hidden" name="hiddenrole" value="  {{Sentinel::getUser()->roles()->first()->slug}}">              
          </div>
  				<div class="form-group "> 
   				<div class=" col-md-offset-3 col-md-4">
    	  		<input type="submit" class="btn btn-success btn-block" id="book-btn"style="height: 50px" value="Book Now">
    			</div>
  				</div>
			</form>
 				</div>
 			</div>
		
 		</div>
 	</div>
 </div>
    

</div>

<script type="text/javascript">


$(document).ready(function(){
           $("#calDate").val('{{$_REQUEST["datecal"]}}');
    });


		$(document).ready(function(){
    $("#btncal").click(function(){
       $("#popupDate").val($("#calDate").val());
    });
});

    $(document).ready(function(){
    $(".btnTime").click(function(){
      $("#time").val($(this).text());
    });
});
        $(document).ready(function(){
    $(".btnTime").click(function(){
     $("#price").val($(this).attr("value"));
    });
});
$(document).ready(function(){
    $("#book-btn").click(function(){
     $('#bookModal').modal('show');

    });
});
    


</script>
@endsection