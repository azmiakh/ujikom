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
            <form action="{{ route('admin.logintables.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="registration_number">Nomor Pendaftaran:</label>
                    <input type="text" class="form-control" id="registration_number" name="registration_number" required>
                </div>
                <br>
                
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank"></p>

        </div>
    </div>
</main>
@endsection
