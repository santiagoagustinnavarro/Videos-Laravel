         
            <div id="videos-list">
                @if(count($videos)>=1)

                @foreach($videos as $video)
                <div class="video-item col-md-10 float-left card card-default">
                    <div class="card-body">
                        <!--Imagen del video -->
                        @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb col-md-2 float-left">
                            <div class="video-image-mask float-left">
                                <img src="{{url('/miniatura/'.$video->image)}}" class="video-image float-left" />
                            </div>
                        </div>
                        @endif
                        <div class="data">
                            <h4 class="video-title"><a href="{{route('detailVideo',['video_id'=>$video->id])}}"> {{$video->title}} </a></h4>
                           <p> <a href="{{route('channel',['user_id'=>$video->user->id])}}">{{$video->user->name.$video->user->surname}}</a> :{{\FormatTime::LongTimeFilter($video->created_at) }}</strong></p>
                            @if(Auth::check() && Auth::user()->id == $video->user->id)
                            <a class="btn btn-success" href="{{route('detailVideo',['video_id'=>$video->id])}}">Ver</a>    
                            <a class="btn btn-warning" href="{{route('videoEdit',['video_id'=>$video->id])}}">Editar</a>
                            <a href="#victorModal{{$video->id}}" role="button" class="btn float-right btn-primary btn-sm"
                    data-toggle="modal">Eliminar</a>

                <!-- Modal / Ventana / Overlay en HTML -->
                
                    <div id="victorModal{{$video->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Seguro que quieres borrar este video?</p>
                                    <p class="text-warning"><small>{{$video->title}}</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    
                                    <a href="{{url('/delete-video/'.$video->id)}}"><button type="button" class="btn btn-danger">Eliminar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endif
                        </div>
                    </div>
                    <!-- Botones de acción -->

                </div>
                @endforeach
            </div>
        


        

   
    <div class="clearfix"></div>
    {{$videos->links('pagination::bootstrap-4')}}
    @else
        <div class="alert alert-warning">No hay ningún video</div>
    @endif
