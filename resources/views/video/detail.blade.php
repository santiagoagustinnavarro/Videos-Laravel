@extends('layouts.app')

@section('content')
<div class="col-md-10 offset-md-2">
    <h2>{{$video->title}}</h2>
    <hr/>
    <div class="col-md-8">
        <!-- Video -->
        <video controls id="video-player" src="{{route('fileVideo',['fileName'=>$video->video_path])}}">Tu navegador no es compatible con HTML 5</video>
        <!-- Descripcion -->
        <div class="card video-data">
            <div class="card-header">
                <div class="card-title">
                    Subido por <strong> <a href="{{route('channel',['user_id'=>$video->user->id])}}">{{$video->user->name.$video->user->surname}}</a> {{\FormatTime::LongTimeFilter($video->created_at) }}</strong>
                </div>

            </div>
            <div class="card-body">
                {{$video->description}}

            </div>

        </div>
        <!-- Comentarios -->
            @include('video.comments')


    </div>
</div>
@endsection