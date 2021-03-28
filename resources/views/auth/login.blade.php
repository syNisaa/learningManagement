<!DOCTYPE html>
<html>

<head>
    <title>Login & Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url ('js-cs-log/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Sign In</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label>
                    <span>Email</span>
                    <input type="email" id="email" lass="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <label>
                    <span>Password</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <button class="submit" type="submit">Sign In</button>
            </form>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h3>Sign Up For Your Instansi</h3>
                    <a href="/"><button>Back</button></a>
                </div>
                <div class="img-text m-in">
                    <h3>Already have account Member? Sign In</h3>
                </div>
                <div class="img-btn">
                    <span class="m-up"> Sign Up</span>
                    <span class="m-in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
            <h2>Sign Up - Instansi</h2>
            <form method="POST" action="{{ route('reginstansi') }}">
                @csrf
                <label>
                    <span>Nama Instansi</span>
                    <input type="text" id="instansi" lass="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ old('instansi') }}" required autocomplete="instansi" autofocus>

                    @error('instansi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <label>
                    <span>Penanggung Jawab</span>
                    <input id="person" type="text" class="form-control @error('person') is-invalid @enderror" name="person" required autocomplete="current-password">
                    @error('person')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <label>
                    <span>Alamat</span>
                    <input id="addres" type="addres" class="form-control @error('addres') is-invalid @enderror" name="addres" required autocomplete="current-password">
                    @error('addres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <button class="submit" type="submit">Sign Un</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('js-cs-log/script.js')}}"></script>

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
            const response = await fetch("{{ route('payment') }}", {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body: JSON.stringify(data)
            })
            const result = await response.text()
            // alert(result)
            // snap.pay(result)
            snap.pay(result, {
                onSuccess: async function(result) {
                    console.log('success');
                    console.log(result);
                    const register = await fetch("{{ route('dataregister') }}", {
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
                            class: formData.get('classcategory')
                        })
                    })
                    var name = document.getElementsByName('name')
                    var email = document.getElementsByName('email')
                    var gender = document.getElementsByName('gender')
                    var phone =document.getElementsByName('phone')
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
                    window.location = '{{route("login")}}'
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

    <!-- <script>
        const formBayar = document.querySelector("#form-bayar")
        const formData = new FormData(formBayar)
        const data = {
            price: formData.get('price'),
            name: formData.get('name').val(),
            email: formData.get('email').val(),
        }
        formBayar.addEventListener("submit", async (e) => {
            e.preventDefault()
            // const response = await fetch("{{ route('payment') }}",{
            //     method:"post",
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{csrf_token()}}'
            //     },
            //     body:JSON.stringify(data)
            // })
            // const token = await response.text()
            console.log(data)
            // snap.pay(token)

        })
    </script> -->


</body>

</html>