<?php
							if($this->session->userdata('level') == 'admin'){
								?>
                <div class="row">
                             <div class="col-md-12">
                                 <h1 class="page-header">
                                     Kantin 01 <small>Hmmm mantab</small>
                                 </h1>
                             </div>
                         </div>
                         <?php
                      $notif = $this->session->flashdata('notif');
                      if($notif != NULL){
                        echo '
                          <div class="alert alert-danger">'.$notif.'</div>
                        ';
                      }
                    ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 Daftar Makanan Kantin 01
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                  <div class="panel -body">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah">Tambah Makanan</button>
                                  </div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Kode</th>
                                          <th>Gambar</th>
                                          <th>Nama</th>
                                          <th>Kategori</th>
                                          <th>Deskripsi</th>
                                          <th>Harga</th>
                                          <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                            <?php
                              $no = 1;
                              foreach ($tb_produk as $b) {
                                echo '
                                  <tr>
                                    <td>'.$no.'</td>
                                    <td>'.$b->kode_produk.'</td>
                                    <td><img src="'.base_url().'assets1/img/'.$b->gambar.'" width="70px" height="75px" /></td>
                                    <td>'.$b->nama_produk.'</td>
                                    <td>'.$b->nama_kategori.'</td>
                                    <td>'.$b->deskripsi.'</td>
                                    <td>Rp '.$b->harga.',-</td>
                                    <td>
                                      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah" onclick="prepare_ubah_produk('.$b->id_produk.')">Ubah</a>
                                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus" onclick="prepare_hapus_produk('.$b->id_produk.')">hapus</a>
                                    </td>
                                  </tr>
                                ';
                                $no++;
                              }
                            ?>

                            </tbody>
                                    </table>
                                </div>
                                <!-- <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_buku" onclick="prepare_ubah_buku('.$b->id_buku.')">Ubah</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_buku" onclick="prepare_hapus_buku('.$b->id_buku.')">hapus</a> -->
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <!-- Modal -->
                <div id="modal_tambah" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Makanan</h4>
                      </div>
                      <form action="<?php echo base_url(); ?>index.php/Kantin1/tambah" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="Kode Makanan" name="kode_produk">
                            <br>
                            <input type="text" class="form-control" placeholder="Nama Makanan" name="nama_produk">
                            <br>
                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi">
                            <br>
                            <input type="text" class="form-control" placeholder="Harga" name="harga">
                            <br>
                            <select name="tb_kategori" class="form-control">
                            <?php
                            foreach ($tb_kategori as $k) {
                              echo '
                                <option value="'.$k->id.'">'.$k->nama_kategori.'</option>
                              ';
                            }
                            ?>
                            </select>
                            <br>
                            <input type="file" class="form-control" placeholder="Gambar" name="gambar">

                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>

                <!-- edit -->
                <div id="modal_ubah" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ubah Makanan</h4>
                      </div>
                      <form action="<?php echo base_url(); ?>index.php/Kantin1/ubah" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id_produk_edit"  id="id_produk_edit">
                            <br>
                            <input type="text" class="form-control" placeholder="Kode Makanan" name="kode_produk_edit" id="kode_produk_edit">
                            <br>
                            <input type="text" class="form-control" placeholder="Nama Makanan" name="nama_produk_edit" id="nama_produk_edit">
                            <br>
                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi_edit" id="deskripsi_edit">
                            <br>
                            <input type="text" class="form-control" placeholder="Harga" name="harga_edit" id="harga_edit">
                            <br>
                            <select name="tb_kategori_edit" id="tb_kategori_edit" class="form-control">
                              <?php
                              foreach ($tb_kategori as $k) {
                                echo '
                                  <option value="'.$k->id.'">'.$k->nama_kategori.'</option>
                                ';
                              }
                              ?>
                            </select>
                            <br>
                            <div id="data_gambar"></div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- hapus -->
                <div id="modal_hapus" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Konfirmasi Hapus Makanan</h4>
                      </div>
                      <form action="<?php echo base_url('index.php/Kantin1/hapus'); ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="hapus_id_produk"  id="hapus_id_produk">
                            <p>Apakah anda yakin menghapus makanan <b><span id="hapus_nama"></span></b> ?</p>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-danger" name="submit" value="YA">
                          <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>


                <script type="text/javascript">

                function prepare_ubah_produk(id)
                  {
                    $("#id_produk_edit").empty();
                    $("#kode_produk_edit").empty();
                    $("#nama_produk_edit").empty();
                    $("#deskripsi_edit").empty();
                    $("#harga_edit").empty();
                    $("#tb_kategori_edit").val();
                    $("#data_gambar").empty();

                    $.getJSON('<?php echo base_url(); ?>index.php/Kantin1/get_data_produk_by_id/' + id,  function(data){
                      $("#id_produk_edit").val(data.id_produk);
                      $("#kode_produk_edit").val(data.kode_produk);
                      $("#nama_produk_edit").val(data.nama_produk);
                      $("#deskripsi_edit").val(data.deskripsi);
                      $("#harga_edit").val(data.harga);
                      $("#tb_kategori_edit").val(data.kategori);
                      $("#data_gambar").html('<img src="<?php echo base_url(); ?>assets1/img/' + data.gambar + '" width="70px" height="75px" >');
                    });
                  }


                function prepare_hapus_produk(id)
                  {
                    $("#hapus_id_produk").empty();
                    $("#hapus_nama_produk").empty();

                    $.getJSON('<?php echo base_url(); ?>index.php/Kantin1/get_data_produk_by_id/' + id,  function(data){
                      $("#hapus_id_produk").val(data.id_produk);
                      $("#hapus_nama_produk").text(data.nama_produk);
                    });
                  }

                </script>
								<?php
							} else {
								?>

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
                                <a href="#"><img style="height: 150px; width: 205px;" class="img-thumbnail" src="<?php echo base_url() . 'assets1/img/'.$row['gambar']; ?>"/></a>
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

								<?php
							}
						?>
