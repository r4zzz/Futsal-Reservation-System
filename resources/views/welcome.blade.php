<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@extends('layout.master')

@section('content')

<div class="container" style="margin-top: 2%;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/img1.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/img2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
            <h1 class="super-heading">Welcome To Futsal Imadol </h1>
            <p class="super-paragraph">Register yourself and Book now!!!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/img3.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h1 class="super-heading"> Grow and Develop your Skills with us</h1>
          <p class="super-paragraph">We are available from 6am till 8pm</p>
          
      </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

@stop



