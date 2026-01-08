<div class="container mt-4">
  <h4>Tambah Barang</h4>

  <form method="post"
        action="<?= BASEURL ?>/product/store"
        enctype="multipart/form-data">

    <input class="form-control mb-2" name="name" placeholder="Nama Barang" required>
    <input type="number" class="form-control mb-2" name="price" placeholder="Harga" required>
    <input type="number" class="form-control mb-2" name="stock" placeholder="Stok" required>

    <textarea class="form-control mb-2"
      name="description" placeholder="Deskripsi"></textarea>

    <label class="form-label">Foto Barang</label>
    <input type="file" name="photo" class="form-control mb-3" accept="image/*">

    <button class="btn btn-primary">Simpan</button>
    <a href="<?= BASEURL ?>/product" class="btn btn-secondary">Kembali</a>
  </form>
</div>
