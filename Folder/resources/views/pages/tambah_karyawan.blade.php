<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/stylematerial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/team_style.css') }}">
    <title>Tambah Karyawan Baru</title>
</head>
<body>
    <section id="content">
        <nav>
            <a href="{{ url('team') }}" class="btn-back">Kembali</a>
        </nav>

        <main class="form-container">
            <h1>Tambah Karyawan Baru</h1>
            <form action="{{ url('simpan_karyawan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" id="nama_karyawan" required>
                </div>
                <div class="form-group">
                    <label for="posisi_karyawan">Posisi Karyawan</label>
                    <input type="text" name="posisi_karyawan" id="posisi_karyawan" required>
                </div>
                <div class="form-group">
                    <label for="status_karyawan">Status Karyawan</label>
                    <input type="text" name="status_karyawan" id="status_karyawan" required>
                </div>
                <button type="submit" class="btn-submit">Simpan</button>
            </form>
        </main>
    </section>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Data Karyawan</title>
<link href="{{ asset('css/iforte_add_po.css') }}" rel="stylesheet" />
</head>
<body>
<div class="form-container">
    <h2>Input Data Karyawan</h2>
    <form action="{{ url('simpan_karyawan') }}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="alert-title"><h4>Whoops!</h4></div>
            There are some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="form-group">
        <label for="project-name">Nama Karyawan</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan" placeholder="Masukkan nama karyawan...">
    </div>
    <div class="form-group">
        <label for="spk-number">Posisi Karyawan</label>
        <input type="text" id="posisi_karyawan" name="posisi_karyawan" placeholder="Masukkan posisi karyawan...">
    </div>
    <div class="form-group">
        <label for="spk-number">Status Karyawan</label>
        <input type="text" id="status_karyawan" name="status_karyawan" placeholder="Masukkan status karyawan...">
    </div>
    
    <div class="form-group">
        <button type="submit">Tambah</button>
    </div>
    </form>
</div>
</body>
</html>
