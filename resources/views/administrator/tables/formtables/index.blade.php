@extends('administrator/layouts/app')


@section('content')
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Formulir Login</h1>
      <nav>
        
      </nav>
  </div>

  <section class="section">
        <div class="row">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <a href="{{ route('admin.formtables.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Golongan Darah</th>
                                <th scope="col">Anak Ke</th>
                                <th scope="col">Jumlah Saudara</th>
                                <th scope="col">Akta</th>
                                <th scope="col">KK</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($peserta as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->tanggal_lahir }}</td>
                                        <td>{{ $p->jenis_kelamin }}</td>
                                        <td>{{ $p->agama }}</td>
                                        <td>{{ $p->alamat_lengkap }}</td>
                                        <td>{{ $p->nik }}</td>
                                        <td>{{ $p->golongan_darah }}</td>
                                        <td>{{ $p->anak_ke }}</td>
                                        <td>{{ $p->total_saudara }}</td>
                                        <td><img src="{{ Storage::url($p->akta_kelahiran) }}" alt="Akta Kelahiran" style="max-width: 100px; height: auto;"></td>
                                        <td><a href="{{ Storage::url($p->kartu_keluarga) }}" target="_blank">Pratinjau KK</a></td>                
                                        <td>
                                            <a href="{{ route('admin.formtables.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.formtables.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
        </div>
    </section>
</main>
@endsection
