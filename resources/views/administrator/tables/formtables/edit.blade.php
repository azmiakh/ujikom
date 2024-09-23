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
            <form action="{{ route('admin.formtables.update', $peserta->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $peserta->name }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $peserta->tanggal_lahir }}" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <div>
                            <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" {{ $peserta->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }} required> Laki-laki
                            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" {{ $peserta->jenis_kelamin == 'Perempuan' ? 'checked' : '' }} required> Perempuan
                        </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama:</label>
                    <select class="form-control" id="agama" name="agama" required>
                        <option value="Islam" {{ $peserta->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen Protestan" {{ $peserta->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                        <option value="Katolik" {{ $peserta->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ $peserta->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $peserta->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ $peserta->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap:</label>
                    <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" required>{{ $peserta->alamat_lengkap }}</textarea>
                </div>

                <div class="form-group">
                    <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $peserta->nik }}" required>
                </div>

                <div class="form-group">
                    <label for="golongan_darah">Golongan Darah:</label>
                    <div>
                        <input type="radio" id="golongan_a" name="golongan_darah" value="A" {{ $peserta->golongan_darah == 'A' ? 'checked' : '' }} required> A
                        <input type="radio" id="golongan_b" name="golongan_darah" value="B" {{ $peserta->golongan_darah == 'B' ? 'checked' : '' }} required> B
                        <input type="radio" id="golongan_ab" name="golongan_darah" value="AB" {{ $peserta->golongan_darah == 'AB' ? 'checked' : '' }} required> AB
                        <input type="radio" id="golongan_o" name="golongan_darah" value="O" {{ $peserta->golongan_darah == 'O' ? 'checked' : '' }} required> O
                    </div>
                </div>

                <div class="form-group">
                    <label for="anak_ke">Anak ke berapa dari berapa saudara:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="{{ $peserta->anak_ke }}" required>
                        <span>dari</span>
                        <input type="number" class="form-control" id="total_saudara" name="total_saudara" value="{{ $peserta->total_saudara }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="akta_kelahiran">Akta Kelahiran:</label>
                    <img src="{{ Storage::url($peserta->akta_kelahiran) }}" alt="Akta Kelahiran" style="max-width: 100px; margin-top: 10px;" input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran" accept="image/*">
                
                </div>

                <div class="form-group">
                    <label for="kartu_keluarga">Kartu Keluarga:</label>
                    <a href="{{ Storage::url($peserta->kartu_keluarga) }}" target="_blank" input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga" accept=".doc,.docx,.pdf">Lihat Kartu Keluarga</a>
                    
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>
        </div>
    </div>
</main>
@endsection
