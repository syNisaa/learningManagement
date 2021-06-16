<style>
     #map {
          height: 80%;
     }
</style>

<script>
     function initMap() {

          // membuat objek untuk titik koordinat
          var digi = {
               lat: -6.392162838437263,
               lng: 106.78151411117707
          };

          // membuat objek peta
          var map = new google.maps.Map(document.getElementById('map'), {
               zoom: 9,
               center: digi
          });

          // mebuat konten untuk info window
          var contentString = '<h2>Digiclass Indonesia</h2>';

          // membuat objek info window
          var infowindow = new google.maps.InfoWindow({
               content: contentString,
               position: digi
          });

          // membuat marker
          var marker = new google.maps.Marker({
               position: digi,
               map: map,
               title: 'Tempat Magang Online'
          });


          // event saat marker diklik
          marker.addListener('click', function() {
               // tampilkan info window di atas marker
               infowindow.open(map, marker);
          });

     }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script>


<footer class="site-footer" style="height: 350px;">
     <div class="container" style="width: auto;">
          <div class="row">

               <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">We make creative
                         <strong>brands</strong> only.
                    </h1>
               </div>

               <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="my-4">Contact Info</h4>

                    <p class="mb-1">
                         <i class="fa fa-phone mr-2 footer-icon"></i>
                         +62 838-0689-1628
                    </p>

                    <p>
                         <a href="#">
                              <i class="fa fa-envelope mr-2 footer-icon"></i>
                              digiclass@gmail.com
                         </a>
                    </p>
               </div>

               <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="my-4">Our Studio</h4>

                    <p class="mb-1">
                         <i class="fa fa-home mr-2 footer-icon"></i>
                         Jl. Rambutan No.46 Rt 003/001, Pasir Putih, Kec. Sawangan, Kota Depok, Jawa Barat 16519
                    </p>
                    <!-- <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                         <ul class="social-icon">
                              <li><a href="https://www.instagram.com/nis.seh/?hl=id" class="fa fa-instagram"></a></li>
                              <li><a href="https://www.youtube.com/channel/UCkos7mWacfKLTm-CuZXlwrA" class="fa fa-youtube"></a></li>
                              <li><a href="https://wa.widget.web.id/298f95" class="fa fa-whatsapp"></a></li>
                         </ul>
                    </div> -->
               </div>




          </div>
     </div>
</footer>