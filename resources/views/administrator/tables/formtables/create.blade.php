@extends('administrator/layouts/app')

@section('content')

<style>
/* Mengatur font untuk keseluruhan form */
body {
    font-family: 'Montserrat', sans-serif;
}

/* Mengatur margin untuk bagian card */
.card {
    margin: 20px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 10px;
}

/* Mengatur lebar form agar tidak terlalu melebar */
form {
    max-width: 800px;
    margin: 0 auto;
}

/* Mengatur tampilan input, select, dan textarea agar lebih rapi */
input[type="text"], input[type="date"], input[type="number"], select, textarea, input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Mengatur label agar lebih menonjol */
label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

/* Mengatur tampilan button */
button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Mengubah warna button saat dihover */
button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Mengatur margin dan tampilan radio button */
input[type="radio"] {
    margin-right: 10px;
}

/* Mengatur margin untuk tiap elemen form */
.form-group {
    margin-bottom: 15px;
}

/* Mengatur tampilan input grup untuk anak ke-berapa */
.input-group {
    display: flex;
    align-items: center;
}

.input-group input {
    width: 100px;
    margin-right: 10px;
}

.input-group span {
    margin-right: 10px;
}

/* Mengatur pratinjau gambar akta kelahiran */
#akta-preview {
    max-width: 100%;
    height: auto;
    display: none;
    margin-top: 10px;
}

/* Mengatur ukuran gambar preview */
img {
    max-width: 100%;
    height: auto;
}

/* Responsif: Mengatur lebar maksimal elemen pada layar kecil */
@media (max-width: 768px) {
    form {
        max-width: 100%;
    }

    .input-group {
        flex-direction: column;
        align-items: flex-start;
    }

    .input-group input {
        width: 100%;
        margin-right: 0;
        margin-bottom: 10px;
    }
}
</style>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Tambah Data</h1>
      <nav>
        
      </nav>
  </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.formtables.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="tgl-lahir">Tanggal Lahir:</label>
                    <input type="date" id="tgl-lahir" name="tanggal_lahir" required>
                </div>

                <div class="form-group">
                    <label for="jenis-kelamin">Jenis Kelamin:
                        <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required> Perempuan
                    </label>
                </div>

                <div class="form-group">
                    <label for="agama">Agama:</label>
                    <select id="agama" name="agama" required>
                        <option value="" disabled selected></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap:</label>
                    <textarea id="alamat" name="alamat_lengkap" required></textarea>
                </div>
                <div class="form-group">
                    <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                    <input type="text" id="nik" name="nik" required>
                </div>

                <div class="form-group">
                    <label for="golongan-darah">Golongan Darah:
                        <input type="radio" id="golongan-a" name="golongan_darah" value="A" required> A
                        <input type="radio" id="golongan-b" name="golongan_darah" value="B" required> B
                        <input type="radio" id="golongan-ab" name="golongan_darah" value="AB" required> AB
                        <input type="radio" id="golongan-o" name="golongan_darah" value="O" required> O
                    </label>
                </div>

                <div class="form-group">
                    <label for="anak-ke">Anak ke berapa dari berapa saudara:</label>
                    <div class="input-group">
                        <input type="number" id="anak-ke" name="anak_ke" min="1" required>
                        <span>dari</span>
                        <input type="number" id="total-saudara" name="total_saudara" min="1" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="akta">Akta Kelahiran:</label>
                    <input type="file" id="akta" name="akta_kelahiran" accept="image/*" required onchange="previewImage(event)">
                    <img id="akta-preview" src="#" alt="Pratinjau Gambar Akta Kelahiran" style="display:none; margin-top: 10px; max-width: 100%; height: auto;">
                </div>

                <div class="form-group">
                    <label for="kk">Kartu Keluarga:</label>
                    <input type="file" id="kk" name="kartu_keluarga" accept=".doc,.docx,.pdf" required>
                </div>
                <!-- <input type="text" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" maxlength="16" required><br><br>
                @if ($errors->has('nik'))
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                @endif -->
                <br>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>
        </div>
    </div>
</main>
@endsection
