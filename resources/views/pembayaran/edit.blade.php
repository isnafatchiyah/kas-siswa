<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Edit Kassiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-md btn-success mb-3">KEMBALI</a>

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <select class="from-select col-md-12" name="siswa_id" id="siswa_id">
                                    <option class="col-md-12" value="">Select Siswa</option>
                                    @foreach ($item as $siswa)
                                    <option class="col-md-12" value="{{ $siswa->id }}" {{ $pembayaran->siswa_id == $siswa->id ? 'selected' : ''}} > {{ $siswa->nama }} {{ $siswa->kelas }}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Bayar</label>
                                <input type="date" class="form-control " name="tgl_bayar" placeholder= "" value="{{ $pembayaran->tgl_bayar}}">

                                @error('tgl_bayar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Bayar</label>
                                <input type="string" class="form-control " name="jumlah_bayar" placeholder="" value="{{ $pembayaran->jumlah_bayar}}">

                                @error('jumlah_bayar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
