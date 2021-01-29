@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        <div class="container">
            <div class="col-md-4">
                <h2>Busqueda: {{$search}}</h2>
                <br />
            </div>

            <div class="col-md-8 float-right">
                <form action="{{url('/buscar/'.$search)}}" class="col-md-3 offset-md-9  float-right" method="GET">
                    <label for="filter">Ordenar</label>
                    <select name="filter" id="filter" class="form-control">
                        <option value="new">Mas nuevos primero</option>
                        <option value="old">Mas antiguos primero</option>
                        <option value="alfa">De la A a la Z</option>

                    </select>

                    <input type="submit" value="Ordenar" class="btn btn-sm btn-primary btn-filter" />
                </form>

            </div>

            <div class="clearfix"></div>
            @include('video.videosList')
        </div>

    </div>
</div>
@endsection
