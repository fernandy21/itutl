<style>
	.truncate {
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 10rem;
	}

	canvas {
		display: block;
		max-width: 100%;
		height: auto !important;
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
										<?php if (!$isAtem): ?>
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
										<?php endif; ?>
										<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-monit-ruangan" type="button">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span class="btn-inner--text"> Monit Ruang</span>
										</button>
										<br><a class="btn btn-icon mb-3 btn-3 btn-success btn-sm" href="<?= base_url('') ?>">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span>Dashboard</span>
										</a>
										<br><a class="btn btn-icon mb-3 btn-3 btn-danger btn-sm" href="<?= base_url('logout') ?>">
											<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
											<span>Logout</span>
										</a>
									</div>
								</div>
							</div>
							<!-- END TAB KIRI -->

							<!-- START TAB TENGAH -->
							<div class="col-md-10" id="adminit">
								<?php if (!$isAtem): ?>
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
								<div id="tabel_logtinta" hidden>
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
														<?php $k = 1;
														foreach ($tinta as $row) :
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
																	<button type="button" class="btn btn-success btn-sm btn-edit-log-tinta" data-toggle="modal" data-target="#tambahlogtintaModal" data-idtinta="<?= $row->id; ?>" data-tanggal_isi="<?= $row->tanggal_isi; ?>" data-tanggal_cek_habis="<?= $row->tanggal_cek_habis; ?>" data-unit-pengguna="<?= trim($unit_pengguna); ?>" data-tinta-bk="<?= $tinta_bk; ?>" data-tinta-c="<?= $tinta_c; ?>" data-tinta-m="<?= $tinta_m; ?>" data-tinta-y="<?= $tinta_y; ?>" data-stok-bk="<?= $stok_bk; ?>" data-stok-c="<?= $stok_c; ?>" data-stok-m="<?= $stok_m; ?>" data-stok-y="<?= $stok_y; ?>" data-deskripsi="<?= $row->deskripsi; ?>" data-sisa_stok="<?= $row->sisa_stok; ?>">EDIT</button>
																	<button type="button" class="btn btn-danger btn-sm btn-delete" data-id-delete="<?= $row->id; ?>" data-tipe="Tinta" data-explain="<?= $row->deskripsi; ?>">DELETE</button>
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
								<?php endif; ?>


								<!-- START MONIT -->
								<div id="monit_ruangan">
									<h2 class="mt-3">Data Ruangan</h2>
									<div class="row">
										<?php if (isset($ruangan) && is_array($ruangan)): ?>
											<?php foreach ($ruangan as $r): ?>
												<div class="card" style="width: 22rem; margin: 10px;">
													<div class="card-body">
														<h3 class="card-title"><?php echo htmlspecialchars($r['nm_ruangan']); ?></h3>
														<p id="temp_<?= $r['id_ruangan']; ?>"><strong>Suhu Sekarang:</strong> <span><?php echo htmlspecialchars($r['actual_temperature']); ?></span></p>
														<p id="humid_<?= $r['id_ruangan']; ?>"><strong>Kelembapan Sekarang:</strong> <span><?php echo htmlspecialchars($r['actual_humidity']); ?></span></p>
														<p><strong>Weighted Temperature:</strong> <?php echo htmlspecialchars($r['weighted_temperature']); ?></p>
														<p><strong>Weighted Humidity:</strong> <?php echo htmlspecialchars($r['weighted_humidity']); ?></p>
														<div class="d-flex justify-content-between">
															<button type="button" class="btn btn-primary btn-sm" onclick="showDetail(<?php echo $r['id_ruangan']; ?>)" data-namaruangan="<?php echo htmlspecialchars($r['nm_ruangan']); ?>">Detail</button>
															<button type="button" class="btn btn-success btn-sm" onclick="refreshruangan(<?php echo $r['id_ruangan']; ?>)">Refresh</button>
															<button type="button" class="btn btn-info btn-sm" onclick="kalibrasi(<?php echo $r['id_ruangan']; ?>)" data-namaruangan="<?php echo htmlspecialchars($r['nm_ruangan']); ?>" data-wt="<?php echo htmlspecialchars($r['wt']); ?>" data-wh="<?php echo htmlspecialchars($r['wh']); ?>">Kalibrasi</button>
															<button type="button" class="btn btn-info btn-sm" onclick="jadwalsample(<?php echo $r['id_ruangan']; ?>, '<?php echo htmlspecialchars($r['nm_ruangan']); ?>')">Sampling</button><br>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										<?php else: ?>
											<p>No data available.</p>
										<?php endif; ?>
									</div>
								</div>
								<div id="detail_ruangan"hidden>
									<h2 class="mt-3" id="headdetailruangan"></h2>
									<button class="btn btn-icon mb-3 btn-3 btn-primary btn-sm" id="btn-filterform" type="button">Filter</button>
									<form id="filterForm" hidden>
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="startDate">Start Date</label>
												<input type="date" class="form-control" id="startDate" name="startDate" required>
											</div>
											<div class="form-group col-md-4">
												<label for="endDate">End Date</label>
												<input type="date" class="form-control" id="endDate" name="endDate" required>
											</div>
											<div class="form-group col-md-4 align-self-end">
												<button type="button" class="btn btn-primary" onclick="refreshShowDetail()">Filter</button>
											</div>
										</div>
									</form>

									<h4>Suhu</h4>
									<canvas id="temperatureChart" width="400" height="100"></canvas>
									<h4>Kelembapan</h4>
									<canvas id="humidityChart" width="400" height="100"></canvas><br>
									<button type="button" class="btn btn-primary" id="btn-ok-detail">OK</button>
								</div>
								<!-- END MONIT -->
							</div>
							<!-- END TAB TENGAH -->
						</div>
					</div>

					<?php if (!$isAtem): ?>
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
					<?php endif; ?>

					<!-- Modal kalibrasi -->
					<div class="modal fade" id="kalibrasiModal" tabindex="-1" role="dialog" aria-labelledby="kalibrasiModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="kalibrasiModalLabel">Kalibrasi Ruangan</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form id="kalibrasiForm">
										<div class="form-group">
											<label for="kalibrasiSuhu">Kalibrasi Suhu</label>
											<input type="text" class="form-control" id="kalibrasiSuhu">
										</div>
										<div class="form-group">
											<label for="kalibrasiKelembapan">Kalibrasi Kelembapan</label>
											<input type="text" class="form-control" id="kalibrasiKelembapan">
										</div>
										<input type="hidden" id="idRuangan">
										<input type="hidden" id="nmRuangan">
										<button type="button" class="btn btn-primary" onclick="submitKalibrasi()">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal CU Jadwal Monit -->
					<div class="modal fade" id="JadwalMonit" tabindex="-1" role="dialog" aria-labelledby="JadwalMonitLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="JadwalMonitLabel">Jadwal Monitoring</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" id="cuJadwalMonit">
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Jadwal Monit -->
					<div class="modal fade" id="JadwalSample" tabindex="-1" role="dialog" aria-labelledby="JadwalSampleLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="JadwalSampleLabel">Jadwal Monitoring</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" id="body-modal-jadwal-monit"></div>
							</div>
						</div>
					</div>

					<!-- Modal Konfirmasi -->
					<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="confirmLabel">Konfirmasi Penghapusan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body" id="body-modal-konfirmasi">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
								<button type="button" class="btn btn-danger" id="confirmBtn">IYA BANGET</button>
							</div>
							</div>
						</div>
					</div>

					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@latest/dist/chartjs-plugin-annotation.min.js"></script>

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

					<!-- tab script -->
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
								$("#monit_ruangan").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-rmtls').click(function() {
							if ($("#tabel_remote").is(':hidden')) {
								$("#tabel_remote").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
								$("#monit_ruangan").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-ip').click(function() {
							if ($("#tabel_ip").is(':hidden')) {
								$("#tabel_ip").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
								$("#monit_ruangan").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-lembur').click(function() {
							if ($("#tabel_data_lembur").is(':hidden')) {
								$("#tabel_data_lembur").prop('hidden', false);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
								$("#monit_ruangan").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-logtinta').click(function() {
							if ($("#tabel_logtinta").is(':hidden')) {
								$("#tabel_logtinta").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#monit_ruangan").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-monit-ruangan').click(function() {
							if ($("#monit_ruangan").is(':hidden')) {
								$("#monit_ruangan").prop('hidden', false);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
								$("#detail_ruangan").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-ok-detail').click(function() {
							if ($("#monit_ruangan").is(':hidden')) {
								$("#monit_ruangan").prop('hidden', false);
								$("#detail_ruangan").prop('hidden', true);
								$("#tabel_data_lembur").prop('hidden', true);
								$("#tabel_ip").prop('hidden', true);
								$("#tabel_logdai").prop('hidden', true);
								$("#tabel_remote").prop('hidden', true);
								$("#tabel_logtinta").prop('hidden', true);
								$("#filterForm").prop('hidden', true);
							}
						})
						$('#btn-filterform').click(function() {
							if ($("#filterForm").is(':hidden')) {
								$("#filterForm").prop('hidden', false);
								$("#btn-filterform").prop('hidden', true);
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

					<!-- Script api monit -->
					<script>
						let temperatureChartInstance = null;
						let humidityChartInstance = null;

						function showDetail(idRuangan) {
							var namaRuangan = event.target.getAttribute('data-namaruangan');
							document.getElementById('headdetailruangan').textContent = namaRuangan;
							$.ajax({
								url: "<?php echo base_url('it'); ?>",
								type: 'POST',
								data: {
									type: 'id',
									data: idRuangan
								},
								dataType: 'json',
								success: function(response) {
									if (response.success) {
										const timestamps = response.data.map(item => item.timestamp);
										const temperatures = response.data.map(item => item.temp);
										const humidities = response.data.map(item => item.humid);

										const lastDataPoint = response.data[response.data.length - 1];
										const lasttemperature = lastDataPoint.temp;
										const lasthumidity = lastDataPoint.humid;
										console.log(timestamps, temperatures, humidities);

										if (temperatureChartInstance) {
											temperatureChartInstance.destroy();
										}
										if (humidityChartInstance) {
											humidityChartInstance.destroy();
										}

										const isTempOutOfRange = lasttemperature < 18 || lasttemperature > 27;
										const isHumidityOutOfRange = lasthumidity < 45 || lasthumidity > 50;

										const ctxTemp = document.getElementById('temperatureChart').getContext('2d');
										temperatureChartInstance = new Chart(ctxTemp, {
											type: 'line',
											data: {
												labels: timestamps,
												datasets: [{
													label: 'Temperatur Ruangan',
													data: temperatures,
													borderColor: isTempOutOfRange ? 'rgba(255, 99, 132, 1)' : 'rgba(54, 162, 235, 1)',
													backgroundColor: isTempOutOfRange ? 'rgba(255, 99, 132, 0.2)' : 'rgba(54, 162, 235, 0.2)',
													borderWidth: 1
												}]
											},
											options: {
												maintainAspectRatio: true,
												scales: {
													x: {
														title: {
															display: true,
															text: 'Timestamp'
														}
													},
													y: {
														title: {
															display: true,
															text: 'Temperature (°C)'
														},
														suggestedMin: 0,
														suggestedMax: 40,
														grid: {
															borderColor: isTempOutOfRange ? 'rgba(255, 99, 132, 0.2)' : 'rgba(54, 162, 235, 0.2)',
														}
													}
												}
											}
										});

										if (isTempOutOfRange) {
											const existingTempNotification = document.querySelector('.temp-notification');
											if (existingTempNotification) {
												existingTempNotification.remove();
											}

											const tempNotification = document.createElement('div');
											tempNotification.className = 'alert alert-danger temp-notification';
											tempNotification.setAttribute('role', 'alert');
											tempNotification.innerText = 'Temperature di luar batas aman menurut ISO 27001 (18°C–27°C)';
											document.getElementById('temperatureChart').insertAdjacentElement('afterend', tempNotification);
										}

										const ctxHumid = document.getElementById('humidityChart').getContext('2d');
										humidityChartInstance = new Chart(ctxHumid, {
											type: 'line',
											data: {
												labels: timestamps,
												datasets: [{
													label: 'Humidity Ruangan',
													data: humidities,
													borderColor: isHumidityOutOfRange ? 'rgba(255, 99, 132, 1)' : 'rgba(75, 192, 192, 1)',
													backgroundColor: isHumidityOutOfRange ? 'rgba(255, 99, 132, 0.2)' : 'rgba(75, 192, 192, 0.2)',
													borderWidth: 1
												}]
											},
											options: {
												maintainAspectRatio: true,
												scales: {
													x: {
														title: {
															display: true,
															text: 'Timestamp'
														}
													},
													y: {
														title: {
															display: true,
															text: 'Humidity (%)'
														},
														suggestedMin: 0,
														suggestedMax: 100,
														grid: {
															borderColor: isHumidityOutOfRange ? 'rgba(255, 99, 132, 0.2)' : 'rgba(75, 192, 192, 0.2)',
														}
													}
												}
											}
										});

										if (isHumidityOutOfRange) {
											const existingHumidNotification = document.querySelector('.humid-notification');
											if (existingHumidNotification) {
												existingHumidNotification.remove();
											}

											const humidNotification = document.createElement('div');
											humidNotification.className = 'alert alert-danger humid-notification';
											humidNotification.setAttribute('role', 'alert');
											humidNotification.innerText = 'Kelembapan di luar batas aman menurut ISO 27001 (45%–50%)';
											document.getElementById('humidityChart').insertAdjacentElement('afterend', humidNotification);
										}

										$("#detail_ruangan").prop('hidden', false);
										$("#monit_ruangan").prop('hidden', true);
									} else {
										alert('Failed to retrieve data.');
									}
								},
								error: function(xhr, status, error) {
									console.error('AJAX error: ', status, error);
									alert('An error occurred while retrieving the data.');
								}
							});
						}
					</script>
					<script>
						function refreshShowDetail() {
							const startDate = document.getElementById('startDate').value;
							const endDate = document.getElementById('endDate').value;

							if (!startDate || !endDate) {
								alert('Please select both start and end dates.');
								return;
							}
							if (startDate > endDate) {
								alert("Start Date tidak boleh lebih besar dari End Date.");
								return;
							}
							$.ajax({
								url: "<?php echo DEFINED_URL('filterByDate'); ?>",
								type: 'POST',
								contentType: 'application/json',
								data: JSON.stringify({
									startDate: startDate,
									endDate: endDate
								}),
								dataType: 'json',
								success: function(response) {
									if (response) {
										const timestamps = response.map(item => item.timestamp);
										const temperatures = response.map(item => item.temp);
										const humidities = response.map(item => item.humid);

										if (temperatureChartInstance) {
											temperatureChartInstance.destroy();
										}
										const ctxTemp = document.getElementById('temperatureChart').getContext('2d');
										temperatureChartInstance = new Chart(ctxTemp, {
											type: 'line',
											data: {
												labels: timestamps,
												datasets: [{
													label: 'Temperatur Ruangan',
													data: temperatures,
													borderColor: 'rgba(54, 162, 235, 1)',
													backgroundColor: 'rgba(54, 162, 235, 0.2)',
													borderWidth: 1
												}]
											},
											options: {
												maintainAspectRatio: true,
												scales: {
													x: {
														title: {
															display: true,
															text: 'Timestamp'
														}
													},
													y: {
														title: {
															display: true,
															text: 'Temperature (°C)'
														},
														suggestedMin: 0,
														suggestedMax: 40
													}
												}
											}
										});

										if (humidityChartInstance) {
											humidityChartInstance.destroy();
										}
										const ctxHumid = document.getElementById('humidityChart').getContext('2d');
										humidityChartInstance = new Chart(ctxHumid, {
											type: 'line',
											data: {
												labels: timestamps,
												datasets: [{
													label: 'Humidity Ruangan',
													data: humidities,
													borderColor: 'rgba(75, 192, 192, 1)',
													backgroundColor: 'rgba(75, 192, 192, 0.2)',
													borderWidth: 1
												}]
											},
											options: {
												maintainAspectRatio: true,
												scales: {
													x: {
														title: {
															display: true,
															text: 'Timestamp'
														}
													},
													y: {
														title: {
															display: true,
															text: 'Humidity (%)'
														},
														suggestedMin: 0,
														suggestedMax: 100
													}
												}
											}
										});

									} else {
										alert('Failed to retrieve filtered data.');
									}
								},
								error: function(xhr, status, error) {
									console.error('AJAX error: ', status, error);
									alert('An error occurred while retrieving the filtered data.');
								}
							});
						}
					</script>

					<!-- kalibrasi dan monit -->
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
					<script>
						function refreshruangan(id_ruangan) {
							console.log('ini adalah id ruangan : ', id_ruangan);

							$.ajax({
								url: '<?= DEFINED_URL('getTempNow') ?>/'+ id_ruangan,
								method: 'GET',
								success: function(response) {
									$('#temp_' + id_ruangan + ' span').text(response.actual_temperature);
									$('#humid_' + id_ruangan + ' span').text(response.actual_humidity);
									alert('Data sudah di-refresh');
								},
								error: function(xhr, status, error) {
									console.error('Failed to refresh data:', error);
									alert('Failed to refresh data.');
								}
							});
						}

						function kalibrasi(id_ruangan) {
							var button = $(event.target);
							var nm_ruangan = button.data('namaruangan');
							var wt = button.data('wt');
							var wh = button.data('wh');

							$('#idRuangan').val(id_ruangan);
							$('#nmRuangan').val(nm_ruangan);
							$('#kalibrasiSuhu').val(wt);
							$('#kalibrasiKelembapan').val(wh);
							$('#kalibrasiModal').modal('show');
						}

						function submitKalibrasi() {
							var id_ruangan = $('#idRuangan').val();
							var nm_ruangan = $('#nmRuangan').val();
							var wt = $('#kalibrasiSuhu').val();
							var wh = $('#kalibrasiKelembapan').val();

							$.ajax({
								url: '<?= DEFINED_URL('update-monit-ruangan') ?>',
								method: 'POST',
								contentType: 'application/json',
								data: JSON.stringify({
									id_ruangan: id_ruangan,
									data: {
										nm_ruangan: nm_ruangan,
										wt: wt,
										wh: wh
									}
								}),
								success: function(response) {
									$('#temp_' + id_ruangan).text(response.actual_temperature);
									$('#humid_' + id_ruangan).text(response.actual_humidity);
									$('#kalibrasiModal').modal('hide');
									alert('Data sudah update / data terupdate');
								},
								error: function(xhr, status, error) {
									console.error('Kalibrasi failed:', error);
								}
							});
						}
					</script>

					<!-- sampling monit -->
					<script>
						function jadwalsample(id_ruangan, nm_ruangan) {
							$.ajax({
								url: '<?= DEFINED_URL('getJadwalMonitoring') ?>/' + id_ruangan,
								method: 'GET',
								success: function(response) {
									$('#body-modal-jadwal-monit').empty();
									if (Array.isArray(response)) {
										response.forEach(function(jadwal) {
											var container = $('<div></div>').css({'display': 'inline-block','margin-bottom': '10px','width': '100%'});
											var jadwalElement = $('<p></p>').attr('id', 'jadwal-sampling-' + jadwal.id_jadwal).css({'display': 'inline-block','margin-right': '10px'}).html('<strong>' + jadwal.waktu_sampling + '</strong>');
											var deleteButton = $('<button></button>').attr('type', 'button').attr('id', 'dJadwalMonit-' + id_ruangan).addClass('btn btn-danger btn-sm').css({'display': 'inline-block','margin-right': '10px'}).text('Hapus Jadwal').data({'id-jadwal': jadwal.id_jadwal,'id-ruangan': id_ruangan,'waktu-jadwal': jadwal.waktu_sampling}).on('click', function() {dJadwalSampling(jadwal.id_jadwal, id_ruangan);});
											var editButton = $('<button></button>').attr('type', 'button').attr('id', 'uJadwalMonit-' + id_ruangan).addClass('btn btn-success btn-sm').css({'display': 'inline-block'}).text('Edit Jadwal').data({'id-jadwal': jadwal.id_jadwal,'id-ruangan': id_ruangan,'waktu-jadwal': jadwal.waktu_sampling}).on('click', function() {uJadwalSampling(jadwal.id_jadwal, id_ruangan, jadwal.waktu_sampling);});

											container.append(jadwalElement);
											container.append(deleteButton);
											container.append(editButton);

											$('#body-modal-jadwal-monit').append(container);
										});

										var createButton = $('<button></button>').attr('type', 'button').attr('id', 'cJadwalMonit-' + id_ruangan).addClass('btn btn-info btn-sm').css({'display': 'block','margin-top': '10px'}).text('Buat Jadwal').on('click', function() {cJadwalSampling(id_ruangan, nm_ruangan);});
										$('#body-modal-jadwal-monit').append(createButton);
									} else {
										$('#body-modal-jadwal-monit').append('<p>No schedule available for this room.</p>');
									}
									$('#JadwalSample').modal('show');
								},
								error: function(xhr, status, error) {
									console.error('Failed to refresh data:', error);
									alert('Failed to refresh data.');
								}
							});
						}
						
						function dJadwalSampling(id_jadwal, id_ruangan) {
							$('#JadwalSample').modal('hide');
							$('#body-modal-konfirmasi').empty();
							$('#body-modal-konfirmasi').append('<h1">Beneran dihapus jadwalnya?</h1>');
							setTimeout(function() {
								$('#confirmModal').modal('show');
							}, 500);
							$('#confirmBtn').off('click').on('click', function() {
								$.ajax({
									url: '<?= DEFINED_URL('deleteJadwal') ?>',
									method: 'POST',
									contentType: 'application/json',
									data: JSON.stringify({
										id_jadwal: id_jadwal
									}),
									success: function(response) {
										console.log('ini adalah id jadwal : ' + id_jadwal);
										console.log('ini adalah id ruangan : ' + id_ruangan);

										alert('Data sudah terhapus');
										refreshJadwalSampling(id_ruangan);
										$('#confirmModal').modal('hide');
										setTimeout(function() {
											$('#JadwalSample').modal('show');
										}, 500);
									},
									error: function(xhr, status, error) {
										console.error('Update failed:', error);
										alert('Penghapusan gagal. Silakan coba lagi.');
									}
								});
							});
						}

						function uJadwalSampling(id_jadwal, id_ruangan, waktu_jadwal) {
							$('#cuJadwalMonit').empty();
							var monit = $('#cuJadwalMonit').append(`<form id="JadwalMonit">
										<div class="form-group">
											<input type="text" class="form-control" id="WaktuJadwalMonit" value="` + waktu_jadwal + `">
										</div>
										<input type="hidden" class="form-control" id="id_JadwalMonit" value="` + id_jadwal + `">
										<input type="hidden" class="form-control" id="id_ruangan" value="` + id_ruangan + `">
										<button type="button" class="btn btn-primary" onclick="UsubmitUJadwal()">Submit</button>
									</form>`)

							console.log('ini id_jadwal : ' + id_jadwal);
							console.log('ini id_ruangan : ' + id_ruangan);
							console.log('ini jadwal : ' + waktu_jadwal);

							$('#JadwalSample').modal('hide');
							setTimeout(function() {
								$('#JadwalMonit').modal('show');
							}, 500);
						}

						function UsubmitUJadwal() {
							var id_jadwal = $('#id_JadwalMonit').val();
							var waktu_jadwal = $('#WaktuJadwalMonit').val();
							var id_ruangan = $('#id_ruangan').val();
							console.log('ini id_jadwal : ' + id_jadwal);
							console.log('ini id_ruangan : ' + id_ruangan);
							console.log('ini jadwal : ' + waktu_jadwal);


							$('#body-modal-konfirmasi').empty();
							$('#body-modal-konfirmasi').append('<h1">Beneran di-Update jadwalnya?</h1>');
							setTimeout(function() {
								$('#confirmModal').modal('show');
							}, 500);
							$('#confirmBtn').off('click').on('click', function() {
								$.ajax({
									url: '<?= DEFINED_URL('updateJadwal') ?>',
									method: 'POST',
									contentType: 'application/json',
									data: JSON.stringify({
										id_jadwal: id_jadwal,
										waktu : waktu_jadwal
									}),
									success: function(response) {
										alert('Data sudah update / data terupdate');
										refreshJadwalSampling(id_ruangan);
										$('#confirmModal').modal('hide');
										$('#JadwalMonit').modal('hide');
										setTimeout(function() {
											$('#JadwalSample').modal('show');
										}, 500);
									},
									error: function(xhr, status, error) {
										console.error('Update failed:', error);
									}
								});
							});
						}

						function cJadwalSampling(id_ruangan, nm_ruangan) {
							$('#cuJadwalMonit').empty();
							var monit = $('#cuJadwalMonit').append(`<form id="JadwalMonit">
										<input type="hidden" class="form-control" id="id_ruangan" value="` + id_ruangan + `">
										<input type="text" class="form-control" id="nm_ruangan" value="` + nm_ruangan + `" disabled>
										<input type="time" class="form-control" id="WaktuJadwalMonit" step="1">
										<button type="button" class="btn btn-primary" onclick="CsubmitUJadwal()">Submit</button>
									</form>`)

							$('#JadwalSample').modal('hide');
							setTimeout(function() {
								$('#JadwalMonit').modal('show');
							}, 500);
						}

						function CsubmitUJadwal() {
							var waktu_jadwal = $('#WaktuJadwalMonit').val();
							var id_ruangan = $('#id_ruangan').val();


							$('#body-modal-konfirmasi').empty();
							$('#body-modal-konfirmasi').append('<h1">Jadwalnya sudah benar?</h1>');
							setTimeout(function() {
								$('#confirmModal').modal('show');
							}, 500);
							$('#confirmBtn').off('click').on('click', function() {
								$.ajax({
									url: '<?= DEFINED_URL('addJadwal') ?>',
									method: 'POST',
									contentType: 'application/json',
									data: JSON.stringify({
										id_item: id_ruangan,
										waktu : waktu_jadwal
									}),
									success: function(response) {
										alert('Data sudah ditambahkan');
										refreshJadwalSampling(id_ruangan);
										$('#confirmModal').modal('hide');
										$('#JadwalMonit').modal('hide');
										setTimeout(function() {
											$('#JadwalSample').modal('show');
										}, 500);
									},
									error: function(xhr, status, error) {
										console.error('Update failed:', error);
									}
								});
							});
						}

						function refreshJadwalSampling(id_ruangan) {
							$.ajax({
								url: '<?= DEFINED_URL('getJadwalMonitoring') ?>/' + id_ruangan,
								method: 'GET',
								success: function(response) {
									$('#body-modal-jadwal-monit').empty();
									if (Array.isArray(response)) {
										response.forEach(function(jadwal) {
											var container = $('<div></div>').css({'display': 'inline-block','margin-bottom': '10px','width': '100%'});
											var jadwalElement = $('<p></p>').attr('id', 'jadwal-sampling-' + jadwal.id_jadwal).css({'display': 'inline-block','margin-right': '10px'}).html('<strong>' + jadwal.waktu_sampling + '</strong>');
											var deleteButton = $('<button></button>').attr('type', 'button').attr('id', 'dJadwalMonit-' + id_ruangan).addClass('btn btn-danger btn-sm').css({'display': 'inline-block','margin-right': '10px'}).text('Hapus Jadwal').data({'id-jadwal': jadwal.id_jadwal,'id-ruangan': id_ruangan,'waktu-jadwal': jadwal.waktu_sampling}).on('click', function() {dJadwalSampling(jadwal.id_jadwal, id_ruangan);});
											var editButton = $('<button></button>').attr('type', 'button').attr('id', 'uJadwalMonit-' + id_ruangan).addClass('btn btn-success btn-sm').css({'display': 'inline-block'}).text('Edit Jadwal').data({'id-jadwal': jadwal.id_jadwal,'id-ruangan': id_ruangan,'waktu-jadwal': jadwal.waktu_sampling}).on('click', function() {uJadwalSampling(jadwal.id_jadwal, id_ruangan);});

											container.append(jadwalElement);
											container.append(deleteButton);
											container.append(editButton);

											$('#body-modal-jadwal-monit').append(container);
										});

										var createButton = $('<button></button>').attr('type', 'button').attr('id', 'cJadwalMonit-' + id_ruangan).addClass('btn btn-info btn-sm').css({'display': 'block','margin-top': '10px'}).text('Buat Jadwal').on('click', function() {cJadwalSampling(id_ruangan);});
										$('#body-modal-jadwal-monit').append(createButton);
									} else {
										$('#body-modal-jadwal-monit').append('<p>No schedule available for this room.</p>');
									}
								},
								error: function(xhr, status, error) {
									console.error('Failed to refresh jadwal sampling:', error);
									alert('Terjadi kesalahan saat merefresh data jadwal sampling.');
								}
							});
						}
					</script>