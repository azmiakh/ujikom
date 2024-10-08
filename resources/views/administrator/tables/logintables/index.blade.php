@extends('administrator/layouts/app')


@section('content')
<main id="main" class="main">

  <div class="pagetitle">
      <h1>Table Login</h1>
      <nav>
        
      </nav>
  </div>
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <div class="card-body">
              <h5 class="card-title"></h5>
              <a href="{{ route('admin.logintables.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Nomor Pendaftaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($logins as $login)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $login->name }}</td>
                      <td>{{ $login->registration_number }}</td>
                      <td>
                          <a href="{{ route('admin.logintables.edit', $login->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('admin.logintables.destroy', $login->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                          </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>

              
            </div>
          </div>

          
        </div>
      </div>
    </section>
</main>
@endsection
