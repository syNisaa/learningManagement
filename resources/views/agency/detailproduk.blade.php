<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Produk</title>
    @include('partials.headlanding')
</head>

<body>
    @foreach($product as $p)

    <section class="project-detail section-padding" style="margin-top: -70px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12 mt-4">

                    <br>
                    <img style="width: 250px; height:200px;" src="{{asset('produkfile/'.$p->image)}}" alt="">
                                    
                </div>

                <div class="col-lg-5 col-md-6 mr-lg-auto mt-lg-5 col-12" data-aos="fade-up" data-aos-delay="200">

                    <font face="comic MS sans" size="6">{{$p->name}} <small>|<b> {{$p->price}}</b></small></font><br><br>

                    <font face="times new roman" size="4" class="mt-4 mb-4">{{$p->desc}}</font>
                    <br><br>
                    <font face="times new roman" size="4" class="mt-4 mb-4">*Jika berminat, pemesanan di lakukan via wa yaa</font>
                    <br><br>
                    <center>
                        <a href="/digiclassagency" type="button" class="btn btn-outline-secondary">Back</a>
                        <a href="https://api.whatsapp.com/send?phone=6283806891628" type="button" class="btn btn-outline-success">Order Or Cht Admin</a>
                        <hr>
                    </center>

                </div>
                
            </div>
            <br>
                <center>
                    <div class="pj" style="text-align: center;">
                    <font face="times new roman" size="6" >Penanggung jawab </font><br>
                     
                    <img style="width: 250px; height:200px;" src="{{asset('produkfile/'.$p->image_pj)}}" alt=""><br>
                    <font face="times new roman" size="5" >{{$p->name_pj}} </font><br>

                    </div>
                </center>

        </div>
    </section>
    @endforeach


</body>

</html>