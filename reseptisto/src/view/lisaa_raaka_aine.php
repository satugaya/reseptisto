<?php $this->layout('template', ['title' => 'Uuden raaka-aineen luonti']) ?>

<h1>Uuden raaka-aineen luonti</h1>

<form action="" method="POST">
  <div>
    <label for="Name">Raaka-aineen nimi:</label>
    <input id="Name" type="text" name="Name">
  </div>
  <div>
    <label for="AdditionalInfo">Mahdollinen lisätieto:</label>
    <input id="AdditionalInfo" type="text" name="AdditionalInfo">
  </div>
  <div>
    <label for="Price">Raaka-aineen hinta:</label>
    <input id="Price" type="number" step=".1" name="Price">
  </div>
    
  <div>
    <input type="submit" name="laheta" value="Luo raaka-aine">
  </div>
</form>

