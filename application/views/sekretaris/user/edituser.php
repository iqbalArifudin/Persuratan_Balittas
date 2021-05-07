<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Beranda &nbsp; &nbsp; > &nbsp; &nbsp;<i class="fas fa-envelope"></i>
    Edit Pengguna
</div>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Form Edit Data
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                        <?php endif; ?>
                        <?php foreach($users as $user):?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $user->id_user;?>">
                            <!-- <input type="hidden" name="id_jabatan" value="<?= $user->id_jabatan;?>"> -->

                            <div class="form-group">
                                <label for="merk">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?=$user->nama;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?=$user->email;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">No Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="<?=$user->no_telp;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?=$user->username;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    value="<?=$user->password;?>">
                            </div>

                            <div class="form-group">
                                <label for="nim">Hak Akses</label>
                                <?php if($user->jabatan == "Admin"): ?>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Admin" checked>ADMIN
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Agendaris Surat">AGENDARIS SURAT
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Sekretaris">SEKRETARIS
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Konseptor">KONSEPTOR
                                </div>

                                <?php elseif($user->jabatan == "Agendaris Surat"): ?>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Admin">ADMIN
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Agendaris Surat" checked>AGENDARIS SURAT
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Sekretaris">SEKRETARIS
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Konseptor">KONSEPTOR
                                </div>


                                <?php elseif($user->jabatan == "Sekretaris"): ?>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Admin">ADMIN
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Agendaris Surat">AGENDARIS SURAT
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Sekretaris" checked>SEKRETARIS
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Konseptor">KONSEPTOR
                                </div>

                                <?php else: ?>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Admin">ADMIN
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Agendaris Surat">AGENDARIS SURAT
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Sekretaris">SEKRETARIS
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="jabatan" value="Konseptor" checked>KONSEPTOR
                                </div>
                                <?php endif ?>
                            </div>

                            <label for="file_surat">Foto Profil</label>
                            <br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="customFile"><?= $user->foto ?></label>
                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success ">Simpan</button>
                            <a href="<?=base_url("sekretaris/user");?>" class="btn btn-info">Kembali</a>
                        </form>
                        <?php endforeach ?>
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