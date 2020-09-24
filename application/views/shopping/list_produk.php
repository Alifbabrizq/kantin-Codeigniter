
<div class="row">
                             <div class="col-md-12">
                                 <h1 class="page-header">
                                     Daftar <small>Makanan</small>
                                 </h1>
                             </div>
                         </div>

<div class="row">
  <div class="col-md-12">

<?php
    foreach ($produk as $row) {
?>
            <div class="col-sm-3 col-md-3">
              <div class="kotak">
              <form method="post" action="<?php echo base_url();?>index.php/Shopping/tambah" method="post" accept-charset="utf-8">
                <a href="#"><img style="height: 150px; width: 205px;" class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/></a>
                <div class="card-body">
                  <h3 class="card-title">
                   <strong><a href="#"><?php echo $row['nama_produk'];?></a></strong>
                 </h3>
                  <h5>Rp. <?php echo number_format($row['harga'],0,",",".");?>,-</h5>
                  <p class="card-text"><?php echo $row['deskripsi'];?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url();?>index.php/Shopping/detail_produk/<?php echo $row['id_produk'];?>" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search"></i> Detail</a>

                  <input type="hidden" name="id" value="<?php echo $row['id_produk']; ?>" />
                  <input type="hidden" name="nama" value="<?php echo $row['nama_produk']; ?>" />
                  <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>" />
                  <input type="hidden" name="gambar" value="<?php echo $row['gambar']; ?>" />
                  <input type="hidden" name="qty" value="1" />
                  <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                </div>
                </form>
              </div>
            </div>
<?php
    }
?>
  </div>
</div>
