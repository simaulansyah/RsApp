<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= "Dashboard " .  $title ?></h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <table class="table table-striped" id="example">
<thead>
    <th>#</th>
    <th>stock_id</th>
    <th>kode_obat</th>
    <th>type</th>
    <th>detail</th>
    <th>suplier id</th>
    <th>qty</th>
    <th>created at</th>
    <th>user update</th>
</thead>
<tbody>
    <?php $i = 1;?>
    <?php foreach($stock as $s) : ?>
      <tr>
        <td> <?= $i?></td> 
        <td><?= $s['stock_id']; ?></td>
        <td><?= $s['kode_obat']; ?></td>
        <td><?= $s['type']; ?></td>
        <td><?= $s['detail']; ?></td>
        <td><?= $s['suplier_id']; ?></td>
        <td><?= $s['qty']; ?></td>
        <td><?= $s['created']; ?></td>
        <td><?= $s['user_id']; ?></td>



       
      </tr>
        <?php $i++;?>
    <?php endforeach;?>
</tbody>
  </table>









</div>
</div>
