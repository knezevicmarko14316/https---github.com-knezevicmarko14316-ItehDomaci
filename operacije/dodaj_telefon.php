<?php include "../konekcija/db.php";
global $connnection;
    
    $model = $_POST['model'];
    $cena=$_POST['cena'];
    $procesor=$_POST['procesor'];
    $ram=$_POST['ram'];
    $baterija=$_POST['baterija'];
    $kamera=$_POST['kamera'];
    $slika=$_POST['slika'];
    $marka_id=$_POST['marka_id'];
    $query ="INSERT INTO telefon(model, cena, ram, slika, procesor, baterija, kamera, marka_id) VALUES ('$model',$cena,'$ram','$slika','$procesor','$baterija','$kamera','$marka_id')";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 
    }
    header("Location:http://localhost/telefoni-master/admin.html");
?>