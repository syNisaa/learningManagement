<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@include('partials.headlanding')

<body>

    <!--================Header Menu Area =================-->
    @include('partials.navlanding')
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7">
                        <div class="banner_content" id="profile">
                            <h3>Profile</h3>
                            <h3>DIGICLASS<br>INDONESIA</h3>
                            <h5>Tempat Belajar Digital Marketing Paling Seru.</h5>
                            <p>Digiclass adalah Mentoring & Workshop Online bisnis online menggunakan paid traffic
                                Facebook & Instagram Ads yang berlangsung selama 30 hari dan mengupas Materi dan Praktek
                                CARA SIMPLE PUNYA BISNIS ONLINE YANG PROFITABLE.</p>
                            <a class="banner_btn" href="#core_features">Kelas<i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Service  Area =================-->

    <section id="core_features" class="service-area area-padding">

        <!-- Start First Cards -->
        <div class="card shadow mb-4 mt-3">
            @if($class->count() > 0)
            <div class="row ml-2 mr-2 mb-4">
                @foreach($class as $c)
                <div class="col-md-4 mt-4" style="margin-top:-9%;">
                    <div class="card mb-6" style="border-radius: 20px">
                        <div class="card-body" href="/addSchedule">
                            <img class="card-img-top center" src="{{asset('image_class/'.$c->image)}}" alt="Card image cap" style="width: 400px; height:300px;"><br>
                            <div class="service-content">
                                <br><h3 style="text-align: center; color:black;">{{$c->category}}</h3>
                                <center><button class="btn btn-secondary" data-toggle="modal" data-target="#modal{{$c->id}}">
                                    Read More
                                </button></center>

                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center" style="margin-top: 15%">
                <div class="col text-center">
                    <b>Class Belum Tersedia</b>
                </div>
            </div>
            @endif
            <!-- End First Cards -->

    </section>

    @foreach($class as $c)
    <div class="modal" tabindex="-1" id="modal{{$c->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Class {{$c->category}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="height:300px;" src="{{ asset('image_class/'.$c->image) }}" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Digiclass Indonesia </h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <embed src="{{$c->video}}" type="" style="height:300px; width:100%;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Digiclass Indonesia</h5>
                                    </div>
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <p>{{$c->deskripsi}}</p>
                    <center><h3>Rp. {{$c->price}}</h3></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/class{{$c->id}}" class="btn btn-primary">Join</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <!--================Service Area end =================-->


    <!--================About  Area =================-->
    {{-- <section class="about-area area-padding-bottom"> --}}
    <div class="container" style="margin-top: 1%;">
        <div class="row align-items-center justify-content-center">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ url('images/amar.png') }} " alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ url('images/ben.png') }} " alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{ url('images/wijaya.png') }} " alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>



        </div>
    </div>
    {{-- </section> --}}
    <!--================About Area End =================-->

    <!--================Feature  Area =================-->
    {{-- <section class="feature-area area-padding bg_one"> --}}
    {{-- <div class="container">
            <div class="row align-items-center">

                <div class="offset-lg-6 col-lg-6">
                    <div class="area-heading light">
                        <h4>Learning Management System on <br>Mobile (Smartphones)</h4>
                        <p>The following features makes this platform one of the best lite-weight opensource Learning Management System:</p>
                    </div>
                    <div class="row">
                        <div class="col-">
                            <div class="single-feature d-flex">
                                <div class="feature-icon">
                                    <i class="ti-layers"></i>
                                </div>
                                <div class="single-feature-content">
                                    <h5>Super responsive design</h5>
                                    <p>This feature allows the system to be viewed and accessed not only on devices with screens having large aspect ratio but also to devices with small aspect ratios like smartphones and tablets 
                                    without any distortion, data loss or any front end bugs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-">
                            <div class="single-feature d-flex">
                                <div class="feature-icon">
                                    <i class="ti-layers"></i>
                                </div>
                                <div class="single-feature-content">
                                    <h5>Lightweight</h5>
                                    <p>Despite of complex backend this system is crafted with cutting edge practices which allows small devices like mobile phones to save an eact copy of the system in their browsers cache which speeds 
                                    up the entire load and execution process thus making the learning activity fun and intresting.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </section> --}}
    <!--================Feature Area End =================-->

    <!-- ================ start footer Area ================= -->
    @include('partials.footerlanding')
    <!-- ================ End footer Area ================= -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    
    <script src="js/theme.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>