<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/datamaterial.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-qsbR5zMKiKm5CjDKOGFpB4K/QFh0vEFbLEmMSTvwLBSw8ihfKcUyLkqibjsAY20S" crossorigin="anonymous">

    <title>Data Material Alita</title>
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css">

    <title>Dashboard</title>
</head>
<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <!-- <i class='bx bxs-smile'></i> -->
            <img class='bx' src="img/famika.png" style="width: 10px;"><span>
            <span class="text">PT FAMIKA</span>
        </a>
        <ul class="side-menu top">
        <li>
            @if(Auth::user()->role == 'Administrator')
                <a href="dashboardAdmin">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            @else
                <a href="dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            @endif
        </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt' ></i>
                    <span class="text">My Store</span>
                </a>
            </li> -->
            <li>
                <a href="https://fajarmitra.co.id/">
                    <i class='bx bxs-doughnut-chart' ></i>
                    <span class="text">Company Profile</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-message-dots' ></i>
                    <span class="text">Message</span>
                </a>
            </li> -->
            <li>
                <a href="team">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <i class='bx bxs-building'></i>
                    <span class="text">Mitra</span>
                    <span class="dropdown-icon"></span> <!-- Menambahkan elemen untuk ikon dropdown -->
                </a>
                <ul class="dropdown-menu">
                    <li><a href="iforte_main_menu">iForte</a></li>
                    <li><a href="xl_main_menu">XL Axiata </a></li>
                    <li><a href="telkom_main_menu">GPS</a></li>
                    <li><a href="alita_main_menu">Alita</a></li>
                </ul>
            </li>
        </ul>
        <ul class="side-menu">
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <!-- <li>
                <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="text">Settings</span>
                </a>
            </li> -->
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
            <!-- <a href="#" class="nav-link">Categories</a> -->
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <!-- <a href="#" class="notification">
                <i class='bx bxs-bell' ></i>
                <span class="num">8</span>
            </a> -->
            <a href="#" class="profile">
                <img src="{{ url('img/jakeu.jpeg')}}">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Data Material Alita</h1>
                    @if(isset($kategori))
                    <h2>Kategori: {{ $kategori }}</h2>
                    @endif
                </div>
            </div>
            <hr class="horizontal-line">
            <!-- SCROLL -->
            <div class="scroll-block">
            <div class="categories-block">
                <a class="category-block" href="{{ route('alita.showByCategory', 'Kabel') }}">
                    <span class="scroll-category">
                        <span>Kabel FO</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Tiang') }}">
                    <span class="scroll-category">
                        <span>Tiang</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'ODP') }}">
                    <span class="scroll-category">
                        <span>ODP</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'OTB') }}">
                    <span class="scroll-category">
                        <span>OTB</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Asesoris') }}">
                    <span class="scroll-category">
                        <span>Asesoris</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Stoping') }}">
                    <span class="scroll-category">
                        <span>Stoping</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Steel Belt') }}">
                    <span class="scroll-category">
                        <span>Steel Belt</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Breaket') }}">
                    <span class="scroll-category">
                        <span>Breaket</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Slek Support') }}">
                    <span class="scroll-category">
                        <span>Slek Support</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Patchcord') }}">
                    <span class="scroll-category">
                        <span>Patchcord</span>
                    </span>
                </a>
                <a class="category-block" href="{{ route('alita.showByCategory', 'Closure') }}">
                    <span class="scroll-category">
                        <span>Closure</span>
                    </span>
                </a>
            </div>
        </div>
        <a href="/add-alita-material">
        <button class="tambah-btn">+Tambah</button>
        </a>
            
        <div class="container-galeri">
            <table class="gallery-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Nama Material</th>
                        <th>PIC Penerima</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Stok Sisa</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $material)
                    <tr>
                        <td>{{ $material->tanggal }}</td>
                        <td>{{ $material->kategori }}</td>
                        <td>{{ $material->nama_material }}</td>
                        <td>{{ $material->pic_penerima }}</td>
                        <td>{{ $material->stok_masuk }}</td>
                        <td>{{ $material->stok_keluar }}</td>
                        <td>{{ $material->stok_sisa }}</td>
                        <td>{{ $material->keterangan }}</td>
                        <td>
                            @if(Auth::user()->role == 'Administrator')
                            <form action="{{ route('alitamaterial.delete', $material->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="download-btn">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    

    <script src="{{ asset('js/material.js') }}"></script>
</body>
</html>
