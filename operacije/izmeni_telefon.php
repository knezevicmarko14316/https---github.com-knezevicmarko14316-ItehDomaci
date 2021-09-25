<?php include "../konekcija/db.php";
global $connnection;
    $id = $_POST['id'];
    $model = $_POST['model'];
    $cena=$_POST['cena'];
    $procesor=$_POST['procesor'];
    $ram=$_POST['ram'];
    $baterija=$_POST['baterija'];
    $kamera=$_POST['kamera'];
    $slika=$_POST['slika'];
    $marka_id=$_POST['marka_id'];
    $query ="UPDATE telefon SET model='$model',ram='$ram',baterija='$baterija',kamera='$kamera', cena=$cena ,procesor='$procesor',slika='$slika',marka_id='$marka_id' WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 
}
header("Location:http://localhost/telefoni-master/admin.html");
?>