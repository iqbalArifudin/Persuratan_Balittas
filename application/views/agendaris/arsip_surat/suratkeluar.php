<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="far fa-envelope-open"></i> Surat Keluar
</div>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <?php
            foreach ($surat as $pmj) : ?>
              <div class="card">
                    <div class="card-header">
                        <td><b>Tanggal : </b> <?= $pmj->tgl_masuk ?></td>
                    </div>
                    <div class="card-body">
                        <td><b>Perihal : </b><?= $pmj->Perihal ?></td>
                        <p>
                        <hr>
                        <a href="<?= base_url().'agendaris/surat/detailSuratKeluar/'.$pmj->id_surat ?>" class="btn btn-success">Read</a>
                    </div>
                </div>
                
                <?php endforeach ?>
           
                <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
