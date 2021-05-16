<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@include('partials.headlanding')

<style>
     .card {
          margin-top: 20px;
          margin-bottom: 50px;
          padding: 7px;
          height: 630px;
     }

     .DA {
          margin-top: 100px;
          
     }

     .container-atas {
          background-color: #8a2222;
          height: 550px;
     }

     .container-bawah {
          background-color: #8a2222;
          height: 500px;
     }
</style>

<body>

     <!--================Header Menu Area =================-->
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
     <!--================Header Menu Area =================-->

     <!--================Home Banner Area =================-->

     <div class="container-atas">
          <center><b><br><br><br><br><br>
                    <font face="Comic MS sans" color="white" size="10">Digiclass Agency</font>
               </b><br>
               <div class="content mt-4">
                    <font color="white" size="4" style="margin-left: 50px; margin-right: 50px;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio
                         illum consectetur eius doloribus provident commodi veniam non temporibus neque perferendis rem,
                         ipsam saepe fugiat dignissimos omnis repudiandae natus eveniet molestiae. illum consectetur eius doloribus provident commodi veniam non temporibus neque perferendis rem,
                         ipsam saepe fugiat dignissimos omnis repudiandae natus eveniet molestiae.</font><br>
               </div>
               
          </center>
     </div>

     <div class="container">
          <center>
               <h1 class="DA" style="color:white;">
                    <b>
                         Layanan Digiclass Agency
                    </b>
               </h1>
          </center>
          <div class="cardproj">
               @foreach($product as $p)
               <div class="card" style="width: 15rem; height:auto">
                    <img src="landingrev/images/work.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <center><h5 class="card-title">{{$p->name}}</h5>
                         <h6 class="card-text">{{$p->price}} | <b>{{$p->status}}</b></h6></center><br>
                         <center><a href="/detailproduk{{$p->id}}" class="btn btn-outline-secondary">Detail</a></center>
                    </div>
               </div>
               @endforeach
          </div>

     </div>
     <div class="container-bawah">
          <center class="mt-0">
               <b><br><br><br><br>
                    <font class="tit" style="color:white;" face="comic ms sans" size="6">INGIN MULAI
                         BELAJAR DIGITAL MARKETING <br> BERSAMA DIGICLASS?</font>
               </b>

               <br>
               <div class="content mt-4">
                    <font color="white" size="4" style="margin-left: 50px; margin-right: 50px;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio
                         illum consectetur eius doloribus provident commodi veniam non temporibus neque perferendis rem,
                         ipsam saepe fugiat dignissimos omnis repudiandae natus eveniet molestiae.</font><br>
               </div>
               
          </center>
     </div>


     <!-- container end -->


     <!-- ================ start footer Area ================= -->
     @include('partials.footerlanding')
     <!-- ================ End footer Area ================= -->

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!-- <script src="js/jquery-2.2.4.min.js"></script>-->
     <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>


     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>