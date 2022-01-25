<?php $this->layout('template', ['title' => 'Reseptikori']) ?>

<h1>Suunnitellut reseptit</h1>

<div class='reseptit'>
<?php



foreach ($kori as $kori) {

  //$start = new DateTime($tapahtuma['tap_alkaa']);
  //$end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
    
    echo "<div>" . $kori['RecipeName'] . " " . "</div>";
    echo "<div><a href='resepti?id=" . $kori['REID'] . "'>TIEDOT</a></div>";
    echo "<a href='poista?id=" . $kori['REID'] ."' class='poista'>Poista korista</a>";
    
    
    
  echo "</div>";
    

  
}

?>
</div>
<div>
    <?php



echo "</br>";
echo "</br>";
echo "<h1 style='display:flex; align-items:flex-start;'>Tarvittavat raaka-aineet</h1>";
?>
</div>
<div>
<?php 



foreach ($koriaineet as $koriaine) {

    //$start = new DateTime($tapahtuma['tap_alkaa']);
    //$end = new DateTime($tapahtuma['tap_loppuu']);
  
    echo "<div>";
      
      echo "<div>" . $koriaine['Name'] . " " . "</div>";
  
    echo "</div>";
  
  
    
  }
  ?>
  </div>
  <div>
       </div>
      