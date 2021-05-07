<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="fas fa-fw fa-cog"></i> Kelola Surat &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="fas fa-envelope"></i> Tambah Surat
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
                        Form Tambah Surat
                    </div>
                    <div class ="card-body">
                    <?php if (validation_errors()): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <?php foreach($user as $j):?>
                    <div class="form-group">
                        <label for="text">Nama</label>
                            <input type="text" class="form-control" id="id_user" name="nama" readonly
                                value="<?= $j->nama; ?>">
                    <?php endforeach ?> 


                        <div class="form-group">
                            <label for="nim">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nim">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                        </div>

                        <div class="form-group">
                            <label for="nim">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
                        </div>

                        <div class="form-group">
                            <label for="nim">File Surat</label>
                            <input type="file" class="form-control" id="file_surat" name="file_surat">
                        </div>

                       <button type="submit" name="submit" class="btn btn-success ">Submit</button>
                        <a href="<?=base_url("sekretaris/surat");?>" class="btn btn-info">Cancel</a>
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