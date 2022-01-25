<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeFoodWeek($REID) {
    return DB::run('SELECT * FROM FoodWeek WHERE REID = ? ',
                   [$REID])->fetchAll();
  }

  function lisaaFoodWeek($REID) {
    DB::run('INSERT INTO FoodWeek (REID) VALUE (?)',
            [$REID]);
    return DB::lastInsertId();
  }

  function poistaFoodWeek($REID) {
    return DB::run('DELETE FROM FoodWeek  WHERE REID = ?',
                   [$REID])->rowCount();
  }

  function haeKoriReseptit() {
    return DB::run('SELECT Recipes.RecipeName, FoodWeek.REID, FoodWeek.FWID FROM FoodWeek JOIN Recipes ON Recipes.REID = FoodWeek.REID;')->fetchAll();
  }

  function haeKoriAineet() {
    return DB::run('SELECT DISTINCT Ingredients.Name FROM Ingredients JOIN RecipeIngredient ON Ingredients.INID = RecipeIngredient.INID JOIN FoodWeek ON FoodWeek.REID = RecipeIngredient.REID ORDER BY Ingredients.Name;')->fetchAll();
  }

  
  
?>
