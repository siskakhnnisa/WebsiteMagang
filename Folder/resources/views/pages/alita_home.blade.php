<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/stylematerial.css">


	<title>Monitoring Progress Alita</title>
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
			<a href="alita_add_po" class="btn-tambah">
				<b>+</b>
				<span class="text">Tambah PO</span>
			</a>

			<div class="container">
			        <div class="scroll-menu">
			            <div class="menu" id="menu">
							@foreach($data as $po)
									<a id="po_clicked" href="" class="box-menu" data-ring="{{ $po->no_spk }}">
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
                            <a id="add_new_ring_alita">
                                <i class="bx bx-plus"></i>
                            </a>

                        </div>
                        <div id="fetch_ring" ></div>

                            <!-- <ul id="fetch_ring" class="todo-list" style="display: none;">

                            </ul> -->
                    </div>


				<!-- SEGMENT -->
				<div class="segment">
					<div class="head">
						<h3>Segment</h3>
						<a id="add_new_segment_alita">
							<i class="bx bx-plus"></i>
						</a>
					</div>
					<table>
						<thead>
							<tr>
								<th>Detail</th>
								<th style="padding-left: 14px;">Status</th>
								<th style="padding-left: 17px;">Action</th>
							</tr>
						</thead>
						<tbody id="segment1">
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // fetch data ring
        $(document).on('click', '#po_clicked', function(e) {
            var poId = $(this).attr('data-ring');
            // alert (poId);
            $.ajax({
                url: 'alita_rings/' + poId,
                type: 'GET',
                success: function(data){
                    // pass data to class=todo-list
                    $('#fetch_ring').empty();
                    $.each(data, function(index, value){
						if (value.nama_ring != null){
                        $('#fetch_ring').append(
                           ' <ul id="ring_clicked" class="todo-list" data-ring-id="'+value.ring_id+'">' +
								'<a data-segment="segment1">' +
                                '<input id="get_no_spk" type="hidden" value="'+value.no_spk+'">'+
									'<li class="chosen">' +
										'<p>'+value.nama_ring+'</p>'+
                                        '<input type="hidden" value="'+value.ring_id+'">'+
										'<i class="bx bx-dots-vertical-rounded"></i>' +
									'</li>' +
								'</a>' +
							'<br>' +
						'</ul>'
                        );
					} else{
						$('#fetch_ring').append(
							'<ul class = "todo-list">'+
								'<input id="get_no_spk" type="hidden" value="'+value.no_spk+'">'+
							'</ul>'
						);
					}
                    });
                }
            });
        });

        // add new ring
        $(document).on('click', '#add_new_ring_alita', function(e){
            var no_spk = $('#get_no_spk').val();
            window.location.href = '/alita_add_ring/' + no_spk;
        });

        // fetch data segment
        $(document).on('click', '#ring_clicked', function(e){
            // get ring id
            // var ring_id = $(this).find('input').val();
            var ring_id = $(this).attr('data-ring-id');
            // alert (ring_id);
            $.ajax({
                url: 'alita_segments/' + ring_id,
                type: 'GET',
                success: function(data){
                    if (data != null){
                        // pass data to id=segment1
                        $('#segment1').empty();
                        $.each(data, function(index, value){
							if (value.nama_segment != null){
                            $('#segment1').append(
                                '<tr id="fetch_data_segment">'+
                                    '<td>'+
										'<input id="get_ring_id" type="hidden" value="'+value.ring_id+'">'+
                                        '<img src="img/ring.png">'+
                                        '<p>'+value.nama_segment+'</p>'+
										'<input type="hidden" value="'+value.id+'">'+
                                    '</td>'+
                                    '<td><span class="status ongoing">On Going</span></td>'+
                                    '<td class="action-segment">'+
                                        '<a href="alita_dokfile.html">'+
                                        '<img src="img/dokumen.png">'+
                                        '</a>'+
                                        '<a href="alita_dokgambar.html">'+
                                        '<img src="img/galeri.png">'+
                                        '</a>'+
                                    '</td>'+
                                '</tr>'
                            );
						}else{
							$('#fetch_ring').append(
								'<td class= "get_ring_id">'+
									'<input id="get_ring_id" type="hidden" value="'+value.ring_id+'">'+
								'</td>'
							);
						}
                        });
                    } if (data.status == 'error'){
                        $('#segment1').empty();
                        $('#segment1').append(
                            '<tr>'+
                                '<td colspan="3">Data segment tidak ditemukan</td>'+
                            '</tr>'
                        );
                    }
                }
            });
        });


		// Add new segment
		$(document).on('click', '#add_new_segment_alita', function(e){
			var ring_id = $('#get_ring_id').val();	
			window.location.href = '/alita_add_segment/' + ring_id;
		});


		$(document).on('click', '.action-segment a[href="alita_dokgambar.html"]', function(e){
		    e.preventDefault();
		    var segment_id = $(this).closest('tr').find('input[type="hidden"]').last().val();
		    window.location.href = '/alita_dokgambar?segment_id=' + segment_id;
		});

		$(document).on('click', '.action-segment a[href="alita_dokfile.html"]', function(e){
		    e.preventDefault();
		    var segment_id = $(this).closest('tr').find('input[type="hidden"]').last().val();
		    window.location.href = '/alita_document?segment_id=' + segment_id;
		});




    </script>
</body>
</html>
</body>
</html>
