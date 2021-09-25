<?php include "../konekcija/db.php";
global $connnection;

$query = "SELECT id, naziv FROM marka";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
while($row=mysqli_fetch_array($query_product_info)){
   echo "<li><a class='marka' id='{$row['id']}'>{$row['naziv']}</a></li>";
}

?>