<?php $this->layout('template', ['title' => $resepti['RecipeName']]) ?>


<div class='aineet'>
  <div class="kuva">
    <div>
    <div><h1><?=$resepti['RecipeName']?></h1>

    <h4 class="vali"><?=$resepti['TypeName']?><h4>

    

    </br>

    <?php
      
        if (!$foodweek) {
          echo "<div class='flexarea'><a href='lisaa_koriin?id=" . $resepti['REID'] ."' class='button'>Lisää koriin</a></div>";    }
          else {
            echo "<div class='flexarea'>";
            echo "<div>Resepti on lisätty suunnitelmaan!</div>";
            echo "</br>";
            echo "<a href='peru?id=" . $resepti['REID'] ."' class='button'>Poista korista</a>";
            echo "</div>";
          }
      
    ?>
    </div>
    </div>
    <div class="kuva2">
    <img src="images/tommi.jpg" alt="FoodFood" width="250" height="200">
        </div>
  </div>
  <div class='aineteksti'>
    <div>
    <h3>Raaka-aineet</h3>
    <?php

    foreach ($aine as $aine) {


      echo "<div class='vali'>";
        
        
        echo "<div class='vali'>" . $aine['Name'] .  "<a href='poista_reseptista?id=" . $aine['RIID'] ."' class='poista'><span title ='Poista'> - </span></a>" .  "</div>";
        
        
        
      echo "</div>";
          
        
            

      
    }
    ?>
    </div>
    <div class="pinkki">
    <h3>Lisää raaka-aine reseptiin</h3>
    <form action="" method="POST">
      
    <label for="aines">Valitse </label>
        <select name="aines" id="aines">
          <?php 
          foreach ($kaikki as $aine) {
            echo "<option value='$aine[INID]'>$aine[Name]</option>";
            } 
            ?>
          </select>
      
        <br>
      <label for="Amount">Määrä</label>
      <input type="number" value=1 step="0.1" id="Amount" name="Amount">
      <br>
      <input type="submit" name="laheta" value="Lisää raaka-aine">
    </form>
          </div>
    </div>
  




