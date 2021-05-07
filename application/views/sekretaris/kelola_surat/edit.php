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
                        <form action="" method="post">
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
                                <label for="merk">Tanggal Diterima</label>
                                <input type="date" class="form-control" id="tgl_diterima" name="tgl_diterima"
                                    value="<?=$surat->tgl_diterima;?>">
                            </div>

                            <div class="form-group">
                                <label for="nim">Status Surat</label>
                                <?php if($surat->status == "Konsep Surat diperiksa Kabalai"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Konsep Surat diperiksa Kabalai"
                                        checked>Konsep Surat diperiksa Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="Konsep Surat disesuaikan Tata Naskah Dinas"> Konsep Surat disesuaikan
                                    Tata Naskah Dinas
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="Pengajuan paraf Kasubag TU dan Ttd Kabalai"> Pengajuan paraf Kasubag TU
                                    dan Ttd Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Selesai"> Selesai
                                </div>

                                <?php elseif($surat->status == "Konsep Surat disesuaikan Tata Naskah Dinas"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Konsep Surat diperiksa Kabalai">
                                    Konsep Surat diperiksa Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Konsep Surat disesuaikan Tata Naskah Dinas"
                                        checked> Konsep Surat disesuaikan Tata Naskah Dinas
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Pengajuan paraf Kasubag TU
                                    dan Ttd Kabalai"> Pengajuan paraf Kasubag TU
                                    dan Ttd Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Selesai"> Selesai
                                </div>


                                <?php elseif($surat->status == "Pengajuan paraf Kasubag TU dan Ttd Kabalai"): ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Konsep Surat diperiksa Kabalai">Konsep
                                    Surat diperiksa Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="Konsep Surat disesuaikan Tata Naskah Dinas"> Konsep Surat disesuaikan
                                    Tata Naskah Dinas
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Pengajuan paraf Kasubag TU dan Ttd Kabalai"
                                        checked> Pengajuan paraf Kasubag TU dan Ttd Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Selesai"> Selesai
                                </div>

                                <?php else: ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Konsep Surat diperiksa Kabalai"> Konsep
                                    Surat diperiksa Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="Konsep Surat disesuaikan Tata Naskah Dinas"> Konsep Surat disesuaikan
                                    Tata Naskah Dinas
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status"
                                        value="Pengajuan paraf Kasubag TU dan Ttd Kabalai"> Pengajuan paraf Kasubag TU
                                    dan Ttd Kabalai
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="Selesai" checked> Selesai
                                </div>
                                <?php endif ?>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success ">Simpan</button>
                            <a href="<?=base_url("sekretaris/surat");?>" class="btn btn-info">Keluar</a>
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