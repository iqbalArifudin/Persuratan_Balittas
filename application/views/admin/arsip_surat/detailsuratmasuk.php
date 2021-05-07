<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Beranda &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="fas fa-fw fa-cog"></i> Arsip Surat &nbsp; &nbsp; > &nbsp;  &nbsp;<i class="fas fa-envelope"></i> Surat Masuk
</div>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
              <div class ="card">
                    <div class ="card-body">
              <!-- Tabel -->
              <!-- /.card-header -->
              <?php
              foreach ($surat as $pmj) : ?>
                <div class="card-body">
                    <p>                
                    <table class="table">
                      <tr>
                        <th>Nama </th>
                        <td><?= $pmj->nama ?></td>
                      </tr>
                      <tr>
                        <th>Jabatan </th>
                        <td><?= $pmj->jabatan ?></td>
                      </tr>
                      <tr>
                        <th>Perihal </th>
                        <td><?= $pmj->Perihal ?></td>
                      </tr>
                      <tr>
                        <th>Tanggal Masuk </th>
                        <td><?= $pmj->tgl_masuk ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Surat </th>
                        <td><?= $pmj->jenis_surat ?></td>
                      </tr>
                      <tr>
                        <th>File Surat</th>
                        <td><?= $pmj->file_surat?></td>
                      </tr>
                    </table>
                    <br>
                      <a class='btn btn-warning' href="<?= base_url().'admin/surat/suratMasuk/'?>">
                          <i class="fas fa-backward" aria-hidden="true"></i> 
                          <span>
                              Back
                          </span>
                      </a>
                      <a class='btn btn-success' href="<?php echo base_url().'admin/surat/download/'.$pmj->id_surat; ?>">
                          <i class="fas fa-download" aria-hidden="true"></i>
                          <span>
                              Download Surat
                          </span>
                      </a>
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
  </div>
  <!-- /.content-wrapper -->
  </div>