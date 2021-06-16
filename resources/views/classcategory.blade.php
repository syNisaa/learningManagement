@include('partials.navbar')
@include('partials.headlanding')


    <title>Class Category</title>

<body>


    <!-- BLOG -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 py-5 mt-0 mb-0 text-center">
                @foreach($categoryclass as $c)
                <h1 class="mb-4" data-aos="fade-up">Class <span style=""><b> {{$c->nameCategory}}</span></h1></b>
                @endforeach

            </div>

            <div class="col-lg-7 col-md-7 col-12 mb-4">
                <div class="blog-header" data-aos="fade-up" data-aos-delay="100">
                    <img src="17855.jpg" style="width: 100%; height:auto" class="img-fluid" alt="blog header">

                    <div class="blog-header-info">
                        <h4 class="blog-category text-info">Digiclass Indonesia</h4>

                        <h3 style="color: wheat;">The Key to Creative Work is Knowing When to Walk Away <a href="/" title="back to home"> | Back</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12 mb-4">

                @foreach($classes as $c)
                <div class="blog-sidebar d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="landingrev/images/blog/blog-sidebar-image02.jpg" class="img-fluid" alt="blog">

                    <div class="blog-info">
                        <a href="detail{{$c->category}}" ><h6 class="blog-category text-primary">{{$c->category}}</h6></a>

                        <h7>Kuota Yang tersisa | <b> {{$c->kuota}} </b></h7>
                    </div>
                </div><br>
                @endforeach

            </div>

            @foreach($classes as $c)
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
                                        <!-- <div class="carousel-item">
                                            <embed src="{{$c->video}}" type="" style="height:300px; width:100%;">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Digiclass Indonesia</h5>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div><br>
                            <center>
                                <font face="Comic MS sans" size="5">Untuk melihat deskripsi kelas ini, yuk Registrasi dulu, Dijamin gaakan nyesel deh! ada contoh video menarik juga loh disana! </font>
                                <b><h3>Rp. {{$c->price}}</h3></b>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/registerst" class="btn btn-primary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>





    
</body>

</html>