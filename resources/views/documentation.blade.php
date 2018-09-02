@extends('layouts/base-page')
@section('scripts')
@endsection

@section('title') Documentation
@endsection

@section('body')
    <ul>
        <h3>ER Diagram</h3>
        <img src="{{ asset('ER.png') }}">
        <h3>Interesting Points</h3>
        <ul>
            <li>
                No Bootstrap was used for this project. <br>
                As a challenge, I decided to see if I could do this with only HTML and CSS. <br>
                I was able to come up with... something. <br>
                Using Bootstrap may have speeded up development, but I feel I learned a lot about the power of HTML and CSS this way.
            </li>
            <li>
                The generic way I have implemented alerts in, I think, is kind of neat as well. <br>
                Going along with the theme, there's a lot of object-oriented-ness to the entire codebase, actually. <br>
                Except for web.php... I was not sure where the control code could have gone, so web.php is almost at 300 lines of code. Horrible practice, I know.
            </li>
            <li>
                The way editing/ adding reviews works is also a bit quirky. <br>
                Technically it's the same request underneath the hood, but one comes with a pre-fill,
                while you can always edit instead if you go with a name that has already reviewed the album you are looking at.
            </li>
        </ul>
        <h3>Unable to complete:</h3>
        <ul>
            <li>
                Addition of new albums, in cases where artist does not already exist. <br>
                The requirements were not entirely clear about this, were new manufacturers meant to be added?
            </li>
            <li>
                A proper theme. <br>
                While there is some theming already, I would have liked a more consistent, visually pleasing theme.
            </li>
        </ul>
    </ul>
@endsection