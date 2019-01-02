<h1 style="text-align:center;"> Data Produk </h1>

<a href="<?php echo base_url ('toko_buku/add/') ?>">Tambah</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Produk Id</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($query as $row): ?>
        <tr>
            <td><?php echo $row->product_id; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->price; ?></td>
            <td><?php echo $row->description; ?></td>
            <td>
                <a href="<?php echo base_url('crud/edit/' .$row->product_id )?>">Edit</a>
                <a href="<?php echo base_url('crud/delete/' .$row->product_id) ?>">Hapus</a>
            </td>
        </tr>
        <br>
        <?php endforeach; ?>
    </tbody>
</table>