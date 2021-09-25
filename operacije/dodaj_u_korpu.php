<?php include "../konekcija/db.php";
include "../klase/telefon.php";
global $connnection;
session_start();

$_SESSION['korpa']=isset($_SESSION['korpa']) ? $_SESSION['korpa'] : array();  

$id = $_POST['id'];

$query = "SELECT id, model, ram, procesor, baterija, kamera, slika, cena, marka_id FROM telefon WHERE marka_id =".$id;
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
while($row=mysqli_fetch_array($query_product_info)){
    $_SESSION['korpa'][count($_SESSION['korpa'])]=new Telefon($id, $row['procesor'],$row['baterija'],$row['kamera'],$row['model'],$row['ram'],$row['cena'],$row['slika'],$row['marka_id']);
}
 echo var_dump($_SESSION['korpa'][count($_SESSION['korpa'])-1]); 

?>