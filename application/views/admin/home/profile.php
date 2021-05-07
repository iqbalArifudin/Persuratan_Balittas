 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Main content -->
     <div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col">
                     <div class="card">
                         <div class="card-header">
                             PROFIL
                         </div>
                         <!-- Tabel -->
                         <!-- /.card-header -->
                         <?php
                        foreach ($user as $pmj) : ?>
                         <div class="card-body">
                             <p>
                             <table class="table">
                                 <tr>
                                     <th>Nama </th>
                                     <td><?= $pmj->nama ?></td>
                                 </tr>
                                 <tr>
                                     <th>Email </th>
                                     <td><?= $pmj->email ?></td>
                                 </tr>
                                 <tr>
                                 <tr>
                                     <th>N0. Telp </th>
                                     <td><?= $pmj->no_telp ?></td>
                                 </tr>
                                 <tr>
                                     <th>NIP </th>
                                     <td><?= $pmj->username ?></td>
                                 </tr>
                                 <tr>
                                     <th>Password </th>
                                     <td><?= $pmj->password ?></td>
                                 </tr>
                                 <tr>
                                     <th>Hak Akses</th>
                                     <td><?= $pmj->jabatan?></td>
                                 </tr>
                                 <tr>
                                     <th>Foto Profil</th>
                                     <td><img src="<?= base_url('assets/fotoprofil/') . $pmj->foto ?>" width="20%"
                                             class="img-thumbnail"></td>
                                 </tr>
                             </table>
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