<?php
include"config.php";
?>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" href="css/css.css">
</head>
<body>
	<div class="wraper" id="title-id">
		<div class="title">
			Tutorial Crud
		</div>
		<div class="sidebar-left">
			<div class="card">
				<form class="form" action="aksi.php" method="POST">
				<h3>INPUT</h3>
					<input type="text"   name="nama" placeholder="Nama Siswa" class="input" required><br>
					<input type="number" name="umur" placeholder="Umur" class="input" required><br>
					<input type="number" name="kelas" placeholder="Kelas" class="input" required><br>

					<input type="submit" name="tambah" value="SIMPAN DATA" class="btn">
				</form>
			</div>
			<!--  -->
			<div class="card" style="margin-top:20px">
				<form class="form" action="aksi.php" method="POST" enctype="multipart/form-data">
				<h3>INSERT MASAL</h3>
					<input type="file" name="data"><br><br>
					<input type="submit" name="masal" value="INSERT" class="btn btn-primary mt-3">
				</form>
			</div>

			<!--  -->
			<div class="card" style="margin-top:20px">
				<form class="form">
				<h3>EXPORT</h3>
					<a href="export/to_excel.php" class="link-a">Export to excel</a>
				</form>
			</div>
		</div>
		<div class="sidebar-rigth">
			<div style="padding:20px;">
				<span style="font-size:20px;">DATA SISWA</span>
				<table class="table1">
					<tr>
						<th width="5%">No</th>
						<th width="40%">Nama</th>
						<th width="20%">Usia</th>
						<th width="10%">Kelas</th>
						<th width="30%">Aksi</th>
					</tr>
					<?php
						$sql = "SELECT * FROM siswa";
						$run = mysql_query($sql);
						while ($siswa = mysql_fetch_array($run)) {
							$no++;
					?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $siswa['nama']; ?></td>
								<td><?php echo $siswa['umur']; ?> Tahun</td>
								<td><?php echo $siswa['kelas']; ?></td>
								<td>
									<a href="ubah.php?id=<?=$siswa['id']?>" class="aksi green">Ubah</a>
									<a href="aksi.php?act=hapus&id=<?=$siswa['id']?>" class="aksi red">Hapus</a>
								</td>
							</tr>
					<?php }$no=0; ?>
				</table>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
