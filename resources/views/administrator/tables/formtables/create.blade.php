@extends('administrator/layouts/app')

@section('content')
<style>
.card {
    width: 100%; 
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    border-radius: 0; 
}

input[type="text"], input[type="number"], input[type="date"], select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border-radius: 0;
    border: 1px solid #ccc;
    font-size: 14px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 14px;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 0;
    cursor: pointer;
    font-size: 14px;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

body {
    padding: 0;
    margin: 0;
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
                <br>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>
        </div>
    </div>
</main>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function(){
            var imgElement = document.getElementById('akta-preview');
            imgElement.src = reader.result;
            imgElement.style.display = 'block';
        }

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    function printForm(event) {
        event.preventDefault();
        window.print();

        setTimeout(function() {
            event.target.submit();
        }, 1000);
    }
    function validateForm() {
        var nikInput = document.getElementById('nik').value;
        if (nikInput.length !== 16) {
            alert('NIK harus berisi tepat 16 digit.');
            return false;
        }
        return true;
    }
</script>
@endsection
