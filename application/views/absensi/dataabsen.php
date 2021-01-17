<?php 
if (!empty($this->session->flashdata('error'))){
echo '<div class="alert alert-danger">';
echo $this->session->flashdata('error');
echo '</div>';
}
if (!empty($this->session->flashdata('sukses'))){
echo '<div class="alert alert-success">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
		<!-- /.card-header -->
			<div class="card-body">
				<table id="table_data" class="table table-bordered table-hover" border="1" width="100%">
					<thead>
						<tr>
							<th width="75px">NIP</th>
							<th width="150px">Nama Pegawai</th>
							<th width="75px">Jam Masuk</th>
							<th width="75px">Jam Keluar</th>
							<th width="75px">Status</th>
							<?php
							    if ($_SESSION["logged_in"]["role"]=="Waka Kurikulum"){
							?>
							<th width="75px">Aksi</th>
							<?php
							    }
							?>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		<!-- /.card-body -->
		</div>
	</div>
</div>
<style>
#table_data tbody tr{
  cursor:pointer;
}
</style>
