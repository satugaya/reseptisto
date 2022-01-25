<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>reseptisto - <?=$this->e($title)?></title>
    <meta charset="UTF-8">
    <link href="styles/styles.css" rel="stylesheet">
    
  </head>
  <body>
  <header>
      <h1><a href="<?=BASEURL?>">Reseptistö</a></h1>
      <h2><a href='kori'>Kori</a></h2>
      <h2><a href='lisaa_resepti'>Lisää reseptin nimi</a></h2>
      <h2><a href='lisaa_raaka_aine'>Lisää uusi raaka-aine</a></h2>
      
      
    </header>

    <section>
      <?=$this->section('content')?>
      
    </section>
    <footer>
      <hr>
      <div>Reseptistö by Satu</div>
      <img src="images/paprikaa.jpg" alt="Lovely Food" width="500" height="300">
    </footer>
  </body>
</html>
