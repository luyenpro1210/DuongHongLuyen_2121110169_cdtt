@if(session('message'))
                    @php 
                     $arrmessage =session('message');
                     @endphp
                  <div class="alert alert-{{ $arrmessage['type'] }} alert-dismissible fade show" role="alert">
                       <strong>Thông báo</strong> {{ $arrmessage['msg'] }}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
@endif