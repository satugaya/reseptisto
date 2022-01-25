<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaRaakaAine($nimi,$lisatieto, $hinta) {
    DB::run('INSERT INTO Ingredients (Name, AdditionalInfo, Price) VALUE  (?,?,?);',[$nimi,$lisatieto, $hinta]);
    return DB::lastInsertId();
  }

?>