@extends('administrator/layouts/app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Edit Data</h1>
      <nav>
        
      </nav>
  </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.ekstrakurikuler.update', $peserta->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" value="{{ $peserta->name }}" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" value="{{ $peserta->kelas }}" required>
                </div>

                <div class="form-group">
                    <label for="jenis-kelamin">Jenis Kelamin:
                        <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" value="Laki-laki" {{ $peserta->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} required> Laki-laki
                        <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" value="Laki-laki" {{ $peserta->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} required> Perempuan
                    </label>
                </div>

                <div class="form-group">
                    <label for="ekskul">Pilih Ekstrakurikuler:</label>
                    <select id="ekskul" name="ekskul">
                        <option value="" disabled selected></option>
                        <option value="Pramuka" {{ $peserta->ekskul == 'Pramuka' ? 'selected' : '' }}>Pramuka</option>
                        <option value="Pencak Silat"    {{ $peserta->ekskul == 'Pencak Silat' ? 'selected' : '' }}>Pencak Silat</option>
                        <option value="Tari Tradisional" {{ $peserta->ekskul == 'Tari Tradisional' ? 'selected' : '' }}>Tari Tradisional</option>
                        <option value="Paduan Suara" {{ $peserta->ekskul == '{Paduan Suara}' ? 'selected' : '' }}>Paduan Suara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_ortu">No. Telepon Orang Tua:</label>
                    <input type="text" id="no_ortu" name="no_ortu" value="{{ $peserta->no_ortu }}"required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>
        </div>
    </div>
</main>
@endsection

