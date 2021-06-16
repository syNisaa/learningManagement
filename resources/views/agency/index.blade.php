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
          background-color: #f5c5b5;
          height: 550px;
     }
     /* 8a2222 */
     .container-bawah {
          background-color: #f5c5b5;
          height: 500px;
     }
</style>

<body>

     
     <!--================Header Menu Area =================-->
     @include('partials.navbar')
     <!--================Home Banner Area =================-->

     <div class="container-atas">
          <center><b><br><br><br><br><br>
                    <font face="Comic MS sans"  size="10"><strong> Digiclass Agency</strong></font>
               </b><br>
               <div class="content mt-4">
                    <font color="black" size="4" style="margin-left: 50px; margin-right: 50px;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio
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
          <div class="cardproj"><div class="row">
               @foreach($product as $p)
               <div class="card" style="width: 16rem; height:auto; margin-right:10px; margin-left:10px; ">
                    <img style="width: 250px; height:200px;" src="{{asset('produkfile/'.$p->image)}}" alt="">
                    <div class="card-body">
                    <center><h5 class="card-title">{{$p->name}}</h5>
                         <h6 class="card-text">{{$p->price}} | <b>{{$p->status}}</b></h6></center><br>
                         <center><a href="/detailproduk/{{$p->id}}" class="btn btn-outline-secondary">Detail</a></center>
                    </div>
               </div>
               @endforeach
          </div>
          </div>

     </div>
     <div class="container-bawah">
          <center class="mt-0">
               <b><br><br><br><br>
                    <font class="tit" style="color:black;" face="comic ms sans" size="6"><strong>INGIN MULAI
                         BELAJAR DIGITAL MARKETING <br> BERSAMA DIGICLASS?</strong></font>
               </b>

               <br>
               <div class="content mt-4">
                    <font color="black" size="4" style="margin-left: 50px; margin-right: 50px;"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio
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
     
</body>

</html>