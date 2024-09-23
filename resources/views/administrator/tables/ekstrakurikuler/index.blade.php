@extends('administrator/layouts/app')


@section('content')
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Ekstrakurikuler Formulir</h1>
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Ekstrakurikuler</th>
                                <th scope="col">No. Telepon Orang Tua</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            <tbody>
                                @foreach ($peserta as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->kelas }}</td>
                                        <td>{{ $p->ekskul }}</td>
                                        <td>{{ $p->no_ortu }}</td>
                                        <td>
                                            
                                            <form action="{{ route('admin.ekstrakurikuler.destroy', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
        </div>
    </section>
</main>
@endsection