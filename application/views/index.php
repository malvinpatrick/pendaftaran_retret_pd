<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--JQUERY-->
<script src="<?php echo base_url('asset/js/jquery.js')  ?>"></script>
<!--POPPER-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!--BOOTSTRAP JAVA SCRIPT-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    body {
        background: url('<?php echo base_url('asset/img/background1.jpg')?>') fixed;
        background-size: cover;
		background-position : center
    }
    label{
        text-align: right;
    }
</style>
<script>
    $(document).ready(function(){
        $('#tambah-baru').submit(function(){
            $("#modalLoading").modal('show');
        });
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto" style="background-color: rgba(0,0,0, 0.8); color: whitesmoke;">
            <h1 class="display-3 text-center">Registrasi</h1>
            <br>
            <form class="form-horizontal" role="form" method="post" href="#" id="tambah-baru">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">NRP*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nrp" name="nrp" placeholder="9-digit NRP" required minlength="6" maxlength="9" pattern="[0-9]+">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Nama*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" maxlength="100" pattern="[A-Za-z\s]+" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Email*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Jurusan*</label>
                    <div class="col-sm-10">
                        <select name="jurusan" class="form-control" style="height: auto">
                            <option value="1">D3 - INFORMATIKA</option>
                            <option value="2">S1 - INFORMATIKA</option>
                            <option value="3">S1 - INDUSTRI</option>
                            <option value="4">S1 - DKV</option>
                            <option value="5">S1 - ELEKTRO</option>
                            <option value="6">S1 - DESAIN PRODUK</option>
                            <option value="7">S1 - SIB</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">No.HP*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Nomor HP" minlength="12" maxlength="15" required pattern="[0-9]+">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">ID Line*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="line" name="line" placeholder="ID Line" minlength="8" maxlength="30" pattern="[A-Za-z0-9]+" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Jenis Kelamin*</label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="jk-pria" name="JK" class="custom-control-input" value="L" checked>
                            <label class="custom-control-label" for="jk-pria">Pria</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="jk-wanita" name="JK" value="P" class="custom-control-input">
                            <label class="custom-control-label" for="jk-wanita">Wanita</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left">Alergi/Keb. khusus</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="alergi" id="alergi" maxlength="100" pattern="[A-Za-z0-9\s]+"></textarea>
                    </div>
                </div>
                <p><em>NB : Jika tidak ada alergi/kebutuhan khusus, kosongkan saja</em></p>
                <input type="submit" class="btn btn-primary btn-block" value="Submit" name="submit" >
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLoading" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="margin:0;">Mohon tunggu...</h3>
            </div>
            <div class="modal-body">
                <h4 class="lead">Pendaftaran dan pengiriman email sedang di proses</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>