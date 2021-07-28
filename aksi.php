<?php
	include"config.php";
	if(isset($_POST['tambah'])){
		$nama  = $_POST['nama'];
		$umur  = $_POST['umur'];
		$kelas = $_POST['kelas'];

		$sql   = "INSERT INTO siswa VALUES('','$nama','$umur','$kelas')";
		$run   = mysql_query($sql);
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal insert data!";
		}
		//tambah data
	}elseif(isset($_POST['ubah'])){
		$nama  = $_POST['nama'];
		$umur  = $_POST['umur'];
		$kelas = $_POST['kelas'];
		$id    = $_POST['id'];

		$sql   = "UPDATE siswa SET nama='$nama', umur='$umur', kelas='$kelas' WHERE id='$id'";
		$run   = mysql_query($sql);
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal di ubah...";
		}
	}

	if(isset($_POST['masal'])){

		$datanama  =  $_FILES['data']['name'];
		$datatmp   =  $_FILES['data']['tmp_name'];	
		$exe       =  pathinfo($datanama, PATHINFO_EXTENSION);
		$folder    = 'file/';
         
		if($exe=='csv'){
			$upload = move_uploaded_file($datatmp, $folder.$datanama);
			if($upload){
				$open = fopen($folder.$datanama, 'r');
				while (($row = fgetcsv($open, 1000, ','))!==FALSE ) {
					    $sql = mysql_query("INSERT INTO siswa 
					    VALUES('','".$row[0]."','".$row[1]."','".$row[2]."') ")or die(mysql_error());

				}
				header('location: index.php');
			}else{
				echo "<script>alert('Gagal diupload')</script>";
				header('location: index.php');
			}
		}else{
			echo "<script>alert('Bukan File CSV')</script>";
			header('location: index.php');
		}

	}

	if($_GET['act']=='hapus'){
		$id = $_GET['id'];

		$sql = "DELETE FROM siswa WHERE id='$id'";
		$run = mysql_query($sql);
		if($run){
			header('location: index.php');
		}else{
			echo "Gagal dihapus!";
		}

	}
?>
