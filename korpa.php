<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="korpa.css">
    <link rel="stylesheet" href="styl.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Document</title>
</head>
<style>
    li:hover {
  background: rgba(0, 0, 0, 0.15);
}
li:hover a {
  text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.3);
}

@media screen and (min-width: 48em) { 
  #menu-button { visibility: hidden }
}






[role="navigation"] { 
  background: #5C5C5C;
  font-family: sans-serif;
  font-weight: 700;
}

[role="navigation"] ul {
  margin: 0;
  padding: 0;
 
}

[role="navigation"] li {
  color: #6d6d6d;
  padding-left: 24px;
  position: relative;
  display: block;

}

@media screen and (min-width: 48em) { 
  [role="navigation"] li { border-left: none }
}



[role="navigation"] a {
  position: relative;
  display: block;
  line-height: 48px;
  font-size: 20px;
  text-decoration: none;
  color: #FFF;
}

[role="navigation"], [role="main"] { width: 100% }

.js #wrapper {
  display: -webkit-box;
  display:    -moz-box;
  display:         box;
  -webkit-box-orient: horizontal;
     -moz-box-orient: horizontal;
    -ms-box-orient: horizontal;
      box-orient: horizontal;
}

</style>
<body>
<nav role="navigation">
            <ul>
              <li><a href="/ItehDomaci1/index.html">Pocetna</a></li>
              <li><a href="/ItehDomaci1/korpa.php"><i style="font-size: 20px; color: white;" class="fa fa-shopping-cart"></i></a></li>
              <li><a href="/ItehDomaci1/prijavi_se.html">Uloguj Se</a></li>
            </ul>
        </nav>
<div id="w">
<?php include "konekcija/db.php";
include "./klase/telefon.php";
session_start();
echo "
<div id='page'>
<table id='cart'>
  <thead>
    <tr>
      <th class='first'>Photo</th>
      <th class='second'>Qty</th>
      <th class='third'>Product</th>
      <th class='fourth'>Line Total</th>   
    </tr>
  </thead>
  <tbody>";
  if(isset($_SESSION['korpa'])){
   for($i=0;$i<count($_SESSION['korpa']);$i++){
       if($_SESSION['korpa'][$i] == null) {
        $niz=$_SESSION['korpa'];
        array_splice($niz,$i, 1);
        $_SESSION['korpa']=$niz;
       }
   }
  

for($i=0;$i<count($_SESSION['korpa']);$i++){
        $object = unserialize(serialize($_SESSION['korpa'][$i]));
        $slika=$object->getslika();
        $model=$object->getmodel();
        $cena=$object->getcena();
        $id=$object->getId();
                echo "<tr class='productitm'>
                      <td><img src='{$slika}' class='thumb'></td>
                      <td><input type='number' value='1' min='0' max='99' class='qtyinput' disabled></td>
                      <td>{$model}</td>
                      <td>{$cena}</td>
                      <td><span id='{$i}'class='obrisi'><i  style='color: red; font-size: 20px;' class='fa fa-trash'></i></span></td>
                    </tr>";
    }
  }
    echo "<tr>
    <td colspan='5' class='checkout'>
        <input type='text' id='ime' name='ime' placeholder='ime'>
        <input type='text' id='prezime' name='prezime' placeholder='prezime'>
        <input type='text' id='adresa' name='adresa' placeholder='adresa'>
        <input type='text' id='telefon' name='telefon' placeholder='telefon'></td>                
    </tr>
   
    <td colspan='5' class='naruci'><button id='submitbtn'>Naruci!</button></td>
    </tr>
    </tbody>
    </table>
    </div>";
?>
</div>
<body style="padding: 0px 0px;">

<script>

$('document').ready(function(){
    $(".naruci").on('click', function(){
            console.log('kliknuto');
            let ime=document.getElementById("ime").value;
            let prezime=document.getElementById("prezime").value;
            let adresa=document.getElementById("adresa").value;
            let telefon=document.getElementById("telefon").value;
                $.ajax({
                    url:'operacije/dodaj_narudzbinu.php',
                    type:'POST',
                    data:{ime:ime, prezime:prezime, adresa:adresa,telefon:telefon},
                    success:function(){
                        location.replace('http://localhost/ItehDomaci1/index.html')
                }
                });
            }); 
            $("#w").on('click','.obrisi', function(){
            let id=this.id;
            console.log(id);
                $.ajax({
                    url:'operacije/obrisi_iz_korpe.php',
                    type:'GET',
                    data:{id:id},
                    success:function(){
                         location.reload();
                }
            }); 
        });
});
   
</script>