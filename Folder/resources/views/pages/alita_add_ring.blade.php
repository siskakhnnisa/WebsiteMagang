<!-- <!DOCTYPE html>
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
    <form method="post" action="" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
        <div class="alert-title"><h4>Whoops!</h4></div>
            There are some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
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
        <label for="project-name">Nama Ring:</label>
        <form method="post" enctype="multipart/form-data">
        <input type="text" id="ring-name" name="nama_ring" placeholder="Masukkan nama ring...">
        </form>
    </div>

    <div class="form-group">
        <button id="add_new_ring" type="submit">Tambah</button>
    </div>
</div>
</body>
<script scr="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
       $('#add_new_ring').click(function(){
           var nama_ring = $('#ring-name').val();
           var no_spk = window.location.href.split('/').pop();
           $.ajax({
               url: '/post_new_ring_alita',
               method: 'post',
               data: {
                    no_spk: no_spk,
                    nama_ring: nama_ring,
                    _token: '{{ csrf_token() }}',
               },
               success: function(response){
                   if(response.status == 'success'){
                        alert(response.message);
                        window.location.href = '/alita_home';
                   }else{
                       alert('Data gagal ditambahkan');
                   }
               }
           });
       });
   });
</script>
</html>
 -->
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
    <form id="add-ring-form" method="post" action="/post_new_ring_alita" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
        <div class="alert-title"><h4>Whoops!</h4></div>
            There are some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
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
        <label for="project-name">Nama Ring:</label>
        <input type="text" id="ring-name" name="nama_ring" placeholder="Masukkan nama ring...">
        <input type="hidden" name="no_spk" value="{{ $no_spk }}">
    </div>

    <div class="form-group">
        <button id="add_new_ring" type="submit">Tambah</button>
    </div>
    </form>
</div>
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
       $('#add-ring-form').on('submit', function(e){
           e.preventDefault();
           var nama_ring = $('#ring-name').val();
           var no_spk = $('input[name="no_spk"]').val();
           $.ajax({
               url: '/post_new_ring_alita',
               method: 'post',
               data: {
                    no_spk: no_spk,
                    nama_ring: nama_ring,
                    _token: '{{ csrf_token() }}',
               },
               success: function(response){
                   if(response.status == 'success'){
                        alert(response.message);
                        window.location.href = '/alita_home';
                   }else{
                       alert('Data gagal ditambahkan');
                   }
               }
           });
       });
   });
</script>
</html>
