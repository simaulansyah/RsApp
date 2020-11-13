
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

<form action="<?= base_url('apotek/editObatjuga/' . $this->uri->segment(3) )?>" method="POST">
<div class="form-row">

<input type="hidden" class="form-control" id="id" name="id" value="<?= $obatQuery->id ;?>">

  <div class="form-group col-md-1">
    <label for="formGroupExampleInput">Kode_Obat</label>
    <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="<?= $obatQuery->kode_obat ;?>">
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput2">Nama Obat</label>
    <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $obatQuery->nama_obat; ?>" >
  </div>
  <div class="form-group col-md-2 ">
    <label for="formGroupExampleInput2">Jenis Obat</label>
    <select name="jenis" id="jenis" class="form-control">
                                    <?php foreach ($jenis as $z) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($z['jenis'] == $obatQuery->jenis_obat ){ echo 'selected="selected"'; } ?> value="<?= $z['jenis']; ?>"> <?= $z['jenis']; ?> </option> 

                                    <?php endforeach; ?>
                                </select>
  </div>
 </div>

  <div class="form-row">

<div class="form-group col-md-1">
  <label for="formGroupExampleInput">Stok</label>
  <input type="text" class="form-control" id="stok" name="stok" value="<?= $obatQuery->stok ;?>" disabled >
</div>
<div class="form-group col-md-2 ">
  <label for="formGroupExampleInput2">Qty</label>
  <select name="qty" id="qty" class="form-control">
                                    <?php foreach ($qty as $q) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($q['qty'] == $obatQuery->qty ){ echo 'selected="selected"'; } ?> value="<?= $q['qty']; ?>"> <?= $q['qty']; ?> </option> 

                                    <?php endforeach; ?>
                                </select>
  </div>
<div class="form-group col-md-2 ">
  <label for="formGroupExampleInput2">Konsumen</label>
  <select name="konsumen" id="konsumen" class="form-control">
                                    <?php foreach ($konsumen as $k) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($k['konsumen'] == $obatQuery->konsumen ){ echo 'selected="selected"'; } ?> value="<?= $k['konsumen']; ?>"> <?= $k['konsumen']; ?> </option> 

                                    <?php endforeach; ?>
                                </select>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-2">
  <label for="formGroupExampleInput">Harga Obat</label>
  <input type="text" class="form-control" id="harga_obat" name="harga_obat" value="<?= $obatQuery->harga_obat; ?>" >
</div>
<div class="form-group col-md-2">
  <label for="formGroupExampleInput">Poto Obat</label>
  <input type="text" class="form-control" id="poto_obat" name="poto_obat" value="<?= $obatQuery->poto_obat; ?>" >
</div>
<div class="form-group col-md-2">
  <label for="formGroupExampleInput">Keterangan</label>
  <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $obatQuery->keterangan; ?>" >
</div>
</div>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="" class="card-img" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Keterangan</h5>
        <p class="card-text"><?= $obatQuery->keterangan; ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

<div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Changes</button>
                        </div>
</form>






</div>
</div>