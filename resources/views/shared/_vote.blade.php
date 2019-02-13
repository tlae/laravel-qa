    

    @if ($model instanceof App\Question)
      @php
        $name = 'question';
        $URISegment = 'questions' ;
      @endphp  
    @elseif ($model instanceof App\Answer)
      @php
        $name = 'answer';
        $URISegment = 'answers' ;
      @endphp  

    @endif 

    @php
        $formID = $name . "-" . $model->id ;
        $formAction = "/" . $URISegment . "/" .$model->id . "/" . "vote" ;

    @endphp

     <div class="d-flex flex-column vote-controls">
                    <a title="This {{ $name }} is useful "
                        class= "vote-up {{ Auth::guest() ? 'off' : '' }}"
                         onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formID }}').submit();"
                        > 
                        <i class="fas fa-caret-up fa-3x"></i>
                    </a>
                        <form id="up-vote-{{ $formID}}" action="{{ $formAction }}" method="POST"    style="disp:none;">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                        </form>
                    <span class="votes-count">{{ $model->votes_count }}</span>

                     <a title="This {{ $name }} is no useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                     onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formID }}').submit();"
                     > 
                          <i class="fas fa-caret-down fa-3x"></i>
                     </a>

                       <form id="down-vote-{{ $formID }}" action="{{ $formAction }}" method="POST"    style="disp:none;">
                            @csrf
                            <input type="hidden" name="vote" value="-1">
                        </form>

                        @if ($model instanceof App\Question)
                            @include ('shared._favorite', [
                              'model' => $model
                              ])
                        @elseif ($model instanceof App\Answer)
                            @include ('shared._accept', [
                              'model' => $model
                              ])

                        @endif
                    </div>  