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

							<!-- START TAB KIRI -->
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
										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-logtinta" type="button">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span class="btn-inner--text"> Log Tinta</span>
										</button>
										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-lembur" type="button">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span class="btn-inner--text"> Data Lembur</span>
										</button>
										<br><a class="btn btn-icon mb-3 btn-3 btn-danger btn-sm" href="<?= base_url('logout') ?>">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span>Logout</span>
										</a>
									</div>
								</div>
							</div>
							<!-- END TAB KIRI -->

							<!-- START TAB TENGAH -->
							<div class="col-md-10">
								<!-- START DAILY LOG -->
								<div id="tabel_logdai" hidden>
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
												<?php $i = 0;
												if (!empty($logweekly)) { ?>
													<li class="nav-item mb-4">
														<a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-<?= $i ?>-tab" data-toggle="tab" href="#tabs-icons-text-<?= $i ?>" role="tab" aria-controls="tabs-icons-text-<?= $i ?>" aria-selected="true">Weekly</a>
													</li>
												<?php }
												foreach ($logname as $row) : $i++; ?>
													<li class="nav-item mb-4">
														<a class="nav-link mb-sm-3 mb-md-0 tab-nav" id="tabs-icons-text-<?= $i ?>-tab" data-toggle="tab" href="#tabs-icons-text-<?= $i ?>" role="tab" aria-controls="tabs-icons-text-<?= $i ?>" aria-selected="true"><?= $row->Nama ?></a>
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
																<?php $i = 1;
																foreach ($alllog as $row) : ?>
																	<tr>
																		<td><?= $i++; ?></td>
																		<td><?= $row->Nama; ?></td>
																		<td><?= $row->tanggal; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->judul_act)); ?>"><?= $row->judul_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->deskripsi_act)); ?>"><?= $row->deskripsi_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->catatan)); ?>"><?= $row->catatan; ?></td>
																		<td>
																			<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $row->id; ?>" data-NIK="<?= $row->NIK; ?>" data-namalog="<?= $row->Nama; ?>" data-tanggal="<?= $row->tanggal; ?>" data-judul_act="<?= $row->judul_act; ?>" data-deskripsi_act="<?= $row->deskripsi_act; ?>" data-catatan="<?= $row->catatan; ?>">EDIT</button>
																			<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $row->id; ?>" data-tipe="Log" data-explain="<?= $row->judul_act; ?>">DELETE</button>
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
																<?php $i = 1;
																foreach ($logweekly as $row) : ?>
																	<tr>
																		<td><?= $i++; ?></td>
																		<td><?= $row->Nama; ?></td>
																		<td><?= $row->tanggal; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->judul_act)); ?>"><?= $row->judul_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->deskripsi_act)); ?>"><?= $row->deskripsi_act; ?></td>
																		<td class="truncate" data-content="<?= htmlentities(nl2br($row->catatan)); ?>"><?= $row->catatan; ?></td>
																		<td>
																			<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $row->id; ?>" data-NIK="<?= $row->NIK; ?>" data-namalog="<?= $row->Nama; ?>" data-tanggal="<?= $row->tanggal; ?>" data-judul_act="<?= $row->judul_act; ?>" data-deskripsi_act="<?= $row->deskripsi_act; ?>" data-catatan="<?= $row->catatan; ?>">EDIT</button>
																			<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $row->id; ?>" data-tipe="Log" data-explain="<?= $row->judul_act; ?>">DELETE</button>
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
																	<?php for ($j = 0; $j < count($data[$i]); $j++) : ?>
																		<tr>
																			<!-- <td><?= $j + 1; ?></td> -->
																			<td><?= $data[$i][$j]->id; ?></td>
																			<td><?= $data[$i][$j]->Nama; ?></td>
																			<td><?= $data[$i][$j]->tanggal; ?></td>
																			<td class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->judul_act)); ?>"><?= $data[$i][$j]->judul_act; ?></td>
																			<td class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->deskripsi_act)); ?>"><?= $data[$i][$j]->deskripsi_act; ?></td>
																			<td class="truncate" data-content="<?= htmlentities(nl2br($data[$i][$j]->catatan)); ?>"><?= $data[$i][$j]->catatan; ?></td>
																			<td>
																				<button type="button" class="btn btn-success btn-sm btn-edit-log" data-toggle="modal" data-target="#tambahlogdaiModal" data-idlog="<?= $data[$i][$j]->id; ?>" data-NIK="<?= $data[$i][$j]->NIK; ?>" data-namalog="<?= $data[$i][$j]->Nama; ?>" data-tanggal="<?= $data[$i][$j]->tanggal; ?>" data-judul_act="<?= $data[$i][$j]->judul_act; ?>" data-deskripsi_act="<?= $data[$i][$j]->deskripsi_act; ?>" data-catatan="<?= $data[$i][$j]->catatan; ?>">EDIT</button>
																				<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $data[$i][$j]->id; ?>" data-tipe="Log" data-explain="<?= $data[$i][$j]->judul_act; ?>">DELETE</button>
																			</td>
																		</tr>
																	<?php endfor ?>
																</tbody>
															</table>
														</div>
													<?php endfor ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END DAILY LOG -->

								<!-- START IP LIST -->
								<div id="tabel_ip" hidden>
									<h2 class="mt-3">IP LIST
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahIpModal" id="tambah-ip">Tambah IP</button>
									</h2>
									<div class="col-xl">
										<div class="row">
											<div class="col-md-4">
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
														<?php $i = 1;
														foreach ($ip as $row) : ?>
															<tr>
																<td><?= $i++; ?></td>
																<td><?= $row->ipaddr; ?></td>
																<td><?= $row->name; ?></td>
																<td>
																	<button type="button" class="btn btn-success btn-sm btn-edit-ip" data-toggle="modal" data-ipaddr="<?= $row->ipaddr; ?>" data-nama="<?= $row->name; ?>" data-idip="<?= $row->id; ?>" data-target="#tambahIpModal">EDIT</button>
																	<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $row->id; ?>" data-tipe="Ip" data-explain="<?= $row->name; ?>">DELETE</button>
																</td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- END IP LIST -->

								<!--START DATA REMOTE -->
								<div id="tabel_remote" hidden>
									<h2 class="mt-3">REMOTE LIST
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahRemoteModal" id="tambah-remote">Tambah REMOTE</button>
									</h2>
									<div class="col-xl">
										<div class="row">
											<div class="col-md-4">
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
														<?php $i = 1;
														foreach ($rmt as $row) : ?>
															<tr>
																<td><?= $i++; ?></td>
																<td><?= $row->RemoteAddr; ?></td>
																<td><?= $row->Nama; ?></td>
																<td>
																	<button type="button" class="btn btn-success btn-sm btn-edit-remote" data-remote="<?= $row->RemoteAddr ?>" data-nama="<?= $row->Nama ?>" data-id="<?= $row->id; ?>" data-toggle="modal" data-target="#tambahRemoteModal">EDIT</button>
																	<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $row->id; ?>" data-tipe="Remote" data-explain="<?= $row->Nama; ?>">DELETE</button>
																</td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!--END DATA REMOTE -->

								<!-- START LOG TINTA -->
								<div id="tabel_logtinta">
									<h2 class="mt-3">Log Tinta
										<button type="button" id="tambahlogtinta" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahlogtintaModal">Tambah Log Tinta</button>
									</h2>
									<div class="col-xl">
										<div class="row">
											<div class="col-md-4">
												<input type="text" id="searchLog" class="form-control mb-3" placeholder="Search...">
											</div>
										</div>
										<div class="row" style="height: 300px; overflow: auto;">
											<div class="col-xl">
												<table id="dataTable-LogTinta" class="table">
													<thead style="position: -webkit-sticky; position: sticky; top: 0; padding: 5px; background-color: #cadbe8; z-index: 1;">
														<tr>
															<th>NO</th>
															<th>TANGGAL ISI</th>
															<th>TANGGAL HABIS</th>
															<th>KETERANGAN</th>
															<th>SINSA TINTA /BOTOL</th>
															<th>AKSI</th>
														</tr>
													</thead>
													<tbody>
														<?php $k=1; foreach ($tinta as $row) : 
															// Extracting values from deskripsi and sisa_stok
															$deskripsi_parts = explode(" tinta", $row->deskripsi);
															$unit_pengguna = $deskripsi_parts[0];
															$tinta = isset($deskripsi_parts[1]) ? $deskripsi_parts[1] : "";

															$tinta_bk = strpos($tinta, "BK") !== false ? "BK" : "";
															$tinta_c = strpos($tinta, "C") !== false ? "C" : "";
															$tinta_m = strpos($tinta, "M") !== false ? "M" : "";
															$tinta_y = strpos($tinta, "Y") !== false ? "Y" : "";

															// Extracting values from sisa_stok
															preg_match('/BK = (\d+)/', $row->sisa_stok, $matches_bk);
															$stok_bk = isset($matches_bk[1]) ? $matches_bk[1] : '';

															preg_match('/C = (\d+)/', $row->sisa_stok, $matches_c);
															$stok_c = isset($matches_c[1]) ? $matches_c[1] : '';

															preg_match('/M = (\d+)/', $row->sisa_stok, $matches_m);
															$stok_m = isset($matches_m[1]) ? $matches_m[1] : '';

															preg_match('/Y = (\d+)/', $row->sisa_stok, $matches_y);
															$stok_y = isset($matches_y[1]) ? $matches_y[1] : '';
														?>
															<tr>
																<td><?= $k++ ?></td>
																<td><?= $row->tanggal_isi; ?></td>
																<td><?= $row->tanggal_cek_habis; ?></td>
																<td class="truncate" data-content="<?= htmlentities(nl2br($row->deskripsi)); ?>"><?= $row->deskripsi; ?></td>
																<td class="truncate" data-content="<?= htmlentities(nl2br($row->sisa_stok)); ?>"><?= $row->sisa_stok; ?></td>
																<td>
																	<button type="button" class="btn btn-success btn-sm btn-edit-log-tinta" 
																			data-toggle="modal" 
																			data-target="#tambahlogtintaModal"
																			data-idtinta="<?= $row->id; ?>" 
																			data-tanggal_isi="<?= $row->tanggal_isi; ?>" 
																			data-tanggal_cek_habis="<?= $row->tanggal_cek_habis; ?>" 
																			data-unit-pengguna="<?= trim($unit_pengguna); ?>" 
																			data-tinta-bk="<?= $tinta_bk; ?>" 
																			data-tinta-c="<?= $tinta_c; ?>" 
																			data-tinta-m="<?= $tinta_m; ?>" 
																			data-tinta-y="<?= $tinta_y; ?>" 
																			data-stok-bk="<?= $stok_bk; ?>" 
																			data-stok-c="<?= $stok_c; ?>" 
																			data-stok-m="<?= $stok_m; ?>" 
																			data-stok-y="<?= $stok_y; ?>" 
																			data-deskripsi="<?= $row->deskripsi; ?>" 
																			data-sisa_stok="<?= $row->sisa_stok; ?>">EDIT</button>
																	<button type="button" class="btn btn-danger btn-sm btn-delete" 
																			data-id-delete="<?= $row->id; ?>" 
																			data-tipe="Tinta" 
																			data-explain="<?= $row->deskripsi; ?>">DELETE</button>
																</td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- END LOG TINTA -->

								<!-- START DATA LEMBUR -->
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
											<div class="col-md-4">
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
								<!-- END DATA LEMBUR -->
							</div>
							<!-- END TAB TENGAH -->
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
												<option disabled>Pilih User</option>
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
					<div class="modal fade" id="tambahIpModal" tabindex="1" role="dialog" aria-labelledby="tambahIpModallabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title" id="tambahIpModallabel">Tambah IP</h3>
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
										<button type="submit" id="btnmodalip" class="btn btn-primary">Tambah IP</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Tambah Remote -->
					<div class="modal fade" id="tambahRemoteModal" tabindex="1" role="dialog" aria-labelledby="tambahRemoteModalLabel" aria-hidden="true">
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
										<button type="submit" id="btnmodalremote" class="btn btn-primary">Tambah Remote</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- MODAL TAMBAH LOG TINTA -->
					<div class="modal fade" id="tambahlogtintaModal" tabindex="1" role="dialog" aria-labelledby="tambahlogtintaLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title" id="tambahlogtintaModalLabel">Tambah Log Tinta</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<!-- Form Tambah LOG -->
								<div class="modal-body">
									<form action="<?= base_url('it/createLogTinta') ?>" method="post">
										<div id="formLogTintaModal">
											<div class="form-group">
												<select class="form-control" id="user_tinta" name="user_tinta" required>
													<option selected disabled>Pilih User</option>
													<?php foreach ($datauser as $row) : ?>
														<option value="<?= $row->NIK; ?>"><?= $row->Nama; ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="tanggal_isi">Tanggal Isi Stok</label>
													<input type="datetime-local" class="form-control" id="tanggal_isi" name="tanggal_isi" required>
												</div>
												<div class="form-group col-md-6">
													<label for="tanggal_cek_habis">Tanggal Habis</label>
													<input type="datetime-local" class="form-control" id="tanggal_cek_habis" name="tanggal_cek_habis" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<input type="text" class="form-control" id="unit_pengguna" name="unit_pengguna" placeholder="Unit / Pengguna" required>
												</div>
												<div class="form-group col-md-6" style="display: flex; justify-content: center;">
													<div class="checkbox-group">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="checkbox" id="tinta_black" name="tinta_black" value="BK">
															<label class="form-check-label" for="tinta_black">BK</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="checkbox" id="tinta_cyan" name="tinta_cyan" value="C">
															<label class="form-check-label" for="tinta_cyan">C</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="checkbox" id="tinta_magenta" name="tinta_magenta" value="M">
															<label class="form-check-label" for="tinta_magenta">M</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="checkbox" id="tinta_yellow" name="tinta_yellow" value="Y">
															<label class="form-check-label" for="tinta_yellow">Y</label>
														</div>
													</div>
												</div>
											</div>
											<label for="stok_black">STOK TINTA</label>
											<div class="form-row">
												<div class="form-group col-md-3">
													<label for="stok_black">Black</label>
													<input type="number" class="form-control" id="stok_black" name="stok_black" required>
												</div>
												<div class="form-group col-md-3">
													<label for="stok_cyan">Cyan</label>
													<input type="number" class="form-control" id="stok_cyan" name="stok_cyan" required>
												</div>
												<div class="form-group col-md-3">
													<label for="stok_magenta">Magenta</label>
													<input type="number" class="form-control" id="stok_magenta" name="stok_magenta" required>
												</div>
												<div class="form-group col-md-3">
													<label for="stok_yellow">Yellow</label>
													<input type="number" class="form-control" id="stok_yellow" name="stok_yellow" required>
												</div>
											</div>
											<button type="submit" class="btn btn-primary" id="btnmodallogtinta">Tambah Log Tinta</button>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>


					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

					<!-- search script -->
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
							$('#searchTinta').on('keyup', function() {
								var searchText = $(this).val().toLowerCase();
								$('#dataTable-LogTinta tbody tr').each(function() {
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

					<!-- tambah & edit script -->
					<script>
						$('#tambah-remote').click(function() {
							$('#tambahRemoteModalLabel').html('Tambah Remote')
							$('#formRemoteModal').find('#id').remove()
							$('#remoteaddr').val("")
							$('#tambahRemoteModal #name').val("")
						})
						$('#dataTable-Rmt').on('click', '.btn-edit-remote', function() {
							$('#formRemoteModal #id').remove()
							$('#remoteaddr').val($(this).attr('data-remote'))
							$('#tambahRemoteModal #name').val($(this).attr('data-nama'))
							$('#tambahRemoteModalLabel').html('Edit Remote')
							$('#btnmodalremote').html('Edit Remote')
							$(this).attr('data-remote')
							$('#formRemoteModal').append(`<input type="text" class="form-control mt-1 ipaddr" name="id" for="ipaddr" id="id" placeholder="Remote ADDRESS" value="${$(this).attr('data-id')}" hidden required>`)
						})
						$('#tambahlogdai').click(function() {
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
						$('.dataTable-Log').on('click', '.btn-edit-log', function() {
							$('#idlog').remove()
							$('#NIK').remove()
							$('#namalog').remove()
							$('#user').remove()
							$('#tanggal').val($(this).attr('data-tanggal'))
							$('#judul_act').val($(this).attr('data-judul_act'))
							$('#deskripsi_act').val($(this).attr('data-deskripsi_act'))
							$('#catatan').val($(this).attr('data-catatan'))
							$('#tambahlogdaiModalLabel').html('Edit LOG')
							$('#btnmodallog').html('Edit LOG')
							// $(this).attr('data-remote')
							// if ($('#formLogModal #idlog').length < 1 || $('#formLogModal #NIK').length < 1 || $('#formLogModal #namalog').length < 1) {
							$('#formLogModal').prepend(`
								<input type="text" class="form-control mt-1 idlog" name="id" for="idlog" id="idlog" value="${$(this).attr('data-idlog')}" required readonly>
								<input type="text" class="form-control mt-1 NIK" name="NIK" for="NIK" id="NIK" value="${$(this).attr('data-NIK')}" required readonly>
								<input type="text" class="form-control mt-1 nama" name="Nama" for="nama" id="namalog" value="${$(this).attr('data-namalog')}" required readonly>
								`)
							// }
						})

						$('#tambah-ip').click(function() {
							$('#tambahIpModallabel').html('Tambah IP')
							$('#formIpModal').find('#id-ipaddr').remove()
							$('#ipaddr').val("")
							$('#tambahIpModal #name').val("")
						})
						$('.btn-edit-ip').click(function() {
							$('#id-ipaddr').remove()
							$('#ipaddr').val($(this).attr('data-ipaddr'))
							$('#tambahIpModal #name').val($(this).attr('data-nama'))
							$('#tambahIpModallabel').html('Edit IP')
							$('#btnmodalip').html('Edit IP')
							$(this).attr('data-ipaddr')
							// if ($('#id-ipaddr').length < 1) {
							$('#formIpModal').prepend(`<input type="text" class="form-control mt-1 id-ipaddr" name="id-ipaddr" for="id-ipaddr" id="id-ipaddr" placeholder="IP ADDRess" value="${$(this).attr('data-idip')}" required readonly>`)
							// }
						})

						$('#tambahlogtinta').click(function() {
							$('#formLogTintaModal').find('#user_tinta').remove()
							if ($('#formLogTintaModal').find('#user_tinta').length === 0) {
								$('#formLogTintaModal').prepend(`
									<select class="form-control" id="user_tinta" name="user_tinta" required>
										<option selected disabled>Pilih User</option>
										<?php foreach ($datauser as $row) : ?>
											<option value="<?= $row->NIK; ?>"><?= $row->Nama; ?></option>
										<?php endforeach ?>
									</select>	
								`);
							}
							$('#tambahlogtintaModalLabel').html('Tambah LOG Tinta')
							$('#btnmodallogtinta').html('Tambah Log Tinta')
							$('#formLogTintaModal').find('#idtinta').remove()
							$('#formLogTintaModal').find('#NIKtinta').remove()
							$('#formLogTintaModal').find('#namatinta').remove()
							$('#user_tinta').val("")
							$('#tanggal_isi').val("")
							$('#tanggal_cek_habis').val("")
							$('#unit_pengguna').val("")
							$('#tinta_black').prop('checked', false)
							$('#tinta_cyan').prop('checked', false)
							$('#tinta_magenta').prop('checked', false)
							$('#tinta_yellow').prop('checked', false)
							$('#stok_black').val("")
							$('#stok_cyan').val("")
							$('#stok_magenta').val("")
							$('#stok_yellow').val("")
						})
						$('#dataTable-LogTinta').on('click', '.btn-edit-log-tinta', function() {
							$('#idtinta').remove()
							$('#NIKtinta').remove()
							$('#namatinta').remove()
							$('#user_tinta').remove()
							// $('#tanggal').val($(this).attr('data-tanggal'))
							$('#user_tinta').val("")
							$('#tanggal_isi').val($(this).attr('data-tanggal_isi'))
							$('#tanggal_cek_habis').val($(this).attr('data-tanggal_cek_habis'))
							$('#unit_pengguna').val($(this).attr('data-unit-pengguna'))
							$('#tinta_black').prop('checked', $(this).attr('data-tinta-bk') !== "");
							$('#tinta_cyan').prop('checked', $(this).attr('data-tinta-c') !== "");
							$('#tinta_magenta').prop('checked', $(this).attr('data-tinta-m') !== "");
							$('#tinta_yellow').prop('checked', $(this).attr('data-tinta-y') !== "");
							$('#stok_black').val($(this).attr('data-stok-bk'))
							$('#stok_cyan').val($(this).attr('data-stok-c'))
							$('#stok_magenta').val($(this).attr('data-stok-m'))
							$('#stok_yellow').val($(this).attr('data-stok-y'))
							$('#tambahlogtintaModalLabel').html('Edit Log Tinta')
							$('#btnmodallogtinta').html('Edit Log Tinta')
							$('#formLogTintaModal').prepend(`
								<input type="text" class="form-control mt-1 idtinta" name="idtinta" for="idtinta" id="idtinta" value="${$(this).attr('data-idtinta')}" required readonly>
								`)
						})
					</script>

					<!-- delete & tab script -->
					<script>
						$('.btn-delete').click(function() {
							if (confirm("Are you sure you want to delete this item?")) {
								const tipe = $(this).attr('data-tipe');
								const id = $(this).attr('data-id-delete');
								const explain = $(this).attr('data-explain');

								window.location.href = `<?php echo base_url('it/delete'); ?>${tipe}/${id}/${encodeURIComponent(explain)}`;
								// window.location.href = url;
							}
						});

						$('#btn-logdai').click(function() {
							if ($("#tabel_logdai").is(':hidden')) {
								$("#tabel_logdai").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
							}
						})
						$('#btn-rmtls').click(function() {
							if ($("#tabel_remote").is(':hidden')) {
								$("#tabel_remote").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
							}
						})
						$('#btn-ip').click(function() {
							if ($("#tabel_ip").is(':hidden')) {
								$("#tabel_ip").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
							}
						})
						$('#btn-lembur').click(function() {
							if ($("#tabel_data_lembur").is(':hidden')) {
								$("#tabel_data_lembur").prop('hidden', false);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
							}
						})
						$('#btn-logtinta').click(function() {
							if ($("#tabel_logtinta").is(':hidden')) {
								$("#tabel_logtinta").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
							}
						})
					</script>

					<!-- ++ print lembur script -->
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