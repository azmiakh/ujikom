<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="assets/img/hero-img.png" class="logo">
        </div>

        <div class="login-card">
            <h3>Daftar Ulang Peserta Didik Baru <br> Cendekia Primary School</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-container">
                    <!-- <label for="name">Nama Lengkap</label> -->
                    <input type="text" id="name" name="name" placeholder="Nama Lengkap" required>
                    @if ($errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="input-container">
                    <!-- <label for="registration_number">Nomor Pendaftaran</label> -->
                    <input type="text" id="registration_number" name="registration_number" placeholder="Nomor Pendaftaran" required>
                    @if ($errors->has('registration_number'))
                        <p style="color: red;">{{ $errors->first('registration_number') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn-submit">Submit</button>
                @if ($errors->has('login_error'))
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{ $errors->first('login_error') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
