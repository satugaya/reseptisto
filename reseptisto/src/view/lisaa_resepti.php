<?php $this->layout('template', ['title' => 'Uuden reseptin luonti'])
 ?>


<h1>Uuden reseptin luonti</h1>

<form action="" method="POST">
  <div class="vali">
    <label for="RecipeName"><h2>Reseptin nimi:</h2></label>

    <input id="RecipeName" type="text" name="RecipeName">
    </div>
<br>
<div>
    
    <label for="Type"><h2 class="vali">Reseptin tyyppi:</h2></label>
    <div class="reseptityyppi">
    <input type="checkbox" id="TYID" name="TYID" value=1 label for="TYID"> Kasvisruoka</label>
    <input type="checkbox" id="TYID" name="TYID" value=2 label for="TYID"> Kalaruoka</label>
    <input type="checkbox" id="TYID" name="TYID" value=3 label for="TYID"> Liharuoka</label>
    <input type="checkbox" id="TYID" name="TYID" value=4 label for="TYID"> Jälkiruoka</label> 
    <input type="checkbox" id="TYID" name="TYID" value=7 label for="TYID"> Kanaruoka</label>
    </div>
  </div>
          
  
  
  <div class='aineet2'>
  <label for="Type"><h2>Reseptin hinta:</h2></label>
    <input type="radio" id="edukas" name="PriceRange" value=1 label for="edukas"> Edukas</label>
    <input type="radio" id="normaali" name="PriceRange" value=2 label for="normaali"> Keskihintainen</label>
    <input type="radio" id="kallis" name="PriceRange" value=3 label for="kallis"> Kallis</label>
  </div>
  <div>
    <input type="submit" name="laheta" value="Luo reseptin nimi">
  </div>
</form>
