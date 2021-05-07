<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="alert alert-secondary" role="alert">
    <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="fas fa-envelope"></i>
    Tambah Surat
</div>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- Content Wrapper. Contains page content -->
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dari</th>
                                <th>Perihal</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Diterima</th>
                                <th>Status</th>
                                <th>keterangan</th>
                                <th>Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($surat as $srt): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $srt->dari ?></td>
                                <td><?= $srt->Perihal ?></td>
                                <td><?= $srt->tgl_masuk ?></td>
                                <td><?= $srt->tgl_diterima == '0000-00-00' ? 'Belum di terima': date('d F Y', strtotime($srt->tgl_diterima)) ?>
                                </td>
                                <td><?= $srt->status ?></td>
                                <td><?= $srt->keterangan ?></td>
                                <td><?= $srt->surat_jadi ?></td>

                                <td>
                                    <a class='btn btn-success'
                                        onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini?')"
                                        href="<?= base_url().'agendaris/surat/hapus/'.$srt->id_surat ?>">
                                        <i class="fa fa-trash" aria-hidden="true"><span> Hapus</span></i>
                                    </a>
                                    <a class='btn btn-primary'
                                        href="<?= base_url().'agendaris/surat/editsurat/'.$srt->id_surat ?>">
                                        <i class="fas fa-hourglass-half" aria-hidden="true"><span> Proses</span></i>
                                    </a>
                                    <a class='btn btn-warning'
                                        href="<?php echo base_url().'agendaris/surat/download/'.$srt->id_surat; ?>">
                                        <i class="fas fa-download" aria-hidden="true"><span> Unduh</span></i>
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