<style>
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
		max-width: 10rem;
    }

    /* .truncate:hover {
        overflow: visible;
    } */
	
</style>
 
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

  										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-logdai" type="button">
  											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
  											<span class="btn-inner--text"> Daily Log</span>
  										</button>
										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-rmtls" type="button">
  											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
  											<span class="btn-inner--text"> Remote List</span>
  										</button>
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
  								<div id="tabel_logdai">
  									<h2 class="mt-3">Daily Log
  										<button type="button" id="tambahlogdai" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahlogdaiModal">Tambah Log</button>
  									</h2>
  									<div class="col-xl">
  										<div class="row">
  											<div class="col-md-4">
  												<input type="text" id="searchLog" class="form-control mb-3" placeholder="Search...">
  											</div>
										</div>
										<div class="nav-wrapper mx-3">
											<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
												<li class="nav-item mb-4">
													<a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-ALL-tab" data-toggle="tab" href="#tabs-icons-text-ALL" role="tab" aria-controls="tabs-icons-text-ALL" aria-selected="true">All Data</a>
												</li>
												<?php $i = 0; if (!empty($logweekly)) { ?>
												<li class="nav-item mb-4">
													<a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-<?=$i?>-tab" data-toggle="tab" href="#tabs-icons-text-<?=$i?>" role="tab" aria-controls="tabs-icons-text-<?=$i?>" aria-selected="true">Weekly</a>
												</li>
												<?php } foreach ($logname as $row) : $i++; ?>
												<li class="nav-item mb-4">
													<a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-<?=$i?>-tab" data-toggle="tab" href="#tabs-icons-text-<?=$i?>" role="tab" aria-controls="tabs-icons-text-<?=$i?>" aria-selected="true"><?= $row->Nama ?></a>
												</li>
												<?php endforeach ?>
											</ul>
										</div>
										<div class="row" style="height: 300px; overflow: auto;">
											<div class="col-xl">
												<div class="tab-content">
													<div class="tab-pane fade" id="tabs-icons-text-ALL" role="tabpanel" aria-labelledby="tabs-icons-text-ALL-tab">
														<table id="dataTable-LogAll" class="table dataTable-Log">
															<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
																<tr>
																	<th>NO</th>
																	<th>NAMA</th>
																	<th>TANGGAL</th>
																	<th>JUDUL LOG</th>
																	<th>DESKRIPSI LOG</th>
																	<th>CATATAN</th>
																	<th>AKSI</th>
																</tr>
															</thead>
															<tbody>
																<?php $type="Log"; $i = 1; foreach ($alllog as $row) : ?>
																	<tr>
																		<td><?= $i++; ?></td>
																		<td><?= $row->Nama; ?></td>
																		<td><?= $row->tanggal; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->judul_act)); ?>"><?= $row->judul_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->deskripsi_act)); ?>"><?= $row->deskripsi_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->catatan)); ?>"><?= $row->catatan; ?></td>
																		<td>
																			<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $row->id; ?>" data-NIK="<?= $row->NIK; ?>" data-namalog="<?= $row->Nama; ?>" data-tanggal="<?= $row->tanggal; ?>" data-judul_act="<?= $row->judul_act; ?>" data-deskripsi_act="<?= $row->deskripsi_act; ?>" data-catatan="<?= $row->catatan; ?>">EDIT</button>
																			<button type="button" class="btn btn-danger btn-sm" onclick="Delete<?= $type ?>('<?= $row->id; ?>', '<?= $row->judul_act; ?>')">DELETE</button>
																		</td>
																	</tr>
																<?php endforeach ?>
															</tbody>
														</table>
													</div>
													<?php $a = 0; ?>
													<div class="tab-pane fade" id="tabs-icons-text-<?= $a ?>" role="tabpanel" aria-labelledby="tabs-icons-text-<?= $a ?>-tab">
														<table id="dataTable-LogWeekly" class="table dataTable-Log">
															<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
																<tr>
																	<th>NO</th>
																	<th>NAMA</th>
																	<th>TANGGAL</th>
																	<th>JUDUL LOG</th>
																	<th>DESKRIPSI LOG</th>
																	<th>CATATAN</th>
																	<th>AKSI</th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1; foreach ($logweekly as $row) : ?>
																	<tr>
																		<td><?= $i++; ?></td>
																		<td><?= $row->Nama; ?></td>
																		<td><?= $row->tanggal; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->judul_act)); ?>"><?= $row->judul_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->deskripsi_act)); ?>"><?= $row->deskripsi_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->catatan)); ?>"><?= $row->catatan; ?></td>
																		<td>
																			<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $row->id; ?>" data-NIK="<?= $row->NIK; ?>" data-namalog="<?= $row->Nama; ?>" data-tanggal="<?= $row->tanggal; ?>" data-judul_act="<?= $row->judul_act; ?>" data-deskripsi_act="<?= $row->deskripsi_act; ?>" data-catatan="<?= $row->catatan; ?>">EDIT</button>
																			<button type="button" class="btn btn-danger btn-sm" onclick="Delete<?= $type ?>('<?= $row->id; ?>', '<?= $row->judul_act; ?>')">DELETE</button>
																		</td>
																	</tr>
																<?php endforeach ?>
															</tbody>
														</table>
													</div>
													<?php 
														for ($i = 0; $i < $jumlahlogname; $i++) : $a++; ?>
													<div class="tab-pane fade" id="tabs-icons-text-<?= $a ?>" role="tabpanel" aria-labelledby="tabs-icons-text-<?= $a ?>-tab">
														<table id="dataTable-Log-<?= $data[$i][$j]->NIK; ?>" class="table dataTable-Log">
															<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
																<tr>
																	<th>NO</th>
																	<th>NAMA</th>
																	<th>TANGGAL</th>
																	<th>JUDUL LOG</th>
																	<th>DESKRIPSI LOG</th>
																	<th>CATATAN</th>
																	<th>AKSI</th>
																</tr>
															</thead>
															<tbody>
																<?php for ($j = 0; $j < count($data[$i]); $j++) :?>
																<tr>
																	<td><?= $j+1; ?></td>
																	<td><?= $data[$i][$j]->Nama; ?></td>
																	<td><?= $data[$i][$j]->tanggal; ?></td>
																	<td  class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->judul_act)); ?>"><?= $data[$i][$j]->judul_act; ?></td>
																	<td  class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->deskripsi_act)); ?>"><?= $data[$i][$j]->deskripsi_act; ?></td>
																	<td  class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->catatan)); ?>"><?= $data[$i][$j]->catatan; ?></td>
																	<td>
																		<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $row->id; ?>" data-NIK="<?= $row->NIK; ?>" data-namalog="<?= $row->Nama; ?>" data-tanggal="<?= $row->tanggal; ?>" data-judul_act="<?= $row->judul_act; ?>" data-deskripsi_act="<?= $row->deskripsi_act; ?>" data-catatan="<?= $row->catatan; ?>">EDIT</button>
																		<button type="button" class="btn btn-danger btn-sm" onclick="Delete<?= $type ?>('<?= $row->id; ?>', '<?= $row->judul_act; ?>')">DELETE</button>
																	</td>
																</tr>
																<?php endfor?>
															</tbody>
														</table>
													</div>
													<?php endfor ?>
												</div>
											</div>
										</div>
  									</div>
  								</div>
  								<div id="tabel_ip" hidden>
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
  										<div class="row" style="height: 300px; overflow: auto;">
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
  														<?php $type="Ip"; $i = 1; foreach ($ip as $row) : ?>
  															<tr>
  																<td><?= $i++; ?></td>
  																<td><?= $row->ipaddr; ?></td>
  																<td><?= $row->name; ?></td>
  																<td>
  																	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?= $row->id; ?>">EDIT</button>
  																	<button type="button" class="btn btn-danger btn-sm" onclick="Delete<?= $type ?>(<?= $row->id; ?>)">DELETE</button>
  																</td>
  															</tr>
  														<?php endforeach ?>
  													</tbody>
  												</table>
  											</div>
  										</div>
  									</div>
  								</div>
								  <div id="tabel_remote" hidden>
  									<h2 class="mt-3">REMOTE LIST
  										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahRemoteModal" id="tambah-remote">Tambah REMOTE</button>
  									</h2>
  									<div class="col-xl">
  										<div class="row">
  											<div class="col-md-6">
  												<!-- Search Bar -->
  												<input type="text" id="searchRemote" class="form-control mb-3" placeholder="Search...">
  											</div>
  										</div>
  										<div class="row" style="height: 300px; overflow: auto;">
  											<div class="col-xl">
  												<table id="dataTable-Rmt" class="table">
  													<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
  														<tr>
  															<th>NO</th>
  															<th>REMOTE ADDRESS</th>
  															<th>NAME</th>
  															<th>AKSI</th>
  														</tr>
  													</thead>
  													<tbody>
  														<?php $type="Remote"; $i = 1; foreach ($rmt as $row) : ?>
  															<tr>
  																<td><?= $i++; ?></td>
  																<td><?= $row->RemoteAddr; ?></td>
  																<td><?= $row->Nama; ?></td>
  																<td>
  																	<button type="button" class="btn btn-success btn-sm btn-edit-remote" data-remote="<?= $row->RemoteAddr ?>" data-nama="<?= $row->Nama ?>" data-id="<?= $row->id; ?>" data-toggle="modal" data-target="#tambahRemoteModal">EDIT</button>
  																	<button type="button" class="btn btn-danger btn-sm" onclick="Delete<?= $type ?>(<?= $row->id; ?>)">DELETE</button>
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
  										<!-- <a class="btn btn-primary btn-sm" href="printlembur?bulan=<?= date('m'); ?>" target="_blank" >Cetak Perbulan</a> -->
  									</h2>
  									<div class="col-xl">
  										<div class="nav-wrapper mx-3">
  											<h5>PRINT LEMBUR SEBULAN</h5>
  											<table id="dataTable-LemburNama" class="table">
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
														$j = 0;
														foreach ($lemburpernama as $row) :
														?>
  														<tr>
  															<td><?= $j++ ?></td>
  															<td><?= $row->nama ?></td>
  															<td><?= $row->bulan ?></td>
  															<td>
  																<a class="btn btn-primary btn-sm" href="printlembur?user=<?= $row->nama; ?>" target="_blank">Cetak Perbulan</a>
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
  										<div class="row" style="height: 300px; overflow: auto;">
  											<div class="col-xl">
  												<table id="dataTable-Lembur" class="table">
  													<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
  														<tr>
  															<th>NO</th>
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
  																<td><?= $i++; ?></td>
  																<td><?= $row->Nama; ?></td>
  																<td><?= $row->tanggal; ?>, <?= $row->durasi; ?></td>
  																<td><?= $row->sub_judul; ?></td>
  																<td>
  																	<input type="checkbox" class="print-checkbox" value="<?= $row->id; ?>">
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

  					<!-- Modal Tambah LOG -->
  					<div class="modal fade" id="tambahlogdaiModal" tabindex="1" role="dialog" aria-labelledby="tambahlogdaiLabel" aria-hidden="true">
  						<div class="modal-dialog" role="document">
  							<div class="modal-content">
  								<div class="modal-header">
  									<h3 class="modal-title" id="tambahlogdaiModalLabel">Tambah LOG</h3>
  									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  										<span aria-hidden="true">&times;</span>
  									</button>
  								</div>
  								<!-- Form Tambah LOG -->
  								<div class="modal-body">
  									<!-- <form> -->
  									<form action="<?= base_url('it/createLogdai') ?>" method="post">
  										<div class="form-group" id="formLogModal">
											<select class="custom-select" name="user" id="user" required>
												<option selected disabled>Pilih User</option>
												<?php foreach ($datauser as $row) : ?>
													<option value="<?= $row->NIK; ?>"><?= $row->Nama; ?></option>
												<?php endforeach ?>
											</select>
											<input type="date" id="datepicker" class="form-control mt-1 tanggal" name="tanggal" for="tanggal" id="tanggal" placeholder="Tanggal" value="<?= $data->tanggal ?>" required>
  											<input type="text" class="form-control mt-1 judul_act" name="judul_act" for="judul_act" id="judul_act" placeholder="Judul Aktivitas" value="<?= $data->judul_act ?>" required>
  											<textarea type="text" class="form-control mt-1 deskripsi_act" name="deskripsi_act" for="deskripsi_act" id="deskripsi_act" placeholder="Deskripsi Aktivitas" value="<?= $data->deskripsi_act ?>" required></textarea>
  											<textarea type="text" class="form-control mt-1 catatan" name="catatan" for="catatan" id="catatan" placeholder="Catatan" value="<?= $data->catatan ?>" required></textarea>
  										</div>
  										<button type="submit" class="btn btn-primary" id="btnmodallog">Tambah LOG</button>
  									</form>
  								</div>
  							</div>
  						</div>
  					</div>

					<!-- Modal Detail -->
					<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header" style="padding: 1.25rem 0rem 0rem 1.25rem;">
								<h5 class="" id="detailModalLabel">Detail</h5>
								<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button> -->
							</div>
							<div class="modal-body" style="padding: 0rem 0rem 1.25rem 1.25rem;">
								<div id="detailContent"></div>
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
  									<form action="<?= base_url('it/createIp') ?>" method="post">
  										<div class="form-group" id="formIpModal">
  											<input type="text" class="form-control mt-1 ipaddr" name="ipaddr" for="ipaddr" id="ipaddr" placeholder="IP ADDRESS" value="<?= $data->ipaddr ?>" required>
  											<input type="text" class="form-control mt-1 name" name="name" for="name" id="name" placeholder="Nama Pengguna" value="<?= $data->name ?>" required>
  										</div>
  										<button type="submit" class="btn btn-primary">Tambah IP</button>
  									</form>
  								</div>
  							</div>
  						</div>
  					</div>

					<!-- Modal Tambah Remote -->
						<div class="modal fade" id="tambahRemoteModal" tabindex="1" role="dialog" aria-labelledby="tambahipModalLabel" aria-hidden="true">
  						<div class="modal-dialog" role="document">
  							<div class="modal-content">
  								<div class="modal-header">
  									<h3 class="modal-title" id="tambahRemoteModalLabel">Tambah Remote</h3>
  									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  										<span aria-hidden="true">&times;</span>
  									</button>
  								</div>
  								<!-- Form Tambah IP -->
  								<div class="modal-body">
  									<!-- <form> -->
  									<form action="<?= base_url('it/createRemote') ?>" method="post">
  										<div class="form-group" id="formRemoteModal">
  											<input type="text" class="form-control mt-1 ipaddr" name="remoteaddr" for="ipaddr" id="remoteaddr" placeholder="Remote ADDRESS" value="<?= $data->ipaddr ?>" required>
  											<input type="text" class="form-control mt-1 name" name="name" for="name" id="name" placeholder="Nama Pengguna" value="<?= $data->name ?>" required>
  										</div>
  										<button type="submit" class="btn btn-primary">Tambah Remote</button>
  									</form>
  								</div>
  							</div>
  						</div>
  					</div>
					
  					<!-- Modal Edit IP -->
  					<?php foreach ($ip as $row) : ?>
  						<div class="modal fade" id="editModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id; ?>" aria-hidden="true">
  							<div class="modal-dialog" role="document">
  								<div class="modal-content">
  									<div class="modal-header">
  										<h5 class="modal-title" id="editModalLabel<?= $row->id; ?>">Edit Data</h5>
  										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  											<span aria-hidden="true">&times;</span>
  										</button>
  									</div>
  									<div class="modal-body">
  										<!-- Form for editing data -->
  										<form action="<?= base_url('it/updateIp/' . $row->id); ?>" method="post">
  											<div class="form-group">
  												<label for="ipaddr">IP Address</label>
  												<input type="text" class="form-control" id="ipaddr" name="ipaddr" value="<?= $row->ipaddr; ?>">
  											</div>
  											<div class="form-group">
  												<label for="name">Name</label>
  												<input type="text" class="form-control" id="name" name="name" value="<?= $row->name; ?>">
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
  							$('#searchLog').on('keyup', function() {
  								var searchText = $(this).val().toLowerCase();
  								$('#dataTable-LogAll tbody tr, #dataTable-LogWeekly tbody tr, #dataTable-Log-<?= $data[$i][$j]->NIK; ?> tbody tr').each(function() {
  									var lineStr = $(this).text().toLowerCase();
  									if (lineStr.indexOf(searchText) === -1) {
  										$(this).hide();
  									} else {
  										$(this).show();
  									}
  								});
  							});
  						});
						
						$(document).ready(function() {
  							$('#searchRemote').on('keyup', function() {
  								var searchText = $(this).val().toLowerCase();
  								$('#dataTable-Rmt tbody tr').each(function() {
  									var lineStr = $(this).text().toLowerCase();
  									if (lineStr.indexOf(searchText) === -1) {
  										$(this).hide();
  									} else {
  										$(this).show();
  									}
  								});
  							});
  						});

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

  						$(document).ready(function() {
  							$('#searchLembur').on('keyup', function() {
  								var searchText = $(this).val().toLowerCase();
  								$('#dataTable-Lembur tbody tr, #dataTable-LemburNama tbody tr').each(function() {
  									var lineStr = $(this).text().toLowerCase();
  									if (lineStr.indexOf(searchText) === -1) {
  										$(this).hide();
  									} else {
  										$(this).show();
  									}
  								});
  							});
  						});
						
						$(document).ready(function() {
							$('.truncate').click(function() {
							var $this = $(this);
							if ($this[0].scrollWidth > $this.innerWidth()) {
								$('#detailContent').html($this.data('content'));
								$('#detailModal').modal('show');
							}
							});
						});
  					</script>

  					<script>
						$('#tambah-remote').click(function () {
							$('#tambahRemoteModalLabel').html('Tambah Remote')
							$('#formRemoteModal').find('#id').remove()
							$('#remoteaddr').val("")
							$('#tambahRemoteModal #name').val("")
						})
						$('#dataTable-Rmt').on('click','.btn-edit-remote',function () {
							$('#remoteaddr').val($(this).attr('data-remote'))
							$('#tambahRemoteModal #name').val($(this).attr('data-nama'))
							$('#tambahRemoteModalLabel').html('Edit Remote')
							$(this).attr('data-remote')
							$('#formRemoteModal').append(`<input type="text" class="form-control mt-1 ipaddr" name="id" for="ipaddr" id="id" placeholder="Remote ADDRESS" value="${$(this).attr('data-id')}" hidden required>`)
						})
						$('#tambahlogdai').click(function () {
							if ($('#formLogModal').find('#user').length === 0) {
								$('#formLogModal').prepend(`
									<select class="custom-select" name="user" id="user" required>
										<option selected disabled>Pilih User</option>
										<?php foreach ($datauser as $row) : ?>
											<option value="<?= $row->NIK; ?>"><?= $row->Nama; ?></option>
										<?php endforeach ?>
									</select>	
								`);
							}
							$('#tambahlogdaiModalLabel').html('Tambah LOG')
    						$('#btnmodallog').html('Tambah LOG')
							$('#formLogModal').find('#idlog').remove()
							$('#formLogModal').find('#NIK').remove()
							$('#formLogModal').find('#namalog').remove()
							$('#user').val("")
							$('#tanggal').val("")
							$('#judul_act').val("")
							$('#deskripsi_act').val("")
							$('#catatan').val("")
						})
						$('.dataTable-Log').on('click','.btn-edit-log',function () {
							$('#user').remove()
							$('#tanggal').val($(this).attr('data-tanggal'))
							$('#judul_act').val($(this).attr('data-judul_act'))
							$('#deskripsi_act').val($(this).attr('data-deskripsi_act'))
							$('#catatan').val($(this).attr('data-catatan'))
							$('#tambahlogdaiModalLabel').html('EDIT LOG')
    						$('#btnmodallog').html('EDIT LOG')
							// $(this).attr('data-remote')
							$('#formLogModal').prepend(`
							<input type="text" class="form-control mt-1 idlog" name="id" for="idlog" id="idlog" value="${$(this).attr('data-idlog')}" required readonly>
							<input type="text" class="form-control mt-1 NIK" name="NIK" for="NIK" id="NIK" value="${$(this).attr('data-NIK')}" required readonly>
							<input type="text" class="form-control mt-1 nama" name="Nama" for="nama" id="namalog" value="${$(this).attr('data-namalog')}" required readonly>
							`)
						})

						<?php $types = ['Log', 'Ip', 'Remote'];
						foreach ($types as $type) : ?>
							function Delete<?php echo $type; ?>(id, judul_act) {
								if (confirm("Are you sure you want to delete this item?")) {
									window.location.href = "<?php echo base_url('it/delete' . $type . '/'); ?>" + id + '/' + encodeURIComponent(judul_act);
								}
							}
						<?php endforeach; ?>


  						$('#btn-logdai').click(function() {
  							if ($("#tabel_logdai").is(':hidden')) {
  								$("#tabel_logdai").prop('hidden', false);
  								$("#tabel_data_lembur").prop('hidden', true);
  								$("#tabel_ip").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
							}
						})

						$('#btn-rmtls').click(function() {
  							if ($("#tabel_remote").is(':hidden')) {
  								$("#tabel_remote").prop('hidden', false);
  								$("#tabel_data_lembur").prop('hidden', true);
  								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
							}
						})

  						$('#btn-ip').click(function() {
  							if ($("#tabel_ip").is(':hidden')) {
  								$("#tabel_ip").prop('hidden', false);
  								$("#tabel_data_lembur").prop('hidden', true);
  								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
							}
						})

						$('#btn-lembur').click(function() {
							if ($("#tabel_data_lembur").is(':hidden')) {
								$("#tabel_data_lembur").prop('hidden', false);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
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
							
							var today = new Date().toISOString().split('T')[0];
							document.getElementById('datepicker').value = today;

  						});
  					</script>