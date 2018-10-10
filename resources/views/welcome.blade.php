<!DOCTYPE html>
<html lang="en">
<head>
    <title>Προσφορές</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Προσφορές</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('') }}">Αρχική</a></li>
                <li><a href="{{ url('shop') }}">Καταστήματα</a></li>
                <li><a href="{{ url('discount') }}">Προσφορές</a></li>
                <li><a href="{{ url('about') }}">Σχετικά με</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="text-center">
            <h1>Αρχική</h1>
            <p>
                @php
                    $discounts = DB::select("call getTopDiscounts(10)");
                @endphp
                <marquee behavior="scroll" direction="left">

                    @foreach($discounts as $discount)
                        --
                        {{ $discount->description }}
                        <a href="{{ url('/discount') . '?id=' . $discount->id }}">
                            <img src="{{ $discount->image }}" width="120" height="80"/>
                        </a>
                        Από {{ $discount->originalPrice }}€ μόνο {{ $discount->currentPrice }}€
                        --
                    @endforeach
                </marquee>

            </p>
            <hr/>
            <p>
                <img height="256px" src="{{ url('/images') . '/android' . '/screen1.png' }}"/>
                <img height="256px" src="{{ url('/images') . '/android' . '/screen2.png' }}"/>
                <img height="256px" src="{{ url('/images') . '/android' . '/screen3.png' }}"/>
                <img height="256px" src="{{ url('/images') . '/android' . '/screen4.png' }}"/>
            </p>
            <hr/>
            <p>
                Βρείτε την android εφαρμογή μας στο Google Play Store <br/>
                <a href="https://play.google.com/store/apps/details?id=eu.jnksoftware.discountfinderandroid">
                    <img src="https://storage.googleapis.com/support-kms-prod/D90D94331E54D2005CC8CEE352FF98ECF639"
                         height="128px"/>
                </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
