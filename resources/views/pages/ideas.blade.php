@extends('layouts.master')

@section('subpagecontent')

<!-- Ideas -->
<div class="col-lg-12">
  <div class="resultsbox">
    @if(Session::get('message') != null)
    <br><br><div class="alert alert-info">{{ Session::get('message') }}</div><br>
    @endif

@if (Auth::check())
<div class="row">
  <div class="col-md-9">
    <h2>Customize T-Shirts Dashboard</h2>

    <a href="/phrases" class="btn btn-xl">Add New</a><br><br>
  </div>
    <div class="col-md-3">
    Logged in as: {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}<br>
</div>
</div>
  <h3>Your T-shirt Ideas</h3>
<div id="dashboardgallery">
        @foreach($ideas->chunk(3) as $rowideas)
<div class="row">
         @foreach($rowideas as $idea)
        <div class="col-md-4 text-center">
            <div class="item">
<h5>
              @if ($idea->line1)
              {{ $idea->line1 }}
              @endif

              @if ($idea->line2)
              {{ $idea->line2 }}
              @endif

              @if ($idea->line3)
              {{ $idea->line3 }}
              @endif
            </h5>
              <br>
              <a href="/idea/edit/{{ $idea->id }}" ><img src="/img/items/thumb_{{ $idea->p5jsimg }}" onerror="this.src='/img/items/blank.jpg'" class="img-responsive"></a><br><br>

                <a href="/idea/edit/{{ $idea->id }}" class="btn btn-success btn-small"><i class="fa fa-pencil" aria-hidden="true"></i> Update</a>
                <a href="/idea/delete/{{ $idea->id }}" class="btn btn-danger btn-small"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>

            </div>
      </div>
       @endforeach

           </div>

            @endforeach

        <br>
@else
Please Login

    @endif
      </div>
      </div>
    </div>


@endsection
