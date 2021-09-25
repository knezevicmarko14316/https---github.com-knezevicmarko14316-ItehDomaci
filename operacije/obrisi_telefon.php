<?php include "../konekcija/db.php";
global $connnection;
    $id = $_POST['id'];
    $query ="DELETE FROM telefon WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 

}
header("Location:http://localhost/telefoni-master/admin.html");

?>