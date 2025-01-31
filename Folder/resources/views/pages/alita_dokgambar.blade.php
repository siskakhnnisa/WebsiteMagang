<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dokgambar.css">

    <title>Upload Gambar Alita</title>
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
                    <h1>Dokumentasi Gambar Alita</h1>
                </div>
            </div>
            <form method="post" action="{{ route('dokumentasi.storeAlita') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="segment_id" value="{{ request()->segment_id }}">
                <hr class="horizontal-line">
                <div class="container-kiri">
                    <h3>Upload Gambar</h3>
                    <div class="upload-section">
                        <label for="upload" class="img-area">
                            <span><i class='bx bxs-cloud-upload icon'></i></span>
                            <p><input type="file" accept=".jpg,.png,.jpeg" name="gambar" id="formFile"></p>
                        </label>
                    </div>
                </div>
                <!-- Kolom untuk form Keterangan -->
                <div class="container-kanan">
                    <h3>Keterangan</h3>
                    <textarea id="keterangan" class="form-control" name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan keterangan meliputi tanggal serta detail lain yang dibutuhkan" rows="4"></textarea>
                    <button class="upload-btn" type="submit">Upload</button>
                </div>
            </form>

            <div class="container-galeri">
                <h2>Galeri</h2>
                <div class="images">
                    @foreach($data as $item)
                    <div class="image-box" data-name="kabel1">
                        @if(Auth::user()->role == 'Administrator')
                            <div class="menu-container">
                                <i class='bx bx-dots-vertical-rounded menu-btn'></i>
                                <div class="menu-content">
                                    <form action="{{ route('dokumentasi.destroyAlita', $item->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <img src="{{ asset($item->gambar) }}" alt="dokumentasi" class="img-clickable" data-id="{{ $item->id }}" data-image="{{ asset($item->gambar) }}" data-description="{{ $item->keterangan }}">
                        <h6>{{ $item->keterangan }}</h6>
                    </div>
                    @endforeach
                </div>

                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
        </main>
    </section>

    <script src="js/upload_file.js"></script>
    <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        var imgElements = document.getElementsByClassName("img-clickable");
        for (var i = 0; i < imgElements.length; i++) {
            var img = imgElements[i];
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.getAttribute('data-image');
                captionText.innerHTML = this.getAttribute('data-description');
            }
        }

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Toggle menu content display
        document.querySelectorAll('.menu-btn').forEach(menuBtn => {
            menuBtn.addEventListener('click', function() {
                var menuContent = this.nextElementSibling;
                menuContent.style.display = menuContent.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Hide menu content when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.menu-btn')) {
                document.querySelectorAll('.menu-content').forEach(menuContent => {
                    menuContent.style.display = 'none';
                });
            }
        }
    </script>
</body>
</html>