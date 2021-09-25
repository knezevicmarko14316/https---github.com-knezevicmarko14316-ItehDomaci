<?php include "../konekcija/db.php";
global $connnection;    
if(isset($_POST['id'])){
$id=$_POST['id'];
$query = "SELECT id, model, ram, procesor, baterija, kamera, slika, cena, marka_id FROM telefon WHERE id =".$id;
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}

while($row=mysqli_fetch_array($query_product_info)){
    echo " <div id='form'class='dodaj-telefon' style='padding-top:0px;'>
    <div id='izmeni' class='form'><form class='add-form' method='post' action='operacije/izmeni_telefon.php'>
    <input style='color:black;'type='text' name='model' placeholder='model' value='{$row['model']}'/>
    <input style='color:black;'type='text' name='ram'placeholder='ram'value='{$row['ram']}'/>
    <input style='color:black;'type='text' name='slika'placeholder='slika'value='{$row['slika']}'/>
    <input style='color:black;'type='text' name='procesor'placeholder='procesor'value='{$row['procesor']}'/>
    <input style='color:black;'type='text' name='baterija'placeholder='baterija'value='{$row['baterija']}'/>
    <input style='color:black;'type='text' name='kamera'placeholder='kamera'value='{$row['kamera']}'/>
    <input style='color:black;'type='text' name='cena'placeholder='cena'value='{$row['cena']}'/>
    <input style='color:black; display:none;'type='text' name='marka_id'placeholder='marka_id'value='{$row['marka_id']}'/>
        <input style='display:none;'type='text' rel= '".$row['id']."'name='id' value='".$row['id']."'/>
        <button>Izmeni</button>
      </form>
    </div>
  </div>";
}
}
?>