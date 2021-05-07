<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Beranda &nbsp; &nbsp; > &nbsp; &nbsp;<i class="fas fa-envelope"></i>
    Edit Surat
</div>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Form Surat
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                        <?php endif; ?>

                        <?php foreach($surat as $surat):?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_surat" value="<?= $surat->id_surat;?>">

                            <div class="form-group">
                                <label for="merk">Dari</label>
                                <input type="text" class="form-control" id="dari" name="dari"
                                    value="<?=$surat->dari;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">Perihal</label>
                                <input type="text" class="form-control" id="perihal" name="perihal"
                                    value="<?=$surat->Perihal;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">Tanggal Surat</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                    value="<?=$surat->tgl_masuk;?>">
                            </div>

                            <div class="form-group">
                                <label for="merk">keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?=$surat->keterangan;?>">
                            </div>

                            <div class="form-group">
                                <label for="nim">Status Surat</label>
                                <?php if($surat->status == "Penomoran dan Stempel balai"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Penomoran dan Stempel balai"
                                        checked>Penomoran dan Stempel balai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat melalui Email/whatsapp">pengiriman surat melalui
                                    Email/whatsapp
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat via Pos/JNE/TIKI dll">pengiriman surat via Pos/JNE/TIKI
                                    dll
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="pengiriman surat melalui Faksimili">
                                    pengiriman surat melalui Faksimili
                                </div>

                                <?php elseif($surat->status == "pengiriman surat melalui Email/whatsapp"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Penomoran dan Stempel balai">Penomoran dan
                                    Stempel balai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="pengiriman surat melalui Email/whatsapp"
                                        checked>pengiriman surat melalui Email/whatsapp
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat via Pos/JNE/TIKI dll">pengiriman surat via Pos/JNE/TIKI
                                    dll
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat melalui Faksimili">pengiriman surat melalui Faksimili
                                </div>


                                <?php elseif($surat->status == "pengiriman surat via Pos/JNE/TIKI dll"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Penomoran dan Stempel balai">Penomoran dan
                                    Stempel balai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat melalui Email/whatsapp">pengiriman surat melalui
                                    Email/whatsapp
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="pengiriman surat via Pos/JNE/TIKI dll"
                                        checked>pengiriman surat via Pos/JNE/TIKI dll
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat melalui Faksimili">pengiriman surat melalui Faksimili
                                </div>

                                <?php else: ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Penomoran dan Stempel balai">Penomoran dan
                                    Stempel balai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat melalui Email/whatsapp">pengiriman surat melalui
                                    Email/whatsapp
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="pengiriman surat via Pos/JNE/TIKI dll">pengiriman surat via Pos/JNE/TIKI
                                    dll
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="pengiriman surat melalui Faksimili"
                                        checked>pengiriman surat melalui Faksimili
                                </div>
                                <?php endif ?>
                            </div>

                            <label for="file_surat">File Surat</label>
                            <br>
                            <!-- <?= $surat->file_surat ?> -->
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="surat_jadi" name="surat_jadi">
                                <label class="custom-file-label" for="customFile"><?= $surat->surat_jadi ?></label>
                                <?= form_error('surat_jadi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <br>
                            <br>
                            <?php endforeach ?>
                            <button type="submit" name="submit" class="btn btn-success ">Simpan</button>
                            <a href="<?=base_url("agendaris/surat");?>" class="btn btn-info">Kembali</a>
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