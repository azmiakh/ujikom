@extends('administrator/layouts/app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Tambah Data</h1>
      <nav>
        
      </nav>
  </div>

  <div class="card">
        <div class="card-body">
            <form action="{{ route('ekstrakurikuler.create') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" required>
                </div>

                <div class="form-group">
                    <label for="jenis-kelamin">Jenis Kelamin:
                        <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required> Perempuan
                    </label>
                </div>

                <div class="form-group">
                    <label for="ekskul">Pilih Ekstrakurikuler:</label>
                    <select id="ekskul" name="ekskul">
                        <option value="" disabled selected></option>
                        <option value="Pramuka">Pramuka</option>
                        <option value="Pencak Silat">Pencak Silat</option>
                        <option value="Tari Tradisional">Tari Tradisional</option>
                        <option value="Paduan Suara">Paduan Suara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_ortu">No. Telepon Orang Tua:</label>
                    <input type="text" id="no_ortu" name="no_ortu" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>
        </div>
    </div>
</main>
@endsection
                


