@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title') Welcome!
@endsection

@section('body')
@if ($albums)
    <ul>
        @foreach ($albums as $item)
        <a href="/album_details/{{ $item->album_id }}">
            <li>
                <div class="album">
                    <img src="{{ $item->album_art }}" height="167" width="167">
                    <h3>{{ $item->album_name }} ({{$item->release_year}})</h3>
                    <p>{{ $item->name }}</p>
                    <p>Reviewed {{ $item->count }} times</p>
                    @if ($item->count)
                        <p>Average rating: {{ $item->average_score }}</p>
                    @endif
                </div>
            </li>
        </a>
        @endforeach
    </ul>
@else No albums found
@endif
@endsection