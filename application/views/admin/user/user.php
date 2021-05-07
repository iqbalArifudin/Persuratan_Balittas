<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Beranda &nbsp; &nbsp; > &nbsp; &nbsp;<i class="fas fa-user"></i>
    Pengguna
</div>
<div class='card-header'>
    <a class='btn btn-success' href="user/tambahuser">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <span>
            Tambah
        </span>
    </a>
</div>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <table id="tabel" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No telp</th>
                                <th>NIP</th>
                                <th>Password</th>
                                <th>Hak Akses</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($users as $usr): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $usr->nama ?></td>
                                <td><?= $usr->email ?></td>
                                <td><?= $usr->no_telp ?></td>
                                <td><?= $usr->username ?></td>
                                <td><?= $usr->password ?></td>
                                <td><?= $usr->jabatan ?></td>
                                <td><img src="<?= base_url('assets/fotoprofil/') . $usr->foto ?>"
                                        style="width:50px; height:50px;"></td>
                                <td>
                                    <a class='btn btn-danger'
                                        onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini?')"
                                        href="<?= base_url().'Admin/user/hapus/'.$usr->id_user ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a class='btn btn-warning'
                                        href="<?= base_url().'admin/user/edituser/'.$usr->id_user ?>">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a class='btn btn-info' href='<?= base_url().'admin/user/detail/'.$usr->id_user?>'
                                        class='btn btn-biru'>
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>