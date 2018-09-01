@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title') Welcome!
@endsection

@section('body')
@if ($albums)
    <ul>
        @foreach ($albums as $item)
        <li>
            <a href="www.stupid-link.com"
                <div class="album">
                    <img src="{{ $item->album_art }}" height="167" width="167">
                    <h3>{{ $item->album_name }}</h3>
                    <p>{{ $item->name }}</p>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
@else No albums found
@endif
@endsection