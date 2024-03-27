  <!-- Main content -->
  <div class="main-content">
  	<!-- Top navbar -->
  	<!-- Header -->
  	<div class="header bg-gradient-primary pb-8 pt-5 pt-md-0">
  		<div class="container-fluid">
  			<div class="header-body">
  			</div>
  		</div>
  	</div>
  	<!-- Page content -->
  	<div class="container-fluid mt--7">
  		<div class="row">
  		</div>
  		<div class="row mt-5">
  			<div class="col">
  				<div class="card shadow">
  					<div class="container-fluid">
  						<div class="row">
  							<!-- TAB KIRI -->
  							<div class="col-md-2">

  								<div class="card mt-3">

  									<div class="card-body pt-2">
  										<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">IT Utilities</span>
  										<a href="javascript:;" class="card-title h5 d-block text-darker">
  											Operasional Unit IT
  										</a>

  										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-ip" type="button">
  											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
  											<span class="btn-inner--text"> IP List</span>
  										</button>
  										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-lembur" type="button">
  											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
  											<span class="btn-inner--text"> Data Lembur</span>
  										</button>
										<a class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" href="<?= base_url('logout') ?>">
  											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
  											<span>Logout</span>
										</a>
  									</div>
  								</div>

  							</div>
  							<!-- TAB TENGAH -->
  							<div class="col-md-10">
  								<!-- Tabel IP -->
  								<div id="tabel_ip">
  									<h2 class="mt-3">IP LIST
  										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahipModal">Tambah IP</button>
  									</h2>
  									<div class="col-xl">
  										<div class="row">
  											<div class="col-md-6">
  												<!-- Search Bar -->
  												<input type="text" id="searchIp" class="form-control mb-3" placeholder="Search...">
  											</div>
  										</div>
  										<div class="row" style="height: 300px; overflow: scroll;">
  											<div class="col-xl">
  												<table id="dataTable-IP" class="table">
  													<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
  														<tr>
  															<th>NO</th>
  															<th>IP ADDRESS</th>
  															<th>NAME</th>
  															<th>AKSI</th>
  														</tr>
  													</thead>
  													<tbody>
  														<?php $i = 1; ?>
  														<?php foreach ($ip as $row) : ?>
  															<tr>
  																<td><?php echo $i++; ?></td>
  																<td><?php echo $row->ipaddr; ?></td>
  																<td><?php echo $row->name; ?></td>
  																<td>
  																	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row->id; ?>">EDIT</button>
  																	<button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row->id; ?>)">DELETE</button>
  																</td>
  															</tr>
  														<?php endforeach ?>
  													</tbody>
  												</table>
  											</div>
  										</div>
  									</div>
  								</div>
  								<div id="tabel_data_lembur" hidden>
  									<!-- Tabel IP -->
  									<h2 class="mt-3">LEMBUR LIST
  										<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahipModal">Tambah IP</button> -->
  										<!-- <a class="btn btn-primary btn-sm" href="printlembur?bulan=<?php echo date('m'); ?>" target="_blank" >Cetak Perbulan</a> -->
  									</h2>
  									<div class="col-xl">
  										<div class="nav-wrapper mx-3">
  											<h5>PRINT LEMBUR SEBULAN</h5>
  											<table id="dataTable-Lembur" class="table">
  												<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
  													<tr>
  														<th>NO</th>
  														<th>NAMA</th>
  														<th>BULAN</th>
  														<th>AKSI</th>
  													</tr>
  												</thead>
  												<tbody>
  													<?php
														$i = 0;
														foreach ($lemburpernama as $row) :
															$i++;
														?>
  														<tr>
  															<td><?= $i ?></td>
  															<td><?= $row->nama ?></td>
  															<td><?= $row->bulan ?></td>
  															<td>
  																<a class="btn btn-primary btn-sm" href="printlembur?Nama=<?php echo $row->nama; ?>" target="_blank">Cetak Perbulan</a>
  															</td>
  														</tr>
  													<?php endforeach ?>
  												</tbody>
  											</table>
  										</div>
  										<div class="row">
  											<div class="col-md-6">
  												<!-- Search Bar -->
  												<input type="text" id="searchLembur" class="form-control mb-3" placeholder="Search...">
  											</div>
  										</div>
  										<div class="row" style="height: 300px; overflow: scroll;">
  											<div class="col-xl">
  												<table id="dataTable-Lembur" class="table">
  													<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
  														<tr>
  															<th>NO</th>
  															<th>ID</th>
  															<th>NAMA</th>
  															<th>TANGGAL/JAM</th>
  															<th>GAWIAN</th>
  															<th>SELECT</th>
  														</tr>
  													</thead>
  													<tbody>
  														<?php $i = 1; ?>
  														<?php foreach ($lembur as $row) : ?>
  															<tr>
  																<td><?php echo $i++; ?></td>
  																<td><?php echo $row->id; ?></td>
  																<td><?php echo $row->Nama; ?></td>
  																<td><?php echo $row->tanggal; ?>, <?php echo $row->durasi; ?></td>
  																<td><?php echo $row->sub_judul; ?></td>
  																<td>
  																	<input type="checkbox" class="print-checkbox" value="<?php echo $row->id; ?>">
  																</td>
  															</tr>
  														<?php endforeach ?>
  													</tbody>
  												</table>
  											</div>
  										</div>
  										<span>
  											<button id="print-selected" class="btn btn-primary">Print Selected</button>
  											<button id="print-all" class="btn btn-primary">Print All</button>
  										</span>
  									</div>
  								</div>
  							</div>

  						</div>
  					</div>

  					<!-- Modal Tambah IP -->
  					<div class="modal fade" id="tambahipModal" tabindex="1" role="dialog" aria-labelledby="tambahipModalLabel" aria-hidden="true">
  						<div class="modal-dialog" role="document">
  							<div class="modal-content">
  								<div class="modal-header">
  									<h3 class="modal-title" id="tambahipModalLabel">Tambah IP</h3>
  									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  										<span aria-hidden="true">&times;</span>
  									</button>
  								</div>
  								<!-- Form Tambah IP -->
  								<div class="modal-body">
  									<!-- <form> -->
  									<form action="<?= base_url('hamid/createIp') ?>" method="post">
  										<div class="form-group">
  											<input type="text" class="form-control mt-1 ipaddr" name="ipaddr" for="ipaddr" id="ipaddr" placeholder="IP ADDRESS" value="<?= $data->ipaddr ?>" required>
  											<input type="text" class="form-control mt-1 name" name="name" for="name" id="name" placeholder="Nama Pengguna" value="<?= $data->name ?>" required>
  										</div>
  										<button type="submit" class="btn btn-primary">Tambah IP</button>
  									</form>
  								</div>
  							</div>
  						</div>
  					</div>

  					<!-- Modal Edit IP -->
  					<?php foreach ($ip as $row) : ?>
  						<div class="modal fade" id="editModal<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row->id; ?>" aria-hidden="true">
  							<div class="modal-dialog" role="document">
  								<div class="modal-content">
  									<div class="modal-header">
  										<h5 class="modal-title" id="editModalLabel<?php echo $row->id; ?>">Edit Data</h5>
  										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  											<span aria-hidden="true">&times;</span>
  										</button>
  									</div>
  									<div class="modal-body">
  										<!-- Form for editing data -->
  										<form action="<?php echo base_url('hamid/updateIp/' . $row->id); ?>" method="post">
  											<div class="form-group">
  												<label for="ipaddr">IP Address</label>
  												<input type="text" class="form-control" id="ipaddr" name="ipaddr" value="<?php echo $row->ipaddr; ?>">
  											</div>
  											<div class="form-group">
  												<label for="name">Name</label>
  												<input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name; ?>">
  											</div>
  											<!-- Add other form fields here as needed -->
  											<button type="submit" class="btn btn-primary">Update</button>
  										</form>
  									</div>
  								</div>
  							</div>
  						</div>
  					<?php endforeach ?>

  					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  					<script>
  						$(document).ready(function() {
  							$('#searchIp').on('keyup', function() {
  								var searchText = $(this).val().toLowerCase();
  								$('#dataTable-IP tbody tr').each(function() {
  									var lineStr = $(this).text().toLowerCase();
  									if (lineStr.indexOf(searchText) === -1) {
  										$(this).hide();
  									} else {
  										$(this).show();
  									}
  								});
  							});
  						});
  					</script>

  					<script>
  						function confirmDelete(id) {
  							if (confirm("Are you sure you want to delete this item?")) {
  								window.location.href = "<?php echo base_url('hamid/deleteIp/'); ?>" + id;
  							}
  						}

  						$('#btn-ip').click(function() {
  							if ($("#tabel_ip").is(':hidden')) {
  								$("#tabel_ip").prop('hidden', false);
  								$("#tabel_data_lembur").prop('hidden', true);
  							}
  						})
  						$('#btn-lembur').click(function() {
  							if ($("#tabel_data_lembur").is(':hidden')) {
  								$("#tabel_data_lembur").prop('hidden', false);
  								$("#tabel_ip").prop('hidden', true);
  							}
  						})
  					</script>
  					<script>
  						$(document).ready(function() {
  							// Check all checkbox
  							$('#print-all').click(function() {
  								var allIds = [];
  								$('.print-checkbox').each(function() {
  									allIds.push($(this).val());
  								});
  								if (allIds.length > 0) {
  									var printUrl = 'printlembur?id=' + encodeURIComponent(allIds.join(',')); // Pass all IDs as query parameter
  									window.open(printUrl, '_blank');
  								} else {
  									alert('No items available to print.');
  								}
  							});

  							// Print selected
  							$('#print-selected').click(function() {
  								var selectedIds = [];
  								$('.print-checkbox:checked').each(function() {
  									selectedIds.push($(this).val());
  								});
  								if (selectedIds.length > 0) {
  									var printUrl = 'printlembur?id=' + encodeURIComponent(selectedIds.join(',')); // Pass selected IDs as query parameter
  									window.open(printUrl, '_blank');
  								} else {
  									alert('Please select at least one item to print.');
  								}
  							});
  						});
  					</script>