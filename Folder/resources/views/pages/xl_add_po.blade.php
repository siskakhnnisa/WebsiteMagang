<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Data Project</title>
<link href="{{ asset('css/iforte_add_po.css') }}" rel="stylesheet" />
</head>
<body>
<div class="form-container">
    <h2>Input Data Project</h2>
    <form method="post" action="{{ route('xlpo.storeXL') }}" enctype="multipart/form-data">
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
        <label for="project-name">Nama Project:</label>
        <input type="text" id="project-name" name="nama_projek" value="{{ old('nama_projek') }}" placeholder="Masukkan nama projek...">
    </div>
    <div class="form-group">
        <label for="spk-number">Nomor SPK:</label>
        <input type="text" id="spk-number" name="no_spk" value="{{ old('no_spk') }}" placeholder="Masukkan nomor SPK...">
    </div>
    <div class="form-group">
        <button type="submit">Tambah</button>
    </div>
    </form>
</div>
</body>
</html>
