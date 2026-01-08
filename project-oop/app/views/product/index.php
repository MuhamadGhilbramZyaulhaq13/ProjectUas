<div class="container mt-4">
<a href="<?= BASEURL ?>/product/create" class="btn btn-success mb-3">
  + Tambah Barang
</a>


<form class="mb-2">
<input class="form-control" name="search" placeholder="Cari">
</form>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>photo</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach ($data['products'] as $p): ?>
    <tr>
      <td>
        <?php if ($p['photo']): ?>
          <img src="<?= BASEURL ?>/uploads/products/<?= $p['photo'] ?>"
              width="60">
        <?php else: ?>
          -
        <?php endif; ?>
      </td>
      <td><?= $p['name'] ?></td>
      <td>Rp <?= number_format($p['price']) ?></td>
      <td><?= $p['stock'] ?></td>
      <td><?= $p['description'] ?></td>
      <td>
        <a href="<?= BASEURL ?>/product/edit/<?= $p['id'] ?>"
           class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= BASEURL ?>/product/delete/<?= $p['id'] ?>"
           class="btn btn-sm btn-danger"
           onclick="return confirmDelete()">Hapus</a>
      </td>

    </tr>
  <?php endforeach ?>
  </tbody>
</table>



<?php for($i=1;$i<=$data['total'];$i++): ?>
<a href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor ?>
</div>
