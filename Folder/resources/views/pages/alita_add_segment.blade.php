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
        <label for="project-name">Nama Segment:</label>
        <form method="post" enctype="multipart/form-data">
        <input type="text" id="segment-name" name="nama_segment" placeholder="Masukkan nama segment...">
        </form>
    </div>

    <div class="form-group">
        <button id="add_new_segment" type="submit">Tambah</button>
    </div>
</div>
</body>
<script scr="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
       $('#add_new_segment').click(function(){
           var nama_segment = $('#segment-name').val();
           var ring_id = window.location.href.split('/').pop();
           $.ajax({
               url: '/post_new_segment_alita',
               method: 'post',
               data: {
                    ring_id: ring_id,
                    nama_segment: nama_segment,
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

<!-- ihfiefj[poooooooooo] -->