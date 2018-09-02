@extends('layouts/base-page')
@section('scripts')
    <style>
        input{width: 600px};
    </style>
@endsection

@section('title')
    {{ $details->album_name }} by {{ $details->name }}
@endsection

@section('body')
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

    <br>

    <a class="btn" href="/add_review/{{ $details->album_id }}">
        Add a review
    </a>
    <a class="btn" href="/delete_item/{{ $details->album_id }}">
        Delete this album
    </a>
@endsection