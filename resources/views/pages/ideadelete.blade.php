@extends('layouts.master')

@section('subpagecontent')
<div class="col-lg-12">
  <div class="resultsbox">
    <form method='POST' action='/idea/delete'>
      {{ csrf_field() }}

      <input type='hidden' name='id' value='{{$idea->id}}'>

      Are you sure you want to delete:
      <div class="phraselineblk">
        {{ $idea->line1 }} {{ $idea->line2 }} {{ $idea->line3 }}
      </div>
      <br>
      
      <button type="submit" class="btn btn-xl">Yes</button>
      <a href="/ideas" type="button" class="btn btn-xl">No</a>

    </form>
  </div>
</div>
@endsection
