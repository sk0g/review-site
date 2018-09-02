@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title')
    Add Album
@endsection

@section('body')
    <form method="post" action="/add_album">
        {{ csrf_field() }}

        <input type="hidden" name="album_id"
        @if (isset($album))
            value="{{ $album->album_id }}""
        @endif>

        <h4>Artist Name<h4>
        <input type="text"
        name="name"
        @if (isset($album))
            value="{{ $album->name }}""
        @endif
        > <br> <br>

        <h4>Album Name<h4>
        <textarea name="album_name" cols="50" rows="4">@if (isset($album)){{ $album->album_name }}@endif</textarea>
        <br> <br>

        <h4>Genre<h4>
        <textarea name="genre" cols="50" rows="4">@if (isset($album)){{ $album->genre }}@endif</textarea>
        <br> <br>

        <h4>Release Year<h4>
        <textarea name="release_year" cols="50" rows="4">@if (isset($album)){{ $album->release_year }}@endif</textarea>
        <br> <br>

        <h4>Album Art URL<h4>
        <textarea name="album_art" cols="50" rows="4">@if (isset($album)){{ $album->album_art }}@endif</textarea>
        <br> <br>

        <button type="submit" class="button_btn">Submit Album</button>
    </form>
@endsection
