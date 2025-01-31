<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dokfile.css">

    <title>Upload File Iforte</title>
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
                <a href="#">
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
                    <li><a href="#">iForte</a></li>
                    <li><a href="#">XL Axiata </a></li>
                    <li><a href="#">GPS</a></li>
                    <li><a href="#">Alita</a></li>
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
                <a href="#" class="logout">
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
                    <h1>Dokumentasi File Iforte</h1>
                </div>
                
            </div>
            <hr class="horizontal-line">
            <div class="container-kiri">
                <form method="post" action="{{ route('file.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="segment_id" value="{{ request()->segment_id }}">
                <h3>Upload File</h3>
                <div class="upload-section">
                    <input type="file" id="upload" name="dokumen" accept=".doc,.docx,.pdf">
                </div>
            </div>
            <!-- Kolom untuk form Keterangan -->
            <div class="container-kanan">
                <h3>Keterangan</h3>
                <textarea id="keterangan" name="keterangan" placeholder="Keterangan" rows="1"></textarea>
                <button type="submit" class="upload-btn">Upload</button>
            </div>
            </form>
            <div class="container-galeri">
                <table class="gallery-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $file)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $file->keterangan }}</td>
                            <td>
                                <a href="{{ route('file.download', $file->dokumen) }}" class="download-btn">Download</a>
                                @if(Auth::user()->role == 'Administrator')
                                <form action="{{ route('document.deleteIforte', $file->id) }}" method="POST" style="display:inline;">
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
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    

    <script src="js/upload_file.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.action-segment a[href="uploadfile.html"]', function(e){
            e.preventDefault();
            var segment_id = $(this).closest('tr').find('input[type="hidden"]').last().val();
            window.location.href = '/document?segment_id=' + segment_id;
        });
    </script>
</body>
</html>
