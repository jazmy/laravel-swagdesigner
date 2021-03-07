@extends('layouts.master')

@section('subpagecontent')

<form method='POST' action='/phrase/save'>
  {{ csrf_field() }}

  <input type='hidden' name='id' value='{{$phrase->id}}'>

  @if ($phrase->line1)
  {{ $phrase->line1 }}
  @else
  <input type="text" class="form-control" placeholder="Line One" id="line1" name="line1" value="{{ old('line1') }}">
  @endif
  <br>
  @if ($phrase->line2)
  {{ $phrase->line2 }}
  @else
  <input type="text" class="form-control" placeholder="Line Two" id="line2" name="line2" value="{{ old('line2') }}">

  @endif
  <br>
  @if ($phrase->line3)
  {{ $phrase->line3 }}
  @elseif ($phrase->numlines > 2)
  <input type="text" class="form-control" placeholder="Line Three" id="line3" name="line3" value="{{ old('line3') }}">

  @endif
  <br>
  <button type="submit" class="btn btn-xl">Save</button>
</form>
@endsection
