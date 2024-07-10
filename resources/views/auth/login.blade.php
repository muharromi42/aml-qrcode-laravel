<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/logintemplate/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/logintemplate/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/logintemplate/assets/css/style.css" rel="stylesheet">

    <title>Login || Barang Masuk Qr Code</title>
</head>

<body>
    <section class="form-02-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo" style="margin-top: 100px">
                                <img src="/logintemplate/assets/images/user.png">
                            </div>
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" id="email_address" name="email"
                                        class="form-control _ge_de_ol" type="text" placeholder="Enter Email"
                                        required="" aria-required="true">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control _ge_de_ol"
                                        type="text" placeholder="Enter Password" required="" aria-required="true">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                {{-- <div class="checkbox form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="">
                                    <label class="form-check-label" for="">
                                        Remember me
                                    </label>
                                </div>
                            </div> --}}

                                <div class="form-group mt-5 mb-5">
                                    <button type="submit" class="_btn_04">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
