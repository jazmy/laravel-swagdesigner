@extends('layouts.master')

@section('content')

<!-- Confirmationntact Section -->
<section id="confirm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="resultsbox">
          <h2 class="section-heading">View Orders</h2>
          @foreach($orders as $order)
          <h2>{{ $order->name }}</h2>
          {{ $order->message }}
          @endforeach
        </div>

      </div>
    </div>
  </div>
</section>


@endsection
