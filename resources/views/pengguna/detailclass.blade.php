<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('partials.navbar')
    @include('partials.headlanding')
</head>

<body >
    @foreach($class as $c)


    <section class="project-detail section-padding" style="margin-top: -70px;">
        <div class="container">

            <div class="" style="align-content: center;">
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




            </div>

            <div class="content">
                <font face="comic MS sans" size="6">{{$c->category}} <small>| Rp. <b> {{$c->price}}</b></small></font><br><br>

                <font face="times new roman" size="4" class="mt-4 mb-2">{{$c->deskripsi}}</font>

                <hr>

                <center>
                    <font face="comic MS sans" size="6"> Syarat Dan Ketentuan</font>
                </center><br>

                <font face="times new roman" size="4" class="mt-4 mb-2">
                    <font face="Comis MS Sans" size="5" class="mt-4 mb-2">Syarat Wajib</font> <br>
                    1.Peserta wajib menyerahkan photocopy data diri baik KTM, KTP, SIM dan Kartu Keluarga. <br>
                    2.Bersedia mengikuti program magang selama 3 - 6 bulan penuh <br>
                    3.Selama kelas berlangsung wajib mengerjakan tugas-tugas yang diberikan pemasaran produk /jasa dari tempat magang. <br>
                    4.Tidak di perkenanan minta izin saat mengikuti magang <br>
                    5.Tidak ada Gaji untuk peserta magang <br>
                    6.Pendaftaran Magang klik link www.DigiclassIndonesia.com <br>
                </font> <br>
                <font face="times new roman" size="4" class="mt-4 mb-2">
                    <font face="Comis MS Sans" size="5" class="mt-4 mb-2">Syarat Umum</font> <br>
                    1.Bagi mahasiswa ada surat pengantar dari instansi terkait dalam hal ini kampus/Universitas <br>
                    2.Mempunyai Laptop dan membawa modem sendiri <br>
                    3 Khusus Magang / PKL / Prakerin selama Pandemi di Lakukan Secara Online Menyediakan Quota yang Cukup <br>
                </font>

                <hr>
                <div class="row">



                    <div class="col-lg-7 col-md-7 col-12 ">
                        <img src="preview.png" alt="">
                    </div>

                    <div class="col-lg-4 col-md-4 col-12" style="margin-top: 100px;">
                        <font face="Comic MS Sans" size="5">Materi yang akan didapat <br></font>
                        <font face="Comic MS Sans" size="4">
                            - Pondasi Internet Marketing <br>
                            - Email dan Database <br>
                            - Riset kebutuhan pasar Secara Online <br>
                            - Konten Gambar dan Video <br>
                            - Youtube Marketing <br>
                            - Google Marketing <br>
                            - facebook Marketing <br>
                            - Instagram Marketing <br>
                            - Blog dan Website <br>
                            - Marketplace</font>
                    </div><br>

                </div>




            </div>

            <hr>





            <form id="form-bayar" method="post">
                <input type="hidden" name="class" id="class" value="{{$c->category}}">
                <input type="hidden" name="price" id="price" value="{{$c->price}}">
                <center>
                    <div class="row">
                        <a href="/registerst" type="button" class="btn btn-outline-secondary" style="width: 50%;">Register</a>
                        <a href="https://api.whatsapp.com/send?phone=6283806891628" type="button" class="btn btn-outline-success" style="width: 50%;">Chat Admin</a>
                    </div>
                </center>

            </form>

        </div>
    </section>
    @endforeach



    @foreach ($class as $c)
    <div class="modal" tabindex="-1" id="bayar{{$c->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload bukti pembayaran </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="/datasiswa" enctype="multipart/form-data">
                        <input type="text" name="class" id="class" value="{{$c->category}}">
                        <input type="text" name="price" id="price" value="{{$c->price}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Bukti Pembayaran <small>Input bukti pembayaran berupa ss</small> </label>
                            <input type="file" name="file" id="file" class="form-control" aria-label="file" aria-describedby="basic-addon1">
                            @if($errors->has('file'))
                            <div class="text-danger">
                                {{ $errors->first('file')}}
                            </div>
                            @endif
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    @endforeach


    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-y5TtpIOlSRzwbREL"></script>

    <!-- <script>
        document.querySelector('#form-bayar').addEventListener('submit', async e => {
            e.preventDefault()
            const formData = new FormData(e.target)
            const data = {
                name: formData.get('name'),
                email: formData.get('email'),
                price: formData.get('price'),
                class: formData.get('class'),
            }
            const price = formData.get('price')
            const p = parseInt(price)
            console.log(p)
            const response = await fetch("{{ route('getpayment') }}", {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body: JSON.stringify(data)
            })
            const result = await response.text()
            snap.pay(result, {
                onSuccess: async function(result) {
                    console.log('success');
                    console.log(result);
                    const register = await fetch("{{ route('datasiswa') }}", {
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        body: JSON.stringify({
                            name: formData.get('name'),
                            email: formData.get('email'),
                            password: formData.get('password'),
                            gender: formData.get('gender'),
                            phone: formData.get('phone'),
                            instansi: formData.get('instansi'),
                            class: formData.get('class'),
                            price: formData.get('price')
                        })
                    })
                    var name = document.getElementsByName('name')
                    var email = document.getElementsByName('email')
                    var gender = document.getElementsByName('gender')
                    var phone = document.getElementsByName('phone')
                    var instansi = document.getElementsByName('instansi')
                    var password = document.getElementsByName('password')
                    var classcategory = document.getElementsByName('classcategory')
                    console.log(name)
                    console.log(email)
                    console.log(gender)
                    console.log(phone)
                    console.log(instansi)
                    console.log(password)
                    console.log(classcategory)
                    const dataRegis = await register.text()
                    console.log(dataRegis)
                    // if (dataRegis == "true" || dataRegis == "1") {
                    //     window.location = '{{route("login")}}'
                    // }
                    // post("{{ route('register') }}");
                    window.location = '{{url("homestudent")}}'
                },
                onPending: function(result) {
                    console.log('pending');
                    console.log(result);
                },
                onError: function(result) {
                    console.log('error');
                    console.log(result);
                },
                onClose: function() {
                    console.log('customer closed the popup without finishing the payment');
                }
            })
        })
    </script> -->
</body>

</html>