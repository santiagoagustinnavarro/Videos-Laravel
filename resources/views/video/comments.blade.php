<hr />
<h4>Comentarios</h4>
<hr />
@if(session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
@if(Auth::check())
<form class="col-md-4" method="POST" action="{{url('/comment')}}">
    {!!csrf_field()!!}
    <input type="hidden" name="video_id" value="{{$video->id}}" required />
    <p>
        <textarea class="form-control" name="body" id="body" required></textarea>
    </p>
    <input type="submit" class="btn btn-success" value="Comentar">

</form>
@endif

@if(isset($video->comments))

<div id="comments-list">
    @foreach($video->comments as $comment)
    <div class="comment-item col-md-12 float-left">
        <div class="card comment-data">
            <div class="card-header">
                <div class="card-title">
                    <strong>{{$comment->user->name.' '.$comment->user->surname.'  '.\FormatTime::LongTimeFilter($comment->created_at) }}</strong>
                </div>

            </div>
            <div class="card-body">
                {{$comment->body}}
                @if((Auth::check()) && (Auth::user()->id==$comment->user->id || Auth::user()->id==$video->user_id))
                <a href="#victorModal{{$comment->id}}" role="button" class="btn float-right btn-primary btn-sm"
                    data-toggle="modal">Eliminar</a>

                <!-- Modal / Ventana / Overlay en HTML -->
                
                    <div id="victorModal{{$comment->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Seguro que quieres borrar este comentario?</p>
                                    <p class="text-warning"><small>{{$comment->body}}</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                    <a href="{{url('/delete-comment/'.$comment->id)}}"><button type="button" class="btn btn-danger">Eliminar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endif
            </div>

        </div>

    </div>


    <hr />
    <div class="clearfix"></div>
    @endforeach
</div>
@endif
