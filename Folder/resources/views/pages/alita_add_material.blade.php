<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/iforte_add_material.css">
   

    <title>Tambah Material Alita</title>
    
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
                <img src="img/jakeu.jpeg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Tambah Material</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Tambah Material</a>
                        </li>
                    </ul>
                </div>
                <!-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a> -->
            </div>
            
            <div class="form-container">
                <form method="post" action="{{ route('alita.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card mt-5">
                    <div class="card-header">
                      <h3>Form Tambah Material</h3><br>
                    </div>
                    <div class="card-body">
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
                    <label class="form-label" for="dropdown">Kategori</label>
                      <select name="kategori" class="form-control" for="kategori">
                        <option value="Kabel">Kabel</option>
                        <option value="Tiang">Tiang</option>
                        <option value="ODP">ODP</option>
                        <option value="OTB">OTB</option>
                        <option value="Asesoris">Asesoris</option>
                        <option value="Stoping">Stoping</option>
                        <option value="Steel Belt">Steel Belt</option>
                        <option value="Breaket">Breaket</option>
                        <option value="Slek Support">Slek Support</option>
                        <option value="Patchcord">Patchcord</option>
                        <option value="CLosure">CLosure</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" class="form-control" name="nama_material" placeholder="Detail Material">
                  </div>

                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
                  </div>

                  <div class="form-group">
                    <label for="pic_penerima">PIC Penerima</label>
                    <input type="text" class="form-control" name="pic_penerima" placeholder="Masukkan PIC Penerima">
                  </div>

                  <div class="form-group">
                    <label for="stok_masuk">Stok Masuk</label>
                    <input type="text" class="form-control" name="stok_masuk" placeholder="Masukkan Stok Masuk">
                  </div>

                  <div class="form-group">
                    <label for="stok_keluar">Stok Keluar</label>
                    <input type="text" class="form-control" name="stok_keluar" placeholder="Masukkan Stok Keluar">
                  </div>

                  <div class="form-group">
                    <label for="stok_sisa">Stok Sisa</label>
                    <input type="text" class="form-control" name="stok_sisa" placeholder="Masukkan Stok Sisa">
                  </div>

                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                  </div>

                  <label for="surat_jalan">Upload Surat Jalan</label>
                  <div class="form-group file-upload">
                    <input class="form-control" type="file" name="foto_surat_jalan" id="surat_jalan" onchange="showFileName('surat_jalan', 'surat_jalan_input')">
                    <label for="surat_jalan">Upload File</label>
                    <input type="text" id="surat_jalan_input" readonly>
                  </div>

                  <label for="barang_datang">Upload Foto Barang Datang</label>
                  <div class="form-group file-upload">
                    <input class="form-control" type="file" name="foto_barang_datang" id="barang_datang" onchange="showFileName('barang_datang', 'barang_datang_input')">
                    <label for="barang_datang">Upload File</label>
                    <input type="text" id="barang_datang_input" readonly>
                  </div>

                  <label for="barang_datang">Upload Foto Bongkar Barang</label>
                  <div class="form-group file-upload">
                    <input class="form-control" type="file" name="foto_bongkar_barang" id="bongkar_barang" onchange="showFileName('bongkar_barang', 'bongkar_barang_input')">
                    <label for="bongkar_barang">Upload File</label>
                    <input type="text" id="bongkar_barang_input" readonly>
                  </div>

                  <label for="lain_lain">Upload Foto Lain-lain</label>
                  <div class="form-group file-upload">

                    <input class="form-control" type="file" name="foto_lain_lain" id="lain_lain" onchange="showFileName('lain_lain', 'lain_lain_input')">
                    <label for="lain_lain">Upload File</label>
                    <input type="text" id="lain_lain_input" readonly>
                  </div>
                  
                  <button type="submit">Submit</button> 
                </form>
              </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="js/iforte_add_material.js"></script>
</body>
</html>
