@extends('layouts.app')
@section('title', 'Index')
@section('content')
    @foreach ($projects as $project)
        <div class="card" style="width: 18rem;">
            <img src="{{ $project['thumbnail'] }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $project['title'] }}</h5>
                <p class="card-text">{{ $project['description'] }}</p>
                <a href="{{ $project['link'] }}">Link repo</a>
                <div>{{ $project['date']->format('d/m/y') }}</div>
                <div>Linguaggi utilizzati{{ implode(', ', $project['language']) }}</div>
                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">Show</a>
            </div>
        </div>
    @endforeach
@endsection
