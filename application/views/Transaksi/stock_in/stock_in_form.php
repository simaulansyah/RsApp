<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= "Dashboard " .  $title ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <?= form_error('kode_obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= form_error('nama_obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


  <?= $this->session->flashdata('message'); ?>

  <form action="<?= base_url('stock/stockProses/')?>" method="POST">
    <div class="form-row">

      <!-- <input type="hidden" class="form-control" id="id" name="id" value="">
     -->
     

      <div class="form-group col-md-1">
        <label for="formGroupExampleInput">Date</label>
        <input type="text" class="form-control" id="date" name="date" value="<?= Date('d/m/Y') ?>" readonly>
      </div>
      <div class="form-group col-md-2 ">
        <label for="formGroupExampleInput2">Kode_obat</label>

        <div class="form-group input-group">
          <input type="text" name="kode_obat" id="kode_obat" class="form-control" readonly>
          <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-search "></i>
            </button>
          </span>
        </div>
      </div>

     
    </div>

    <div class="form-row">
    <div class="form-group col-md-2 ">
        <label for="formGroupExampleInput2">Nama Obat</label>

        <input type="text" class="form-control" id="nama_obat" name="nama_obat" readonly>
      </div>


      <div class="form-group col-md-2 ">
        <label for="formGroupExampleInput2">Jenis Obat</label>
        <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" value="" readonly>
      </div>
      <div class="form-group col-md-2 ">
        <label for="formGroupExampleInput2">Suplier</label>
       
        <select  name="suplier" id="suplier" class="form-control" >
        <option selected="selected" value="">Select One...</option>
        <?php foreach($suplier as $s) :?>
        <option value="<?= $s['suplier_id']; ?>"> <?=$s['nama_suplier'] ?></option>
        <?php endforeach; ?>
      </select>
    
      </div>
      <div class="form-group col-md-1">
        <label for="formGroupExampleInput">Stok Masuk </label>
        <input type="text" class="form-control" id="stok" name="stok" value="" >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="formGroupExampleInput">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="">
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" name="in_add" class="btn btn-primary">
      <i class="fa fa-paper-plane"></i>  
      Save</button>
    </div>
  </form>




  <!-- modal latihan -->



  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
              <?php $i = 1 ?>
              <?php foreach ($obat as $ob) : ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $ob['kode_obat']; ?></td>
                  <td><?= $ob['nama_obat']; ?></td>
                  <td><?= $ob['jenis_obat']; ?></td>
                  <td><?= $ob['konsumen']; ?></td>
                  <td><?= $ob['stok']; ?></td>
                  <td><?= $ob['qty']; ?></td>
                  <td>
                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $ob['id'] ?>" data-kode_obat="<?= $ob['kode_obat'] ?>" data-nama_obat="<?= $ob['nama_obat'] ?>" data-jenis_obat="<?= $ob['jenis_obat'] ?>">
                      <i class="fa fa-check"></i>Select
                    </button>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>









  <!-- modal item -->






  <!-- akhir modal item  -->





  <!---Container Fluid-->
</div>
<!-- Footer -->
</div>