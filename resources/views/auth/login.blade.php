<!DOCTYPE html>
<html>

<head>
    <title>Logowanie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<style>
 .display-4 {
    text-align: center;
}

input:hover {
    opacity: 0.9;
}


.card {
    padding: 50px 30px;
    background: #fff;
    margin: auto;

}

html,
body {
    height: 100%;
}

#cover {
    background: url('https://t1-cms-3.images.toyota-europe.com/toyotaone/plpl/nowe-samochody-toyota-auris-corolla-full_tcm-1015-1476676.jpg') center center no-repeat;
    background-size: cover;
    height: 100%;
    text-align: center;
    display: flex;
    align-items: center;
}

#cover-caption {
    width: 100%;
}
</style>
<body>

    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <div class="card">
                            <h1 class="text-center">Logowanie</h1>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
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

