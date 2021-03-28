<style>
    #map{
        height: 80%;
    }
</style>
    
    <script>

      function initMap() {
        
        // membuat objek untuk titik koordinat
        var digi = {lat: -6.392162838437263, lng: 106.78151411117707};
        
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>
  

<footer class="footer-area">
    <div class="container">
            <div class="row">
                
                <div class="col-lg-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Digiclass</h4>
                    <hr color="gray">
                    <ul>
                        <li>Deskripsi</li>
                        <li>Fitur</li>
                        <li>Harga</li>
                    </ul>
                    {{-- <div class="footer-logo">
                        <img src="img/logo.png" alt="">
                    </div> --}}
                </div>

                <div class="col-lg-4 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Lainnya</h4>
                    <hr color="gray">
                    <ul>
                        <li>Tentang Kami</li>
                        <li>Developer</li>
                        <li>Syarat & Ketentuan</li>
                    </ul>
                    {{-- <div class="footer-address">
                        <p>Tentang Kami</p>
                        <span>Developer</span>
                        <span>Syarat & Ketentuan</span>
                    </div> --}}
                </div>

                

                <div id="kontak" class="col-lg-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Kontak & Lokasi</h4>
                    <hr color="gray">
                    <!-- <ul>
                        <li>digiclass@gmail.com</li>
                        <li>0811-9999-879</li>
                        <li>Jl. Rambutan No.46 Rt 003/001, Pasir Putih, Kec. Sawangan, Kota Depok, Jawa Barat 16519</li>
                    </ul> -->
                    <div id="map"></div>

                    {{-- <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="mailto:martdevelopers254@gmail.com"
                        method="get">
                        <div class="input-group">
                            <input type="email" class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                            <div class="input-group-append">
                                <button class="btn click-btn" type="submit">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </div>
                        </div>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                        </form>
                    </div> --}}

                </div>
            </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            {{-- <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <a href="https://github.com/MartMbithi/LMS"><i class="ti-github"></i></a>
               
            </div> --}}
        </div>
    </div>
</footer>