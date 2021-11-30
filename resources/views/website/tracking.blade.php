@extends('layouts.website')

@section('track')
    active
@endsection

@section('extra-scripts')
    <style>
        /* Import */
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteUp9gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9G4kzIxd1KFrBtceFfkA.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteVp6gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: italic;
            font-weight: 900;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9D4kzIxd1KFrBteWJ4gK_uQQ.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjDY_Z4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9I4kzIxd1KFrBoQeY.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjTZPZ4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Chivo';
            font-style: normal;
            font-weight: 900;
            src: url(https://fonts.gstatic.com/s/chivo/v12/va9F4kzIxd1KFrjrZvZ4sKg.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 100;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA71rDks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 200;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA79rCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 300;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA7wTCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 400;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA71rCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 500;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA72jCks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 600;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA74TFks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 700;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA773Fks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira';
            font-style: normal;
            font-weight: 800;
            font-stretch: normal;
            src: url(https://fonts.gstatic.com/s/saira/v8/memWYa2wxmKQyPMrZX79wwYZQMhsyuShhKMjjbU9uXuA79rFks8xkw.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 100;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFsOHYr-vcC7h8MklGBkrvmUG9rbpkisrTri3j2_Co.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 200;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrJ2nh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 300;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrQ2rh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFiOHYr-vcC7h8MklGBkrvmUG9rbpkisrTj6Ejx.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 500;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrG2vh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 600;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrN2zh2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrU23h2wpk.ttf) format('truetype');
        }
        @font-face {
            font-family: 'Saira Extra Condensed';
            font-style: normal;
            font-weight: 800;
            src: url(https://fonts.gstatic.com/s/sairaextracondensed/v6/-nFvOHYr-vcC7h8MklGBkrvmUG9rbpkisrTrT27h2wpk.ttf) format('truetype');
        }
        /* Variables */
        /* Base */
        body {
            background: #252827;
            font-size: 16px;
        }
        p {
            font-weight: 300;
        }

        strong {
            font-weight: 600;
        }
        h1 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            color: white;
            font-weight: 400;
            font-size: 2.4em;
        }
        #timeline-content {
            margin-top: 50px;
            text-align: center;
        }
        /* Timeline */
        .timeline {
            border-left: 4px solid #004ffc;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            background: rgba(255, 255, 255, 0.03);
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Chivo', sans-serif;
            margin: 50px auto;
            letter-spacing: 0.5px;
            position: relative;
            line-height: 1.4em;
            font-size: 1.03em;
            padding: 50px;
            list-style: none;
            text-align: left;
            font-weight: 100;
            max-width: 30%;
        }
        .timeline h1 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 100;
            font-size: 1.4em;
        }
        .timeline h2,
        .timeline h3 {
            font-family: 'Saira', sans-serif;
            letter-spacing: 1.5px;
            font-weight: 400;
            font-size: 1.4em;
        }
        .timeline .event {
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
            padding-bottom: 25px;
            margin-bottom: 50px;
            position: relative;
        }
        .timeline .event:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border: none;
        }
        .timeline .event:before,
        .timeline .event:after {
            position: absolute;
            display: block;
            top: 0;
        }
        .timeline .event:before {
            left: -217.5px;
            color: rgba(255, 255, 255, 0.4);
            content: attr(data-date);
            text-align: right;
            font-weight: 100;
            font-size: 0.9em;
            min-width: 120px;
            font-family: 'Saira', sans-serif;
        }
        .timeline .event:after {
            box-shadow: 0 0 0 4px #004ffc;
            left: -57.85px;
            background: #313534;
            border-radius: 50%;
            height: 11px;
            width: 11px;
            content: "";
            top: 5px;
        }

    </style>
@endsection

@section('content')
    <header id="header" class="header-v3">
        @include('website.components.main-navigation')

        @include('website.components.search-top')

        @include('website.components.menu-mobile')

        @include('website.components.menu')
    </header>

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('website.index') }}">Home</a></li>
                <li class="active">Track</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div id="timeline-content">
        <h1>Timeline</h1>

        <ul class="timeline">
            <li class="event" data-date="65Million B.C.">
                <h3>Dinosaurs Roamed the Earth</h3>
                <p>RAWWWWWWRRR 🐢🦂</p>
            </li>
            <li class="event" data-date="2005">
                <h3>Creative Component Launched</h3>
                <p>"We can be all things to all people!" 📣</p>
            </li>
            <li class="event" id="date" data-date="2009">
                <h3>Squareflair was Born</h3>
                <p></p> <p>"We can be all things to Squarespace users!" 📣</p>
            </li>

            <li class="event" data-date="2021">

                <h3>Squareflair Today</h3>

                <p>"We design and build from scratch!" 📣<p/> <p>When we say <em><strong>100% custom</strong></em> we mean it— and we build all sites on the Squarespace Developer platform.<p/>
                <p>Did you know that all of our pixels are hand-forged from the rarest of subpixels grown and harvested in the <em>Nerd Forest</em>? <br>🤜💥🤛</p>

                <p><strong>Our success can be measured by lives and brands enhanced by 9+ years of 100% Squarespace-focused service!</strong></p>

                <p><a href="https://www.squareflair.com">squareflair.com</a></p>
            </li>
        </ul>
    </div>
@endsection
