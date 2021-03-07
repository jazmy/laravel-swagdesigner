@extends('layouts.master')

@section('subpagecontent')
<form method='POST' action='/idea/edit' name="ideaform" id="ideaform">
  <div class="col-md-6">
    <div class="top-padding">
      <div class="form-group">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div id="toptext" class="phraseline"></div>
        <input type='hidden' name='id' value='{{$idea->id}}'>
        <input type='hidden' name='p5jsimg' id='p5jsimg' value='{{$idea->p5jsimg}}'>
        <input type='hidden' name='template' id='template' value='{{$idea->template}}'>
        <input type="hidden" class="form-control" id="line1" name="line1" value="{{ $idea->line1 }}">
        <input type="hidden" class="form-control" id="line2" name="line2" value="{{ $idea->line2 }}">
        <input type="hidden" class="form-control" id="line3" name="line3" value="{{ $idea->line3 }}">
        <div id="dynamicfields" class="phraseline"></div>
        <div id="bottomtext" class="phraseline"></div>
        <br><br>
        <button type="submit" class="btn btn-xl" id="actionbutton">Update</button>
        <br><br>
        <div id="buynowbutton"></div>
        <br>

      </div>
    </div>
  </div>

  <div class="col-md-6">
    <h2 id="canvastitle">Preview</h2>
    <div id="canvas-container"></div>
    <div id="tagsbox">
      <h3>Tags</h3>
      @foreach($tagsForCheckboxes as $id => $name)
      <input
      type='checkbox'
      value='{{ $id }}'
      name='tags[]'
      {{ (in_array($name, $tagsForThisIdea)) ? 'CHECKED' : '' }}
      >
      {{ $name }} <br>
      @endforeach
    </div>
  </div>
</form>
<!-- p5 Js Library -->
<script src="/assets/libraries/p5.js" type="text/javascript"></script>
<script src="/assets/libraries/p5.dom.js" type="text/javascript"></script>
<script src="/assets/libraries/p5.sound.js" type="text/javascript"></script>

<script src="/js/a4.js" type="text/javascript"></script>
@endsection
