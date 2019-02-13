
                      @can ('accept', $model)
                         <a title="Mark this answer as best answer" 
                            class="{{ $model->status }} mt-2"
                            onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"
                            >
                              <i class="fas fa-check fa-2x"></i>
                          </a>

                          <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST" style="disp:none;">
                            @csrf
                          </form>
                          @else
                            @if ($model->is_best)
                              <a title="The owner of question accepted this answer as best answer" 
                                class="{{ $model->status }} mt-2">
                                  <i class="fas fa-check fa-2x"></i>
                              </a>
                              @endif
                      @endcan