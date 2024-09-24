<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Ekstrakurikuler</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset("assets/img/hero-img.png") }}" class="logo">
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data" onsubmit="printForm(event)">
        @csrf
        <h2>Formulir Pendaftaran Ekstrakurikuler</h2><br>

        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" required><br><br>

        <label for="jenis-kelamin">Jenis Kelamin:
            <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required> Perempuan
        </label><br><br>

        <label for="ekskul">Pilih Ekstrakurikuler:</label>
        <select id="ekskul" name="ekskul">
            <option value="" disabled selected></option>
            <option value="Pramuka">Pramuka</option>
            <option value="Pencak Silat">Pencak Silat</option>
            <option value="Tari Tradisional">Tari Tradisional</option>
            <option value="Paduan Suara">Sepak Bola</option>
            <option value="Paduan Suara">Badminton</option>
            <option value="Paduan Suara">Dokter Kecil</option>
            <option value="Paduan Suara">English Club</option>
            <option value="Paduan Suara">Paskibra</option>
        </select><br><br>

        <label for="no_ortu">No. Telepon Orang Tua:</label>
        <input type="text" id="no_ortu" name="no_ortu" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>