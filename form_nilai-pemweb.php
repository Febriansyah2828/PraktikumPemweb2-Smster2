<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        background-color: lightgreen;

    }
    h3 {
        display: flex;
        justify-content: center;
    }
</style>
</head>
<body>

<h3> FORM NILAI MAHASISWA </h3>
<hr> 
<?php
$ar_matkul =[
    "DDP" => "Dasar-Dasar Pemrograman",
    "WEB1" => "Pemrograman Web 1",
    "WEB2" => "Pemrograman Web 2",
    "SB" => "Statistika dan Probabilitas",
    "BD" => "Basis Data",
    "AI" => "Kecerdasan Buatas",
    "JK" => "Jaringan Komputer",
    "UI/UX" => "UI/UX",
]
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nama" name="nama" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select">
      <option value="">---Pilih Mata Kuliah---</option>
<?php
foreach ($ar_matkul as $code => $nama) {
    echo "<option value='$code'> $nama </option>";
}

?>

      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="nilai_uts" name="nilai_uts" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="nilai_uas" name="nilai_uas" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_praktikum" class="col-4 col-form-label">Nilai Praktikum</label> 
    <div class="col-8">
      <input id="nilai_praktikum" name="nilai_praktikum" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<h4>Hasil Input Data Nilai Mahasiswa:</h4><br>
<?php
$nama = $_POST['nama'];
$matkul = $_POST['matkul'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$nilai_praktikum = $_POST['nilai_praktikum'];
$rata_rata = ($nilai_uts * 0.3) + ($nilai_uas *0.3) + ($nilai_praktikum *0.4);
$keterangan = keterangan ( $rata_rata );
$grade = grade ($rata_rata);


function keterangan ($rata_rata) {
if ($rata_rata >= 60) {
    return "Lulus";
    } 
    else {
        return "Tidak Lulus";
}
}

function grade ($_rata_rata){
    if ($_rata_rata >= 85 && $_rata_rata <= 100) {
        return "A (Sangat Baik)";
}
elseif ($_rata_rata >= 60 && $_rata_rata < 84) {
return "B (Baik)";
}
elseif ($_rata_rata >= 40 && $_rata_rata < 59) {
return "C (Cukup)";
}
elseif ($_rata_rata >= 20 && $_rata_rata < 39) {
return "D (Kurang)";
}
elseif ($_rata_rata >= 10 && $_rata_rata < 19) {
return "E (Sangat Kurang)";
}
else{
    return "Tidak Lulus";
}
}
?>

Nama Mahasiswa: <?php echo $nama; ?><br>
Mata Kuliah: <?php echo $ar_matkul[$matkul]; ?><br>
Nilai UTS: <?php echo $nilai_uts; ?><br>
Nilai UAS: <?php echo $nilai_uas; ?><br>
Nilai Rata-Rata: <?php echo $rata_rata; ?><br>
Keterangan: <?php echo $keterangan; ?><br>
Grade: <?php echo grade($rata_rata); ?><br>


</body>
</html>