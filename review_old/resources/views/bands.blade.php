@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title') Welcome!
@endsection

@section('body')
@if ($bands)
    <ul>
        @foreach ($bands as $band)
        <a href="/band_albums/{{ $band->id }}">
            <li>
                <h2>{{ $band->name }}</h2>
            </li>
        </a>
        @endforeach
    </ul>
@else No artists found
@endif
@endsection