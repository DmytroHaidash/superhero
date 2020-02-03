@extends('layouts.app', ['app_title' => 'Heroes'])

@section('content')
    <div class="d-flex mb-5 mt-5 ml-5">
        <h1 class="mb-0 h2">Heroes</h1>
        <div class="ml-3">
            <a href="{{ route('heroes.create') }}" class="btn btn-primary">
                Create New Hero
            </a>
        </div>
    </div>
    <div class="row center-block">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nickname</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($superheroes as $hero)
                    <tr>
                        <th>{{ $hero->nickname​ }}</th>
                        <th>
                            @if ($hero->hasMedia('uploads'))
                                <img src="{{ $hero->getFirstMediaUrl('uploads') }}" width="50" height="50">
                            @endif
                        </th>
                        <th>
                            <a class="btn btn-info" href="{{route('heroes.show', $hero)}}"
                               style="float: left; margin: 2px;">View</a>
                            <a class="btn btn-warning" href="{{route('heroes.edit', $hero)}}"
                               style="float: left; margin: 2px;">Edit</a>
                            <form method="post" action="{{ route('heroes.destroy', $hero) }}" style="float: left; margin: 2px;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="3">Heroes not created yet</th>
                    </tr>

                @endforelse
            </table>
            {{ $superheroes->links() }}
        </div>
    </div>
@endsection