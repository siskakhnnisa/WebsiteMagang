<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/stylematerial.css">


	<title>FAMIKA</title>
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
            <li class="active">
                <a href="dashboard">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Home</span>
                </a>
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
                    <li><a href="telkom_main_menu">Telkom Indonesia</a></li>
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
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
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

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h2>Menu</h2><br>
				</div>
			</div>

			<!-- po > ring > segment -->
			<div class="head-title">
				<div class="left">
					<ul class="breadcrumb">
						<br><br>
						<li class="subpo">
							<a href="#">PO</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li class="subring">
							<a href="#">Ring</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li class="subsegment">
							<!-- <a class="active" href="#">Segment</a> -->
							<a href="#">Segment</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- PO -->
			<a href="iforte_add_po" class="btn-tambah">
				<b>+</b>
				<span class="text">Tambah PO</span>
			</a>

			<div class="container">
			        <div class="scroll-menu">
			            <div class="menu" id="menu">
							@foreach($data as $po)
								<a href="{{ route('ifortering.show', $po->no_spk) }}" class="box-menu" data-ring="ring{{ $loop->index + 1 }}">
									<h3>{{ $po->nama_projek }}</h3>
									<p>{{ $po->no_spk }}</p>
								</a>
							@endforeach
			            </div>
			        </div>
			        <!-- panah scroll kiri -->
			        <button class="scroll-arrows" id="scrollLeft">&lt;</button>
			        <!-- scroll kanan -->
			        <button class="scroll-arrows" id="scrollRight">&gt;</button>
			</div>

		    <!-- RING -->
			<div class="ring">
				<div class="todo">
					<div class="head">
						<h3>Ring</h3>
						<a href="iforte_add_ring"><i class="bx bx-plus"></i></a>
					</div>

					@foreach($data as $po)
						<ul class="todo-list" id="ring{{ $loop->index + 1 }}" style="display: none;">
							@foreach($po->rings as $ring)
								<a href="#" data-segment="segment1">
									<li class="chosen">
										<p>{{ $ring->nama_ring }}</p>
										<i class='bx bx-dots-vertical-rounded' ></i>
									</li>
								</a>
								<br>
							@endforeach
						</ul>
					@endforeach
				</div>

				<!-- SEGMENT -->
				<div class="segment">
					<div class="head">
						<h3>Segment</h3>
						<a href="#"><i class="bx bx-plus"></i></a>
					</div>
					<table>
						<thead>
							<tr>
								<th>Detail</th>
								<th style="padding-left: 14px;">Status</th>
								<th style="padding-left: 17px;">Action</th>
							</tr>
						</thead>
						<tbody id="segment1" style="display: none;">

							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 1</p>
								</td>
								<td><span class="status ongoing">On Going</span></td>
								<td class="action-segment">
									<a href="dokfile.html">
									<img src="img/dokumen.png">
									</a>
									<a href="dokgambar.html">
									<img src="img/galeri.png">
									</a>
								</td>
							</tr>

							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 2</p>
								</td>
								<td><span class="status finished">Finished</span></td>
								<td class="action-segment">
									<img src="img/dokumen.png">
									<img src="img/galeri.png">
								</td>
							</tr>
							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 3</p>
								</td>
								<td><span class="status planned">Planned</span></td>
								<td class="action-segment">
									<img src="img/dokumen.png">
									<img src="img/galeri.png">
								</td>
							</tr>
							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 4</p>
								</td>
								<td><span class="status finished">Finished</span></td>
								<td class="action-segment">
									<img src="img/dokumen.png">
									<img src="img/galeri.png">
								</td>
							</tr>
							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 5</p>
								</td>
								<td><span class="status planned">Planned</span></td>
								<td class="action-segment">
									<img src="img/dokumen.png">
									<img src="img/galeri.png">
								</td>
							</tr>
							<tr>
								<td>
									<img src="img/ring.png">
									<p>Segment 6</p>
								</td>
								<td><span class="status planned">Planned</span></td>
								<td class="action-segment">
									<img src="img/dokumen.png">
									<img src="img/galeri.png">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="js/script.js"></script>
</body>
</html>
