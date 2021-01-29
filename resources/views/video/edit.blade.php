@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Editar {{$video->title}}</h2>
    <div class="row">
      
        <form enctype="multipart/form-data" action="{{route('videoUpdate',['video_id'=>$video->id])}}" method="POST" class="col-lg-7">
            {!! csrf_field() !!}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" name="title" value="{{$video->title}}" id="title" class="form-control"/>

            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description"  class="form-control">{{$video->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Miniatura</label>
                <hr/>
                @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb">
                            <div class="video-image-mask float-left">
                                <img src="{{url('/miniatura/'.$video->image)}}" class="video-image float-left" />
                            </div>
                        </div>
                        @endif
                <input type="file" name="image" id="image" class="form-control"/>
            </div>

            <div class="form-group">
          
                <label for="video">Archivo de video</label>
                <hr/>
                <video controls id="video-player" src="{{route('fileVideo',['fileName'=>$video->video_path])}}">Tu navegador no es compatible con HTML 5</video>
                <input type="file" name="video" id="video" class="form-control"/>
            </div>
            <button type="submit" class="btn btn-success">Modificar video</button>
        
        </form>
    </div>
    </div>

@endsection