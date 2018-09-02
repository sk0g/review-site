@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title')
    Add Review
@endsection

@section('body')
    <form method="post" action="/add_review">
        {{ csrf_field() }}
        @if (isset($review))
            <input type="hidden" name="id" value="{{ $review->id }}">
        @endif

        <input type="hidden" name="album_id" value="{{ $albumId }}">

        <h4>Name<h4>
            <input type="text"
            name="Name"
            @if (isset($review))
                value="{{ $review->name }}""
            @endif
            > <br> <br>

        <h4>Score<h4>
            <input type="radio" name="score"
            value="1" @if (isset($review) and $review->score == 1) checked="true" @endif>1 &nbsp;
            <input type="radio" name="score"
            value="2" @if (isset($review) and $review->score == 2) checked="true" @endif>2 &nbsp;
            <input type="radio" name="score"
            value="3" @if (isset($review) and $review->score == 3) checked="true" @endif>3 &nbsp;
            <input type="radio" name="score"
            value="4" @if (isset($review) and $review->score == 4) checked="true" @endif>4 &nbsp;
            <input type="radio" name="score"
            value="5" @if (isset($review) and $review->score == 5) checked="true" @endif>5 &nbsp;
            <br> <br>

        <h4>Comment<h4>
            <textarea name="Comment" cols="50" rows="4">@if (isset($review)){{ $review->comment }}@endif</textarea>
            <br> <br>

        <button type="submit" class="btn">Submit Review</button>
    </form>
@endsection
