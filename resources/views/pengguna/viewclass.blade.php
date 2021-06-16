<title>Home-Digiclass</title>
@include('partials.navbar')

<body>
    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/homestudent">
                <img src="logo.png" alt="" style="width: 60px; height:50px; margin-right:5px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#logoutModal" class="nav-link smoothScroll" title="Logout" style="color: white;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @include('partials.logmodal')
    <!-- HERO -->
    <section>
        <div class="container"><br>
            <center><b>
                    <font face="comic MS sans" size="6">Kelas yang kamu ikuti</font><br>
                </b></center>
            <div class="row"><br>
                @foreach($student as $s)
                <div class="card mt-4" style="width: 17rem; margin-right:3px; margin-left:5px;">
                    <div class="card-body">
                    <center>
                            @if( $s->status == "aktif")
                            <a href="/dashstudent{{$s->class_category}}">
                                <h5 class="card-title">{{$s->class_category}}</h5>
                            </a>
                            @else
                            <a data-toggle="modal" data-target="#status">
                                <h5 class="card-title">{{$s->class_category}}</h5>
                            </a>
                            @endif
                            <h6>Join : {{$s->date}}</h6>
                        </center>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container"><br>
            <hr>
            <center>
                <font face="comic MS sans" size="6">Kelas yang ada Di Digiclass Indonesia</font><br>
            </center>
            <font face="comic MS sans" size="6">Program Pendidikan</font><br>
            <div class="row"><br>
                @foreach($classespendidikan as $c)
                <div class="card mt-4" style="width: 17rem; margin-right:3px; margin-left:5px;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{asset('image_class/'.$c->image)}}" alt="Card image cap">
                        <center><h5 class="card-title">{{$c->category}}</h5>
                            <a href="/detail/{{ $c->category }}">Detail</a><br>
                        </center>
                        
                    </div>
                </div>
                @endforeach
            </div><br>
            <font face="comic MS sans" size="6">Program Umum</font><br>
            <div class="row"><br>
                @foreach($classesumum as $c)
                <div class="card mt-4" style="width: 17rem; margin-right:3px; margin-left:5px;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{asset('image_class/'.$c->image)}}" alt="Card image cap">
                        <center><h5 class="card-title">{{$c->category}}</h5>
                            <a href="/detail/{{ $c->category }}">Detail</a><br>
                        </center>
                        
                    </div>
                </div>
                @endforeach
            </div><br>
            <font face="comic MS sans" size="6">Program Lainnya</font><br>
            <div class="row"><br>
                @foreach($classeslainnya as $c)
                <div class="card mt-4" style="width: 17rem; margin-right:3px; margin-left:5px;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{asset('image_class/'.$c->image)}}" alt="Card image cap">
                        <center><h5 class="card-title">{{$c->category}}</h5>
                            <a href="/detail/{{ $c->category }}">Detail</a><br>
                        </center>
                        
                    </div>
                </div>
                @endforeach
            </div><br>
            
        </div>
    </section>

    <div class="modal" tabindex="-1" id="status">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Status </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Status Kamu Non-Aktif Atau Waktu berlangganan Sudah habis, silahkan hubungi admin</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>


    @foreach($classes as $c)
    <!-- <div class="modal" tabindex="-1" id="modal{{$c->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Class {{$c->category}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    </div><br>
                    <center>
                        <font face="Comic MS sans" size="4">{{$c->deskripsi}}</font>
                        <b>
                            <h3>Rp. {{$c->price}}</h3>
                        </b>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div> -->
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