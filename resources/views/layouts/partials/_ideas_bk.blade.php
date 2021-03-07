<!-- Ideas -->
<div class="col-lg-12">
  <div class="resultsbox">
    @if(Session::get('message') != null)
    <br><br><div class="alert alert-info">{{ Session::get('message') }}</div><br>
    @endif
    <h2>Customize T-Shirts</h2>
    <a href="/phrases" class="btn btn-xl">Add New</a><br><br>
    <h3>T-shirt Ideas</h3>

        @foreach($ideas as $idea)
        <div class="col-md-4">
            <img src="/img/items/thumb_{{ $idea->p5jsimg }}">
            <a href="/idea/edit/{{ $idea->id }}" class="btn btn-success btn-small"><i class="icon-pencil"></i> Update</a></td>

              @if ($idea->line1)
              {{ $idea->line1 }}
              @endif

              @if ($idea->line2)
              {{ $idea->line2 }}
              @endif

              @if ($idea->line3)
              {{ $idea->line3 }}
              @endif

              <a href="/idea/delete/{{ $idea->id }}" class="btn btn-danger btn-small"><i class="icon-trash"></i> Delete</a></td>
      </div>
            @endforeach

        <br>
      </div>
    </div>
