<div class="container mt-4">
  <h4>Edit Barang</h4>

  <form method="post"
        action="<?= BASEURL ?>/product/update"
        enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $data['product']['id'] ?>">
    <input type="hidden" name="old_photo" value="<?= $data['product']['photo'] ?>">

    <input class="form-control mb-2" name="name"
           value="<?= $data['product']['name'] ?>" required>

    <input type="number" class="form-control mb-2" name="price"
           value="<?= $data['product']['price'] ?>" required>

    <input type="number" class="form-control mb-2" name="stock"
           value="<?= $data['product']['stock'] ?>" required>

    <textarea class="form-control mb-2"
      name="description"><?= $data['product']['description'] ?></textarea>

    <label class="form-label">Ganti Foto (opsional)</label>
    <input type="file" name="photo" class="form-control mb-2">

    <?php if ($data['product']['photo']): ?>
      <img src="<?= BASEURL ?>/uploads/products/<?= $data['product']['photo'] ?>"
           width="120" class="mb-2">
    <?php endif; ?>

    <button class="btn btn-warning">Update</button>
    <a href="<?= BASEURL ?>/product" class="btn btn-secondary">Kembali</a>
  </form>
</div>
