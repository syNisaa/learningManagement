<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <div class="row">
                <img src="{{asset('logo.png')}}" alt="" style="width: 60px; height:50px; margin-right:5px;">
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link smoothScroll" style="font-size: 17px;margin-right:3px">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/digiclassagency" class="nav-link" style="font-size: 17px;">Jasa Promosi</a>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" id="dropdownMenuButton" style="color:white; margin-top:10px; margin-right:15px; font-size:17px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Program Pendidikan
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($classespendidikan as $ct)
                            <a class="dropdown-item" href="/classcategory{{$ct->jenisCategory}}">{{$ct->category}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" id="dropdownMenuButton" style="color:white; margin-top:10px; font-size:17px;  margin-right:15px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Program Umum
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($classesumum as $ct)
                            <a class="dropdown-item" href="/classcategory{{$ct->jenisCategory}}">{{$ct->category}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" id="dropdownMenuButton" style="color:white; margin-top:10px; font-size:17px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Program Lainnya
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($classeslainnya as $ct)
                            <a class="dropdown-item" href="/classcategory{{$ct->jenisCategory}}">{{$ct->category}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                @foreach ($category as $ct)
                <!-- <li class="nav-item">
                    <a href="/classcategory{{$ct->nameCategory}}" class="nav-link" style="font-size: 17px;">{{$ct->nameCategory}}</a>
                </li> -->
                @endforeach

                <li class="nav-item">
                    <a href="/registerst" class="nav-link contact">Login Member</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
@include('partials.navbar')

<!-- social media marketing  -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LMS Digiclass</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/animate-css/animate.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">

    <link rel="stylesheet" href="{{asset('landingrev/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landingrev/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('landingrev/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('landingrev/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('landingrev/css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('landingrev/css/templatemo-digital-trend.css')}}">

    <!-- SCRIPTS -->
    <script src="{{asset('landingrev/js/jquery.min.js')}}"></script>
    <script src="{{asset('landingrev/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landingrev/js/aos.js')}}"></script>
    <script src="{{asset('landingrev/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('landingrev/js/smoothscroll.js')}}"></script>
    <script src="{{asset('landingrev/js/custom.js')}}"></script>
    <!-- MENU BAR -->


</head>