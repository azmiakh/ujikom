<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Peserta Didik Baru</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo-container">
        <img src="assets/img/hero-img.png" class="logo">
    </div>
    
    <form action="/submit-form" method="POST" enctype="multipart/form-data" onsubmit="printForm(event)">
        <h2>Formulir Daftar Ulang Peserta Didik Baru Cendekia Primary School</h2><br>

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama_lengkap" required><br><br>

        <label for="tgl-lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl-lahir" name="tanggal_lahir" required><br><br>

        <label for="jenis-kelamin">Jenis Kelamin:
            <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required> Perempuan
        </label><br><br>

        <label for="agama">Agama:</label>
        <select id="agama" name="agama" required>
            <option value="" disabled selected></option>
            <option value="Islam">Islam</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select><br><br>

        <label for="alamat">Alamat Lengkap:</label>
        <textarea id="alamat" name="alamat_lengkap" required></textarea><br><br>

        <label for="nik">Nomor Induk Kependudukan (NIK):</label>
        <input type="text" id="nik" name="nik" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" required><br><br>

        <label for="golongan-darah">Golongan Darah:
            <input type="radio" id="golongan-a" name="golongan_darah" value="A" required> A
            <input type="radio" id="golongan-b" name="golongan_darah" value="B" required> B
            <input type="radio" id="golongan-ab" name="golongan_darah" value="AB" required> AB
            <input type="radio" id="golongan-o" name="golongan_darah" value="O" required> O
        </label><br><br>

        <label for="anak-ke">Anak ke berapa dari berapa saudara:</label>
        <div class="input-group">
            <input type="number" id="anak-ke" name="anak_ke" min="1" required>
            <span>dari</span>
            <input type="number" id="total-saudara" name="total_saudara" min="1" required>
        </div>
        
        <label for="akta">Akta Kelahiran:</label>
        <input type="file" id="akta" name="akta_kelahiran" accept="image/*" required onchange="previewImage(event)">
        <img id="akta-preview" src="#" alt="Pratinjau Gambar Akta Kelahiran" style="display:none; margin-top: 10px; max-width: 100%; height: auto;"><br><br>

        <label for="kk">Kartu Keluarga:</label>
        <input type="file" id="kk" name="kartu_keluarga" accept=".doc,.docx,.pdf" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
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
</script>
