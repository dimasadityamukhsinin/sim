<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

if(isset($_GET['fil_bulan'])) {
	$fil_bulan_arr = explode('-', $_GET['fil_bulan']);
	$tahun = $fil_bulan_arr[0];
	$bulan = $fil_bulan_arr[1];
} else {
	//$bulan_txt = date("F");
	$bulan = date("m");
	$tahun = date("Y");	
}
$fil_bulan = $tahun.'-'.$bulan;

$hasil_arr = array();
foreach ($hasil_absen as $row) {
	$tgl = (int) substr($row->tanggal , 8, 2);
	$hasil_arr[$row->nip][$tgl] = array(
		'status_kehadiran' => $row->status_kehadiran
	);
}
?>
<div class="row">
	<div class="col-md-12">
		<div style="text-align: right;"> Pilih Bulan dan Tahun 
			<input type="text" placeholder="" id="fil_bulan" name="fil_bulan" class="form-control datepicker" style="width: 80px; display: inline;" value="<?php echo $fil_bulan; ?>">
		</div>
		<br>
		<div class="box box-solid" id="cetakArea">
			<div class="box-header with-border" align="center">
				<h3 class="box-title" style="padding : 10px 0px 15px 0px;"> Laporan Kehadiran Bulan <?php echo $bulan_txt." ".$tahun;  ?> </h3>
	
			<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table class="table table-bordered table-condensed table-striped table-responsive">
							<thead align="center">
								<tr align="center">
									<th> No </th>
									<th> Nama </th>
								<?php 
									for ($i=1; $i <= $tgl_akhir; $i++) { 
										echo "<th>".$i."</th>";
									}
								?>
									<th <?php echo "<td nowrap align = center>"; ?> Jml Hadir </th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
									foreach ($guru as $row) {
										$jml_hadir = 0;
										$ok = '<p class="text-green" title="Hadir"><b>H</b></p>';

										echo "<tr>";
										echo "	<td nowrap align = center>".$no."</td>";
										echo "	<td nowrap>".$row->nama_guru."</td>";

										for ($i=1; $i <= $tgl_akhir; $i++) {
											$txt = '';
											$kehadiran = @$hasil_arr[$row->nip][$i]['status_kehadiran'];
											if($kehadiran == "hadir") {
												$jml_hadir++;
												$txt = $ok;
											}
											if($kehadiran == "terlambat") {
												$jml_hadir++;
												$txt = '<p class="text-orange" title="Terlambat"><b>T</b></p>';
											}

											if(!$kehadiran) {
												$txt = '<p class="text-red" title="Alfa"><b>A</b></p>';
											}
											echo "	<td nowrap align = center>".$txt."</td>";
										}
										echo '	<td nowrap align = center>'.$jml_hadir.'</td>';

										echo "</tr>";
										$no++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<div align="center">
			<input type="button" class="btn btn-primary" onclick="printDiv('cetakArea')" value="Cetak" target="_blank" />
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col (left) -->
	
	<!-- /.col (right) -->
</div>
<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>