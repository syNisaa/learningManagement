<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('partials.headlanding')
</head>

<body>
    @foreach($product as $p)

    <section class="project-detail section-padding" style="margin-top: -70px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12 mt-4">

                    <br>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                    <img style="width: 250px; height:200px;" src="{{asset('produkfile/'.$p->image)}}" alt="">
                                    
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <embed src="landingrev/images/work.jpg" type="" style="height:300px; width:100%;">
                                
                                    
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

                <div class="col-lg-5 col-md-6 mr-lg-auto mt-lg-5 col-12" data-aos="fade-up" data-aos-delay="200">

                    <font face="comic MS sans" size="6">{{$p->name}} <small>|<b> {{$p->price}}</b></small></font><br><br>

                    <font face="times new roman" size="4" class="mt-4 mb-4">{{$p->desc}}</font>
                    <br><br>
                    <font face="times new roman" size="4" class="mt-4 mb-4">*Jika berminat, pemesanan di lakukan via wa yaa</font>
                    <br><br>
                    <center>
                        <a href="/digiclassagency" type="button" class="btn btn-outline-secondary">Back</a>
                        <a href="https://api.whatsapp.com/send?phone=6283806891628" type="button" class="btn btn-outline-success">Order Or Cht Admin</a>
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