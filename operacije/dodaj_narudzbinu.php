<?php include "../konekcija/db.php";
include "../klase/telefon.php";
global $connnection;
session_start();
if (count($_SESSION['korpa']) == 0){
    die('Error: Korpa je prazna');
}
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];
$telefon = $_POST['telefon'];

$ime = mysqli_real_escape_string($connnection, $ime );   
$prezime = mysqli_real_escape_string($connnection, $prezime );  
$adresa = mysqli_real_escape_string($connnection, $adresa );    
$telefon = mysqli_real_escape_string($connnection, $telefon );    


    $query = "INSERT INTO narudzbine(ime, prezime, adresa, telefon) ";
    $query .= "VALUES ('$ime', '$prezime','$adresa', '$telefon')";

   $result = mysqli_query($connnection, $query);
   
    if(!$result) {
        die('Query FAILED');
    
    }else{
        $narudzbina_id = mysqli_insert_id($connnection);
        for($i=0;$i<count($_SESSION['korpa']);$i++){
            $telefon=$_SESSION['korpa'][$i]->getId();
            $query1 = "INSERT INTO telefon_narudzbina(telefon_id, narudzbina_id) VALUES ($telefon, $narudzbina_id)";
            $result = mysqli_query($connnection, $query1);
        }
        unset($_SESSION['korpa']);
        
    }

?>