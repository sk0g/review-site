@extends('layouts.app')
@section('content') @if (count($errors) > 0)
<div class="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Add Album") }}</div>

                <div class="card-body">
                    <form method="post" action="/add_album">
                        @csrf

                        <div class="form-group row">
                            <label for="album_name" class="col-md-4 col-form-label text-md-right">{{ __('Album Name') }}</label>

                            <div class="col-md-6">
                                <input id="album_name" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="band" class="col-md-4 col-form-label text-md-right">{{ __('Band Name') }}</label>

                            <div class="col-md-6">
                                <input id="band" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                            <div class="col-md-6">
                                <input id="genre" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="release_year" class="col-md-4 col-form-label text-md-right">{{ __('Year of Release') }}</label>

                            <div class="col-md-6">
                                <input id="release_year" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Album') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection