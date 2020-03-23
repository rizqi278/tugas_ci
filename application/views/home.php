<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Siswa SMK Muhammadiyah</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container mt-5">

	<h2 class="mb-5 text-center">Data Siswa SMK Muhammadiyah</h2>

	<div class="text-center"><?php if($this->session->flashdata('status')){
		if($this->session->flashdata('status') == 0){
			echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('msg').'</div>';
		}else{
			echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('msg').'</div>';
		}
		}
	 ?></div>

<?php
$val_data = '<input type="hidden" name="cek" value="insert">';
$nama = 'value=""';
$kelas = 'value=""';
$jurusan = 'value=""';
$idi = '';
$submit = "Submit";
if(!empty(isset($_GET['edit']))){
    ?>
    <div class="text-center mb-5">
        <a href="<?php echo site_url('/'); ?>" class="btn btn-primary">Tutup Edit</a>
    </div>
    <?php
	$id = $_GET['edit'];
	$query = $this->db->get_where('siswa', array('id' => $id));
	if($query->num_rows()){
		$val_data = '<input type="hidden" name="cek" value="edit">';
		foreach($query->result() as $ntod){
			$kw = 'value="'.$ntod->nama.'"';
			$vol = 'value="'.$ntod->kelas.'"';
			$cpc = 'value="'.$ntod->jurusan.'"';
			$idi = '<input type="hidden" name="id" value="'.$ntod->id.'">';
			$submit = 'Update - '.$ntod->nama;
		}
	}
}

?>

	<form method="POST" action="">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" class="form-control" <?php echo $nama; ?> id="nama" name="nama">
		<small class="form-text text-muted">Nama.</small>
	</div>
	<div class="form-group">
		<label for="kelas">Kelas</label>
		<input type="number" class="form-control" <?php echo $kelas; ?> id="kelas" name="kelas">
		<small class="form-text text-muted">kelas.</small>
	</div>
	<div class="form-group">
		<label for="jurusan">Jurusan</label>
		<input type="text" class="form-control" <?php echo $jurusan; ?> id="jurusan" name="jurusan">
		<small class="form-text text-muted">jurusan.</small>
	</div>
	<?php echo $val_data; ?>
	<?php echo $idi; ?>
	<button type="submit" class="btn btn-primary"><?= $submit ?></button>
	</form>

	<table class="table mt-5 text-center mb-5">
		<thead class="thead-dark">
			<tr>
			<th scope="col">#</th>
			<th scope="col">Nama</th>
			<th scope="col">kelas</th>
			<th scope="col">jurusan</th>
			<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $query = $this->db->get('siswa');
		$i=1;
		foreach ($query->result() as $row){
		 ?>
			<tr>
			<th scope="row"><?php echo $i++; ?></th>
			<td><?php echo $row->nama ?></td>
			<td><?php echo number_format($row->kelas) ?></td>
			<td><?php echo $row->jurusan ?></td>
			<td><a href="?edit=<?php echo $row->id ?>" class="badge badge-primary mr-1">Edit</a> <a href="?del=<?php echo $row->id ?>" class="badge badge-danger ml-1">Delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="text-center text-dark bg-light sm p-3" style="border-top:1px solid #ddd">
		Copyright ® Rizqi Akbar 17.01.53.0004
	</div>
	<script type="text/javascript">
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
	</script>
</body>
</html>
