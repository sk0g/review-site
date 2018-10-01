@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title')
    {{ $details->album_name }} by {{ $details->name }}
@endsection

@section('body')
    <br> <br>
    <img src="{{ $details->album_art }}" alt="Album Art" class="album-art"/>

    <h1> {{ $details->album_name }} </h1> <br>
    <div class="album-details">
        Artist: <b>{{ $details->name }}</b> <br>
        Country: <b>{{ $details->country }}</b> <br>
        Genre: <b>{{ $details->genre }}</b> <br>
        Year of Release: <b>{{ $details->release_year }}</b> <br>
        Reviews: <b>{{ $reviewCount }}</b> <br>
        Average User Rating: <b>{{ $reviewAverage }}</b>
    </div>

    <div class="reviews">
        @foreach ($reviews as $review)
            <a href='/edit_review/{{ $review->id}}'>
                <h2>
                    {{ $review->name }}
                    {{-- Display the relevant number of filled/ unfilled stars --}}
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->score)
                            ⛧
                        @endif
                    @endfor
                </h2>
                <em>
                    {{ $review->comment }}
                </em>
            </a>
            <br>
        @endforeach
    </div>

    <br>

    <a class="btn" href="/add_review/{{ $details->album_id }}">
        Add Review
    </a>
    <a class="btn" href="/delete_item/{{ $details->album_id }}">
        Delete Album
    </a>
    <a class="btn" href="/edit_album/{{ $details->album_id }}">
        Edit Album
    </a>
@endsection