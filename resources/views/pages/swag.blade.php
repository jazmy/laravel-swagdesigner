@extends('layouts.master')

@section('content')

@include('layouts.partials._header')

<!-- About Section -->
<section id="about" class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">Assignment 4</h2>
        <h3 class="section-subheading text-muted">My Final Laravel &amp; P5Js Dom Manipulation Assignment</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="team-member">
          <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
          <h4>Laravel</h4>
          <p class="text-muted">Php Framework</p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="team-member">
          <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
          <h4>Twitter Bootstrap</h4>
          <p class="text-muted">CSS Framework</p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="team-member">
          <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
          <h4>P5 JS</h4>
          <p class="text-muted">Javascript Processing Library</p>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="team-member">
          <img src="img/team/4.jpg" class="img-responsive img-circle" alt="">
          <h4>JQuery</h4>
          <p class="text-muted">Javascript Library</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 text-center">
        <p class="large text-muted">
          For my final project I created a custom t-shirt generator that I can use as a zazzle affiliate.
          <br><br>
          <a href="https://www.zazzle.com/"> Zazzle</a> is a website for ordering customized items with your own text or images.
          <br><br>
          The site was built with Laravel and Mysql.
          It demonstrate all 4 CRUD database interactions and utilize at least 2 primary tables
          that are connected via at least 1 pivot table. It includes html forms that are validated.
          All tables include functioning Migrations and Seeders.
          <br><br>

        </p>
      </div>
    </div>
  </div>
</section>

<!-- Order Form Section -->
<section id="contact">
  <div class="container">
    <div class="row">
  @include('layouts.partials._phrases')
      </div>
    </div>
</section>
@endsection
