<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-header">Data Riwayat Transaksi</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Pembeli</th>
									<th>Kelas</th>
                  <th>Email</th>
                  <th>No Telephone</th>
									<th>Tgl.Beli</th>
									<th>Total Belanja</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($riwayat as $r) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$r->nama.'</td>
											<td>'.$r->kelas.'</td>
                      <td>'.$r->email.'</td>
                      <td>'.$r->telp.'</td>
											<td>'.$r->tanggal.'</td>
											<td>'.$r->total.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_detil_transaksi" onclick="prepare_detil_transaksi('.$r->id.')">Lihat Detil</a>

											</td>
										</tr>
									';
									$no++;
								}
							?>
							</tbody>
						</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<div id="modal_detil_transaksi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detil Transaksi</h4>
      </div>
      <form action="<?php echo base_url(); ?>index.php/kantin1/ubah" method="post" enctype="multipart/form-data">
	      <div class="modal-body">

	      </div>
	      <div class="modal-footer">
	        <a href="#" class="btn btn-warning" id="cetak_nota" target="_blank">CETAK NOTA</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">

	function prepare_detil_transaksi(id)
	{
		$(".modal-body").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/Shopping/get_detil_transaksi_by_id/' + id,  function(data){
			$(".modal-body").html(data.show_detil);
		});

		$('#cetak_nota').attr('href','<?php echo base_url();?>index.php/Shopping/cetak_nota/' + id);
	}
</script>
