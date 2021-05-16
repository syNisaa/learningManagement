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
                                    <img class="d-block w-100" style="height:300px;" src="landingrev/images/work.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Digiclass Indonesia </h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <embed src="landingrev/images/work.jpg" type="" style="height:300px; width:100%;">
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

                <div class="col-lg-5 col-md-6 mr-lg-auto mt-lg-5 col-12" data-aos="fade-up" data-aos-delay="200">

                    <font face="comic MS sans" size="6">{{$p->name}} <small>|<b> {{$p->price}}</b></small></font><br><br>

                    <font face="times new roman" size="4" class="mt-4 mb-4">{{$p->desc}}</font>

                    <form id="form-bayar" method="post">
                        <input type="hidden" name="class" id="class" value="{{$p->category}}">
                        <input type="hidden" name="price" id="price" value="{{$p->price}}">
                        <center><br><br>
                            <button type="submit" class="btn btn-outline-success">Pesan</button>
                            <a href="/digiclassagency" type="button" class="btn btn-outline-secondary">Back</a>
                            <a href="/digiclassagency" type="button" class="btn btn-outline-secondary">Cht Admin</a>
                        </center>
                    </form>

                </div>
            </div>



        </div>
    </section>
    @endforeach

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-y5TtpIOlSRzwbREL"></script>

    <script>
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
    </script>
</body>

</html>