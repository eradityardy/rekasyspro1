<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="<?php echo base_url() ?>dataproyek"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>dataproyek/editproyek"><?php echo $title3 ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?php echo $title2 ?></strong>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>dataproyek/updateproyek" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="id_pro" value="<?php echo $id_pro ?>">
                            <div class="row form-group">
                                <div class="col col-md-5">
                                    <label for="kode"><h6>Kode Proyek</h6></label>
                                    <input type="text" id="kode" name="kode" placeholder="Kode" class="form-control" value="<?php echo $kode ?>" required>
                                </div>
                                <div class="col col-md-7">
                                    <label for="nama_pro"><h6>Nama Proyek</h6></label>
                                    <input type="text" id="nama_pro" name="nama_pro" placeholder="Nama" class="form-control" value="<?php echo $nama_pro ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label for="lokasi"><h6>Lokasi Proyek</h6></label>
                                    <input type="text" id="lokasi" name="lokasi" placeholder="Lokasi" class="form-control" value="<?php echo $lokasi ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="owner"><h6>Owner</h6></label>
                                    <input type="text" id="owner" name="owner" placeholder="Pemilik" class="form-control" value="<?php echo $owner ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="anggaran"><h6>Anggaran</h6></label>
                                    <input type="number" id="anggaran" name="anggaran" placeholder="Anggaran" class="form-control" value="<?php echo $anggaran ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="tgl_mulai"><h6>Tanggal Mulai</h6></label>
                                    <input type="date" id="tgl_mulai" name="tgl_mulai" placeholder="Mulai" class="form-control" value="<?php echo $tgl_mulai ?>" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="tgl_selesai"><h6>Tanggal Selesai</h6></label>
                                    <input type="date" id="tgl_selesai" name="tgl_selesai" placeholder="Selesai" class="form-control" value="<?php echo $tgl_selesai ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="status"><h6>Status</h6></label>
                                    <select name="status" class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option>Aktif</option>
                                        <option>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="updateproyek" class="btn btn-primary" value="Update">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>dataproyek">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>