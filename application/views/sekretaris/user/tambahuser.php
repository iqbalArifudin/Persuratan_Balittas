<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Beranda &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="fas fa-envelope"></i> Tambah Pengguna
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
              <div class ="card">
                    <div class="card-header">
                        Form Tambah Data Pengguna
                    </div>
                    <div class ="card-body">
                    <?php if (validation_errors()): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nim">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="nim">Email</label>
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>

                        <div class="form-group">
                            <label for="nim">No. Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" >
                        </div>

                        <div class="form-group">
                            <label for="nim">NIP</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="nim">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        
                        <div class="form-group">
                            <label for="nim">Hak Akses</label>
                            <div class="form-check">
                                <input type="radio" name="jabatan" value="Admin">  ADMIN
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jabatan" value="Agendaris Surat"> AGENDARIS SURAT
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jabatan" value="Sekretaris">  SEKRETARIS
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jabatan" value="Konseptor"> KONSEPTOR
                            </div>
                        </div>

                        <label for="">Foto Profil</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" required autofocus>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <!-- <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>
                        <br>
                        <br>

                       <button type="submit" name="submit" class="btn btn-success ">Simpan</button>
                        <a href="<?=base_url("sekretaris/user");?>" class="btn btn-info">Keluar</a>
                        </form>
                        </div>
                  </div>
         
            </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->