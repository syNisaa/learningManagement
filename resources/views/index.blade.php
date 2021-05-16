<title>Home-Digiclass</title>
@include('partials.headlanding')

<body>

     <!-- MENU BAR -->
     <nav class="navbar navbar-expand-lg">
          <div class="container">
               <a class="navbar-brand" href="index.html">
                    <i class="fa fa-line-chart"></i>
                    Digiclass Indonesia
               </a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                              <a href="/" class="nav-link smoothScroll">Digiclass</a>
                         </li>
                         <li class="nav-item">
                              <a href="/digiclassagency" class="nav-link">Digiclass Agency</a>
                         </li>
                         <li class="nav-item">
                              <a href="/registerst" class="nav-link contact">Login Member</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                         <div class="hero-text">

                              <h1 class="text-white" data-aos="fade-up">We Are Ready For Your Bussines!</h1>
                              <!-- <a href="https://wa.widget.web.id/ae56aa" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png"></a> -->

                              <a href="https://wa.widget.w eb.id/ae56aa" target="_blank" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Hubungi kami!</a>

                         </div>
                    </div>

                    <div class="col-lg-6 col-12">
                         <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                              <img src="landingrev/images/work.jpg" class="img-fluid" style="border-radius: 100%; " alt="working girl">
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section class="about section-padding pb-0" id="about">
          <div class="container">
               <div class="row">

                    <div class="col-lg-7 mx-auto col-md-10 col-12">
                         <div class="about-info">

                              <h2 class="mb-4" data-aos="fade-up"><strong>Digiclass Indonesia</strong> </h2>

                              <p class="mb-0" data-aos="fade-up">Digiclass indonesia adalah Lorem ipsum dolor sit amet consectetur adipisicing elit.

                                   <br><br>

                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, illo? Minima incidunt, nostrum maxime blanditiis fugiat nobis saepe. Eligendi velit amet distinctio voluptas libero impedit mollitia repudiandae deserunt in cupiditate.
                              </p>
                         </div>

                         <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                              <img src="landingrev/images/office.png" class="img-fluid" alt="office">
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- keunggulan -->
     <section class="project-detail section-padding">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-6 col-12 mb-5">

                         <img src="landingrev/images/project/project-detail/personal-website.png" class="img-fluid" alt="personal website" data-aos="fade-up">
                    </div>

                    <div class="col-lg-5 col-md-6 mr-lg-auto mt-lg-5 col-12" data-aos="fade-up" data-aos-delay="200">

                         <h2>Keunggulan Digiclass Indonesia</h2>

                         <p class="mt-3 mb-4">Keunggulan yang dimiliki oleh Digiclas indonesa</p>

                         <ul class="list-detail">
                              <li><span>Curabitur commodo a sapien non</span></li>
                              <li><span>Sed facilisis convallis turpis</span></li>
                              <li><span>Quisque placerat augue neque</span></li>
                              <li><span>Nullam fringilla arcu a tortor</span></li>
                         </ul>
                    </div>
               </div>



          </div>
     </section>


     <!-- PROJECT -->
     <section class="project section-padding" id="project">
          <div class="container-fluid">
               <div class="row">

                    <div class="col-lg-12 col-12">

                         <h2 class="mb-5 text-center" data-aos="fade-up">
                              Program Terbaik
                              <strong>Digiclass Indonesia</strong>
                         </h2>

                         <div class="owl-carousel owl-theme" id="project-slide">
                              @foreach ($category as $ct)
                              <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                                   <img src="{{asset('programimg/'.$ct->image)}}" class="img-fluid" alt="project image" style="width: 700px; height:400px">

                                   <div class="project-info">
                                        <small>{{$ct->nameCategory}}</small>

                                        <h3>
                                             <a href="/classcategory{{$ct->nameCategory}}">
                                                  <span>{{$ct->nameCategory}}</span>
                                                  <i class="fa fa-angle-right project-icon"></i>
                                             </a>
                                        </h3>
                                   </div>
                              </div>


                              @endforeach
                         </div>

                    </div>

               </div>
          </div>
     </section>


     <!-- TESTIMONIAL -->
     <section class="testimonial section-padding">
          <div class="container">
               <div class="row">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                              <div class="carousel-item active">
                                   <div class="row">

                                        <div class="col-lg-6 col-md-5 col-12">
                                             <div class="contact-image" data-aos="fade-up">

                                                  <img src="landingrev/images/female-avatar.png" class="img-fluid" alt="website" style="width: 400px; height:550px">
                                             </div>
                                        </div>

                                        <div class="col-lg-6 col-md-7 col-12">
                                             <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">Pendapat CEO</h4>

                                             <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                                             <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Saya yakin, Digiclass indonesia mampu memajukan bisnis kalian. Lihat Testimoni berikut</h2>

                                             <p data-aos="fade-up" data-aos-delay="400">
                                                  <strong>Ibu Erning </strong>

                                                  <span class="mx-1">/</span>

                                                  <small>Digiclass Indoneisa (CEO)</small>
                                             </p>
                                        </div>

                                   </div>
                              </div>
                              @foreach ($testi as $t)
                              <div class="carousel-item">
                                   <div class="row">

                                        <div class="col-lg-6 col-md-5 col-12">
                                             <div class="contact-image" data-aos="fade-up">

                                                  <img src="{{asset('testiimg/'.$t->image)}}" class="img-fluid" alt="website" style="width: 400px; height:550px">
                                             </div>
                                        </div>

                                        <div class="col-lg-6 col-md-7 col-12">
                                             <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">Testimoni Client</h4>

                                             <div class="quote" data-aos="fade-up" data-aos-delay="200"></div>

                                             <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">{{$t->desc}}</h2>

                                             <p data-aos="fade-up" data-aos-delay="400">
                                                  <strong>{{$t->name}}</strong>

                                                  <span class="mx-1">/</span>

                                                  <small>{{$t->classCategory}}</small>
                                             </p>
                                        </div>

                                   </div>
                              </div>
                              @endforeach

                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                   <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="sr-only">Next</span>
                              </a>
                         </div>

                    </div>
               </div>
     </section>




     @include('partials.footerlanding')



</body>

</html>