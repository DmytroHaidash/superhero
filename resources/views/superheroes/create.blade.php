@extends('layouts.app', ['app_title' => 'Create New Heroes'])
@section('content')
    <div class="row center-block ml-5 mt-5">
        <div class="col-6">
            <form method="post" action="{{route('heroes.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nickname​">Nickname:</label>
                    <input id="nickname​" type="text" name="nickname​" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="real_name">Real name:</label>
                    <input id="real_name" type="text" name="real_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="origin_description">Origin description:</label>
                    <textarea class="form-control" rows="5" id="origin_description" name="origin_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="superpowers">Superpowers:</label>
                    <input id="superpowers" type="text" name="superpowers" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="catch_phrase">Catch phrase:</label>
                    <input id="catch_phrase" type="text" name="catch_phrase" class="form-control" required>
                </div>
                <multi-uploader class="mt-4"></multi-uploader>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('heroes.index')}}" class="btn btn-info"> Back </a>
            </form>
        </div>
    </div>
@endsection