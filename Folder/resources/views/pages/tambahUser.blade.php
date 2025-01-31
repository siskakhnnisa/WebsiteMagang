<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/tambah.css">

    <title>Tambah User</title>
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
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="profile">
                <img src="img/jakeu.jpeg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Tambah User</h1>
                </div>
            </div>
            <hr class="horizontal-line">
            <div class="container">
                <form method="post" action="{{ route('tambah.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h4>Nama</h4>
                    <input type="text" id="nama" name="nama" placeholder="Nama" required>
                    <h4>Role</h4>
                    <input type="text" id="role" name="role" placeholder="Role" required>
                    <h4>Username</h4>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <h4>Password</h4>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="submit" class="upload-btn">Tambah</button>
                </form>
            </div>
            <div class="container-file">
                <table class="gallery-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Action</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tambah as $index => $input)
                        <tr>
                            <td>{{ $input->nama }}</td>
                            <td>{{ $input->role }}</td>
                            <td>{{ $input->username }}</td>
                            <td>
                                <form action="{{ route('tambah.delete', $input->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="download-btn">Hapus</button>
                                </form>
                            </td>
                            <td>{{ $input->password }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="js/tambah.js"></script>
</body>
</html>
