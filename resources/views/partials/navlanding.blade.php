<style>
    #map {
        height: 30%;
    }
</style>
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img width="70" src="{{ url('images/digi.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Digiclass Academy</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Digiclass Agency</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#mapsmodal">Maps</a></li> -->
                        
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login Member / Regis Instansi</a></li>

                    </ul>
                </div>

            </div>

        </nav>

        
    </div>
</header>
<!-- -6.396096078131284, 106.78745090143259 -->