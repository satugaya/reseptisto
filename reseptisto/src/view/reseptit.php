


<?php $this->layout('template', ['title' => 'Kaikki reseptit']) ?>

<h1>Hae raaka-aineella</h1>


<form action="" method="GET">
  
    <label for="hae">Raaka-aine:</label>
    
      <select name="hae" id="hae">
        <?php 
        foreach ($kaikki as $yksi) {
          
          echo "<option value='$yksi[INID]'>$yksi[Name]</option>";
          } 
          ?>
         
        </select>
        <input type="submit" name="nappi" value="Hae">
    </form>

    <form action="" method="GET">
  
  
<h1>Hae reseptin tyypillä</h1>

<form action="" method="GET">
  
    <label for="lista">Reseptin tyyppi:</label>
    
      <select name="lista">
        <?php 
        foreach ($tyyppi as $type) {
          echo "<option value='$type[TYID]'>$type[TypeName]</option>";
          } 
          ?>
         <input type="submit" name="nappi" value="Hae">
        </select>
    </form>

    

<?php
      
        if (isset($_GET['lista'] )) {
          echo "<div><h1>Haetut reseptit</h1></div>";    }
        
        else if (isset($_GET['hae'])) {
          echo "<div><h1>Haetut reseptit</h1></div>";
        }
          else {
            echo "<div class='flexarea'>";
            echo "<div><h1>Kaikki reseptit</h1></div>";
            
          }
      
    ?>

<div class="reseptit2">
<?php

foreach ($reseptit as $reseptinen) {

  //$start = new DateTime($tapahtuma['tap_alkaa']);
  //$end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
    
    echo "<div>" . $reseptinen['RecipeName'] . " " .  "</div>";
    echo "<div><a href='resepti?id=" . $reseptinen['REID'] . "'>TIEDOT</a></div>";
    echo "<div class='flexarea'><a href='lisaa_koriin?id=" . $reseptinen['REID'] ."' class='poista'><span title ='Lisää koriin'> + </span></a></div>"; 
    
    
    
  echo "</div>";

  
}



?>
</div>
