<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/stylematerial.css') }}">
    <link rel="stylesheet" href="{{ asset('css/team_style.css') }}">
    <title>Daftar Tim FAMIKA Regional Jawa Tengah</title>
  
</head>
<body>
     <!-- SIDEBAR -->
     <section id="sidebar">
        <a href="#" class="brand">
            <img class='bx' src="img/famika.png" style="width: 10px;">
            <span class="text">PT FAMIKA</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="dashboard">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="https://fajarmitra.co.id/">
                    <i class='bx bxs-doughnut-chart' ></i>
                    <span class="text">Company Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <i class='bx bxs-building'></i>
                    <span class="text">Mitra</span>
                    <span class="dropdown-icon"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="iforte_main_menu">iForte</a></li>
                    <li><a href="xl_main_menu">XL Axiata </a></li>
                    <li><a href="telkom_main_menu">Telkom Indonesia</a></li>
                    <li><a href="alita_main_menu">Alita</a></li>
                </ul>
            </li>
        </ul>
        <ul class="side-menu">
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <li>
                <a href="index" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/profile.png">
			</a>
		</nav>
		<!-- NAVBAR -->

        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Daftar Pegawai PT. Famika Regional Jawa Tengah</h1>
                <div class="input-group">
                    <input type="search" placeholder="Cari Pegawai...">
                    <img src="{{ asset('img/search.png') }}" alt="">
                </div>
                <button class="btn-add" onclick="window.location.href='{{ url('tambah_karyawan') }}'">
                    Tambah Karyawan <i class='bx bx-plus'></i>
                </button>

                <div class="export__file">
                    <label for="export-file" class="export__file-btn" title="Export File"></label>
                    <input type="checkbox" id="export-file">
                    <div class="export__file-options">
                        <label>Export As &nbsp; &#10140;</label>
                        <label for="export-file" id="toPDF">PDF <img src="{{ asset('img/pdf.png') }}" alt=""></label>
                        <label for="export-file" id="toJSON">JSON <img src="{{ asset('img/json.png') }}" alt=""></label>
                        <label for="export-file" id="toCSV">CSV <img src="{{ asset('img/csv.png') }}" alt=""></label>
                        <label for="export-file" id="toEXCEL">EXCEL <img src="{{ asset('img/excel.png') }}" alt=""></label>
                    </div>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>No <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Pegawai <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Posisi <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawans as $karyawan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('img/man_profile.jpeg') }}" alt="">{{ $karyawan->nama_karyawan }}</td>
                            <td>{{ $karyawan->posisi_karyawan }}</td>
                            <td>
                                <p class="status delivered">{{ $karyawan->status_karyawan }}</p>
                            </td>
                            <td class="action-btn">
                                @if(Auth::user()->role == 'Administrator')
                                <form action="{{ route('karyawan.delete', $karyawan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </section>

    <script src="{{ asset('js/team_script.js') }}"></script>

</body>
</html>
