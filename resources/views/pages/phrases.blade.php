@extends('layouts.master')

@section('subpagecontent')
<div class="col-lg-12">
  <div class="resultsbox">
    <h2>Pick a Phrase</h2>
    <div id="gallery">
      @foreach($phrases->chunk(3) as $rowphrase)
      <div class="row">
        @foreach($rowphrase as $phrase)
        <div class="col-md-4">
          <div class="item">

            <img src="/img/phrases/thumb_{{ $phrase->p5jsimg }}" class="img-responsive" alt="T-shirt image">
            <div class="middle">
              <a href="/idea/new/{{ $phrase->id }}" class="btn btn-info btn-xl"><i class="fa fa-check-circle" aria-hidden="true"></i> Select</a>
            </div>
              <br>
            <h5>

              @if ($phrase->line1)
              {{ $phrase->line1 }}
              @else
              <span class="exampletext">___________</span>
              @endif

              @if ($phrase->line2)
              {{ $phrase->line2 }}
              @else
              <span class="exampletext">___________</span>

              @endif

              @if ($phrase->line3)
              {{ $phrase->line3 }}
              @elseif ($phrase->numlines > 2)
              <span class="exampletext">___________</span>

              @endif

            </h5>
            <br>


          </div>
        </div>
        @endforeach

      </div>

      @endforeach

    </div>
  </div>
</div>
@endsection
