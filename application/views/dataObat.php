    <!-- Sidebar -->

    <!-- Sidebar -->

    <!-- TopBar -->

    <!-- Topbar -->

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= "Dashboard " .  $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>


           <!-- jika error menambahkan menu -->
           <?= form_error('kode_obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
           <?= form_error('nama_obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
           <?= form_error('jenis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
           <?= form_error('konsumen', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
           <?= form_error('qty', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
         
                <!-- jika succes menambahkan data menggunakan flashdata -->
                <?= $this->session->flashdata('message'); ?>


        <div>
        <a href="" data-toggle="modal" data-target="#tbhObtModal" class="badge badge-warning"> Tambah Data Obat </a>
        </div>

        <table class="table table-striped" id="example">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Nama Obat</th>
      <th scope="col">Jenis Obat</th>
      <th scope="col">Konsumen</th>
      <th scope="col">Stok</th>
      <th scope="col">Qty</th>
      <th scope="col">opsi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1?>
  <?php foreach ($obat as $ob) : ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $ob['kode_obat']; ?></td>
      <td><?= $ob['nama_obat']; ?></td>
      <td><?= $ob['jenis_obat']; ?></td>
      <td><?= $ob['konsumen']; ?></td>
      <td><?= $ob['stok']; ?></td>
      <td><?= $ob['qty']; ?></td>
      <td>
      <a href="edit" class="badge badge-primary">edit</a>
      <a href="detail" class="badge badge-success">detail</a>
      <a href="<?php echo site_url("Apotek/hapusObat/" . $ob['id']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
  </tbody>
</table>
          











<!-- modal tbh data obat -->

<div class="modal fade" id="tbhObtModal" tabindex="-1" aria-labelledby="tbhObtModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhObtModalLabel">Tambah Data Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('apotek/tambahdataobat'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kode_obat" name="kode_obat" placeholder="input kode obat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="input nama obat">
                            </div>
                            <div class="form-group">
                            <select name="jenis" id="jenis" class="form-control">
                                    <option value=""> Jenis - Obat </option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option> <?= $j['jenis']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="konsumen" id="konsumen" class="form-control">
                                <option value="" >Pilih Konsumen</option>
                                <?php foreach($konsumen as $k): ?>
                                <option><?= $k['konsumen']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                            <select name="qty" id="qty" class="form-control">
                                <option value="">Pilih Quantity</option>
                                <?php foreach($qty as $q): ?>
                                <option><?= $q['qty']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="foto" name="foto" placeholder="foto obat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lain-lain" name="lain-lain" placeholder="lain lain">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>







            
       

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>









    </div>
    <!---Container Fluid-->
    </div>
    <!-- Footer -->
 