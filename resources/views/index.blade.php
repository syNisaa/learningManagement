<title>Home-Digiclass</title>

@include('partials.headlanding')

<body>
     @include('partials.navbar')


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
          <div class="container">
               <div class="row">

                    <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                         <div class="hero-text">

                              <font size="13" face="Comic MS Sans" class="text-white" data-aos="fade-up"> Tempat Belajar Paling Asik!</font>
                              <br>
                              <font style="color:gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias impedit ducimus facere labore magni velit, vel reiciendis fugiat tempora dolore sit corporis non! Vero odio placeat tempora ad inventore quam?</font>
                              <a href="https://api.whatsapp.com/send?phone=6283806891628" target="_blank" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Hubungi kami!</a>

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

     <section class="about section-padding pb-0" id="about">
          <div class="container">

               <div class="col-lg-10 mx-auto col-md-3">
                    <div class="about-info">

                         <center>
                              <h2 class="mb-4" data-aos="fade-up"><strong>Program Digiclass Indonesia</strong> </h2>
                         </center>

                         <div class="row"><br>
                              @foreach($category as $ct)
                              <div class="card mt-4" style="width: 17rem; margin-right:3px; margin-left:5px;">
                                   <div class="card-body">
                                        <center>
                                             <a href="/classcategory{{$ct->nameCategory}}" style="font-size: 17px;">{{$ct->nameCategory}}</a>
                                        </center>

                                   </div>
                              </div>
                              @endforeach


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
                              <li><span>Memiliki modul pembelajaran yang berisi rangkuman materi</span></li>
                              <li><span>Modul pembelajaran menggunakan video dan animasi</span></li>
                              <li><span>Peserta yang sudah lulus akan mendapatkan sertifikat</span></li>
                              <li><span>Siswa dapat mengikuti ujian sertifikasi</span></li>
                         </ul>
                    </div>
               </div>



          </div>
     </section>

     <!-- Galery -->
     <section class="project-detail section-padding" style=" background-color:#f5c5b5;">
          <div class="container">
          <h2 class="mb-5"  data-aos="fade-up" style="text-align: center; margin-top:-90px;"><strong><center>Galery Digiclass Indonesia</center></strong> </h2>
               <div class="row">
                    
                    <div class="card-group">
                         <div class="card">
                              <img class="card-img-top" src="gambar.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                         <div class="card">
                              <img class="card-img-top" src="gambar1.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                         <div class="card">
                              <img class="card-img-top" src="gambar2.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                    </div>
                    <div class="card-group">
                         <div class="card">
                              <img class="card-img-top" src="gambar10.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                         <div class="card">
                              <img class="card-img-top" src="gambar11.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                         <div class="card">
                              <img class="card-img-top" src="gambar5.jpg" alt="Card image cap" width="300" height="300">
                         </div>
                    </div>
               </div>



          </div>
     </section>



     <section class="testimonial section-padding" style=" background-color:white;">
          <div class="container" style="margin-top:-65px;">
               <div class="row">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                              <div class="carousel-item active">
                                   <div class="row">

                                        <div class="col-lg-6 col-md-5 col-12">
                                             <div class="contact-image" data-aos="fade-up">

                                                  <img src="landingrev/images/female-avatar.png" class="img-fluid" alt="website" style="width: 200px; height:350px">
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

                                                  <img src="{{asset('testiimg/'.$t->image)}}" class="img-fluid" alt="website" style="width: 200px; height:350px">
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