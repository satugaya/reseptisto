<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeReseptit() {
    return DB::run('SELECT * FROM Recipes;')->fetchAll();
  }

  function haeTyyppi() {
    return DB::run('SELECT TYID, TypeName FROM RecipeType;')->fetchAll();
  }

  function haeReseptitTyypilla($TYID) {
    return DB::run('SELECT * FROM Recipes JOIN RecipeType ON Recipes.TYID = RecipeType.TYID WHERE RecipeType.TYID= ?;', [$TYID])->fetchAll();
  }

  function haeResepti($id) {
    return DB::run('SELECT Recipes.RecipeName, Recipes.REID, RecipeType.TypeName FROM Recipes JOIN RecipeType ON Recipes.TYID = RecipeType.TYID WHERE REID = ?;',[$id])->fetch();
  }
  function haeReseptiID($id) {
    return DB::run('SELECT Recipes.REID FROM Recipes JOIN RecipeType ON Recipes.TYID = RecipeType.TYID WHERE REID = ?;',[$id])->fetch();
  }

  function lisaaResepti($RecipeName, $TYID, $PriceRange) {
    DB::run('INSERT INTO Recipes (RecipeName, TYID, PriceRange) VALUE  (?, ?, ?);',[$RecipeName, $TYID, $PriceRange]);
    return DB::lastInsertId();
  }

  function haeReseptia($INID) {
    return DB::run('SELECT Recipes.REID, Recipes.RecipeName, Ingredients.Name FROM Recipes JOIN RecipeIngredient ON Recipes.REID = RecipeIngredient.REID JOIN Ingredients ON RecipeIngredient.INID = Ingredients.INID WHERE Ingredients.INID=?;',[$INID])->fetchAll();
    
  }

  

  function haeRaakaAineet($RecipeName) {
    return DB::run('SELECT RecipeIngredient.RIID, Ingredients.INID, Ingredients.Name, Ingredients.INID FROM Recipes JOIN RecipeIngredient ON Recipes.REID = RecipeIngredient.REID JOIN Ingredients ON RecipeIngredient.INID = Ingredients.INID WHERE Recipes.REID= (?)', [$RecipeName])->fetchAll();
  }
  
  function poistaRaakaAine($RIID) {
    return DB::run('DELETE FROM RecipeIngredient WHERE RIID=?', [$RIID]);
  }

  function haeEdellinenResepti($REID) {
    return DB::run('SELECT REID FROM RecipeIngredient WHERE RIID=?', [$REID])->fetch();
    
  }

  function lisaaAineReseptiin($REID, $INID, $Amount) {
    return DB::run('INSERT INTO RecipeIngredient (REID, INID, Amount) values (?, ?, ?)', [$REID, $INID, $Amount]);
  }

  function haeKaikki() {
    return DB::run('SELECT * FROM Ingredients ORDER BY Ingredients.Name')->fetchAll();
  }

  function hakisit() {
    return DB::run('SELECT * FROM Ingredients;')->fetchAll();
  }

  
  
?>