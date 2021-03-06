<div class="main-content" id="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 clear-padding-xs">
				<h5 class="page-title"><i class="fa fa-user"></i> Anggota Pasus</h5>


				<div class="section-divider">
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="dash-item">
							<div class="item-title">
								List Santri
							</div>


							<div class="inner-item">
								<table id="list-santri">
									<thead>
										<tr>
											<th scope="col">NIS</th>

											<th scope="col">Nama</th>

											<th scope="col">Alamat</th>

											<th scope="col">Angkatan</th>

											<th scope="col">Action</th>
										</tr>
									</thead>


									<tbody>
										<?php foreach ($dataPasus as $santri): ?>

										<tr>
											<td data-label="NIS"><?php echo $santri->nis ?>
											</td>

											<td data-label="Nama"><?php echo $santri->santri ?>
											</td>

											<td data-label="Alamat"><?php echo $santri->alamat ?>
											</td>

											<td data-label="Angkatan"><?php echo $santri->angkatan ?>
											</td>

											<td>
												<?php
												  $date = strtotime($santri->updated);
												  $now = date('W');
												  $curr = date("W", $date);

												  $disabled = ($now == $curr) ? "disabled" : "";
												?> 
												<a class="btn btn-default btn-sm <?php echo $disabled ?>" href="<?php echo base_url('pasus/edit/'.$santri->id) ?>"><i class="fa fa-pencil"></i> Edit</a>
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->