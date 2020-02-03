@extends('layouts.app', ['app_title' => 'Edit Heroes'])
@section('content')
    <div class="row center-block ml-5 mt-5">
        <div class="col-6">
            <form method="post" action="{{route('heroes.update', $hero)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nickname​">Nickname:</label>
                    <input id="nickname​" type="text" name="nickname​" class="form-control"
                           value="{{ $hero->nickname​ }}" required>
                </div>
                <div class="form-group">
                    <label for="real_name">Real name:</label>
                    <input id="real_name" type="text" name="real_name" class="form-control"
                           value="{{ $hero->real_name }}" required>
                </div>
                <div class="form-group">
                    <label for="origin_description">Origin description:</label>
                    <textarea class="form-control" rows="5" id="origin_description" name="origin_description"
                              required>{{$hero->origin_description​}}</textarea>
                </div>
                <div class="form-group">
                    <label for="superpowers">Superpowers:</label>
                    <input id="superpowers" type="text" name="superpowers" class="form-control"
                           value="{{ $hero->superpowers }}" required>
                </div>
                <div class="form-group">
                    <label for="catch_phrase">Catch phrase:</label>
                    <input id="catch_phrase" type="text" name="catch_phrase" class="form-control"
                           value="{{ $hero->catch_phrase }}"required>
                </div>
                <multi-uploader class="mt-4" :src="{{ json_encode($hero->images_list) }}"></multi-uploader>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('heroes.index')}}" class="btn btn-info"> Back </a>
            </form>
        </div>
    </div>
@endsection