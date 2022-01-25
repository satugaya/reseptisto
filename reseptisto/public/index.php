<?php

    // Suoritetaan projektin alustusskripti.
    require_once '../src/init.php';
  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  // Siistimisen jälkeen osoite /~koodaaja/lanify/tapahtuma?id=1 on 
  // lyhentynyt muotoon /tapahtuma.
  $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);

  //$request = str_replace('/~sgaya/reseptisto','',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');

    

      // Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
  $templates = new League\Plates\Engine(TEMPLATE_DIR);


    
    switch ($request) {
      case '/':
      case '/reseptit':
        require_once MODEL_DIR . 'resepti.php';
        $reseptit = haeReseptit();
        $tyyppi = haeTyyppi();
        $kaikki = hakisit();
        if (isset($_GET['lista'])) {
          $id = $_GET['lista'];
          $haettuTyyppi = haeReseptitTyypilla($_GET['lista']);
          echo $templates->render('reseptit',['reseptit' => $haettuTyyppi, 'tyyppi' => $tyyppi, 'id' => $id, 'kaikki' => $kaikki]);
        
        }
        else if(ISSET($_GET['hae'])){
          require_once MODEL_DIR . 'resepti.php';
          $keyword = $_GET['hae'];
          $hae = haeReseptia($_GET['hae']);
          
            echo $templates->render('reseptit', ['reseptit' => $hae, 'tyyppi' => $tyyppi, 'kaikki' => $kaikki, 'keyword' => $keyword]);
          }
          

        else {
          echo $templates->render('reseptit',['reseptit' => $reseptit, 'tyyppi' => $tyyppi, 'kaikki' => $kaikki]);
        }
        
        
      
        
        break;

      case '/resepti':
        require_once MODEL_DIR . 'resepti.php';
        require_once MODEL_DIR . 'foodweek.php';
        $resepti = haeResepti($_GET['id']);
        if ($resepti) {
          $foodweek = haeFoodWeek($resepti['REID']);
          $aine = haeRaakaAineet($resepti['REID']);
          $reid = $_GET['id'];
          $kaikki = haeKaikki();
          if (isset($_GET['aines'])) {
            $id = $_GET['aines'];
            echo $templates->render('resepti',['resepti' => $resepti, 'foodweek' => $foodweek, 'aine' => $aine, 'kaikki' => $kaikki, 'id' => $id]);
          }
          if (isset($_POST['laheta'])) {
            //$formdata = cleanArrayData($_POST);
            require_once MODEL_DIR . 'resepti.php';
            
            lisaaAineReseptiin($_GET['id'], $_POST['aines'], $_POST['Amount']);
            echo "Raaka-aine on lisätty.";
            header("Location: resepti?id=$reid");
            break;
          } 
        
          echo $templates->render('resepti',['resepti' => $resepti, 'foodweek' => $foodweek, 'aine' => $aine, 'kaikki' => $kaikki]);
        } else {
          echo $templates->render('recipenotfound');
        }
        
        break;

        case '/poista_reseptista':
          if ($_GET['id']) {
            require_once MODEL_DIR . 'resepti.php';
            $id = $_GET['id'];
            $poista = poistaRaakaAine($id);
            echo "Raaka-aine on poistettu ";
            //header("Location: resepti?id=$hae");
          break;
        }
        
  
        
    
        case '/lisaa_resepti':
          if (isset($_GET['lista'])){
            require_once MODEL_DIR . 'resepti.php';
            $tyyppi = haeTyyppi();
            echo $templates->render('lisaa_resepti', ['tyyppi' =>$tyyppi]);
          }
          
          
          
          if (isset($_POST['laheta'])) {
            $formdata = cleanArrayData($_POST);
            require_once MODEL_DIR . 'resepti.php';
            
            $id = lisaaResepti($_POST['RecipeName'], $_POST['TYID'], $_POST['PriceRange']);
            echo "Resepti on luotu tunnisteella $id";
            break;
          } else {
            require_once MODEL_DIR . 'resepti.php';
            $tyyppi = haeTyyppi();
            echo $templates->render('lisaa_resepti', ['tyyppi' => $tyyppi]);
            break;
          }
        
          case '/lisaa_raaka_aine':
            if (isset($_POST['laheta'])) {
              $formdata = cleanArrayData($_POST);
              require_once MODEL_DIR . 'raaka_aine.php';
              
              $id = lisaaRaakaAine($_POST['Name'], $_POST['AdditionalInfo'], $_POST['Price']);
              echo "Raaka-aine on luotu tunnisteella $id";
              break;
            } else {
              echo $templates->render('lisaa_raaka_aine');
              break;
            }

            case '/lisaa_koriin':
              if ($_GET['id']) {
                require_once MODEL_DIR . 'foodweek.php';
                $id = $_GET['id'];
                $kori = lisaaFoodWeek($id);
                if ($kori != NULL){
                  header("Location: kori");
                } else {
                header("Location: reseptit");
              }
              break;
            }

            case '/peru':
              if ($_GET['id']) {
                require_once MODEL_DIR . 'foodweek.php';
                $id = $_GET['id'];
                $peru = poistaFoodWeek($id);
                if ($peru != NULL){
                  header("Location: resepti?id=$id");
                } else {
                header("Location: reseptit");
              }
              break;
            }

            

            case '/kori':
              require_once MODEL_DIR . 'foodweek.php';
              $kori = haeKoriReseptit();
              $koriaineet = haeKoriAineet();
              echo $templates->render('kori',['kori' => $kori, 'koriaineet' => $koriaineet]);
              break;

            case '/poista':
              if ($_GET['id']) {
                require_once MODEL_DIR . 'foodweek.php';
                $id = $_GET['id'];
                $peru = poistaFoodWeek($id);
                
                header("Location: kori");
              
              break;
            }

            


            case '/lisaa_reseptiin':
              
              if (isset($_POST['laheta'])) {
                $formdata = cleanArrayData($_POST);
                require_once MODEL_DIR . 'resepti.php';
                
                lisaaAineReseptiin($_POST['REID'], $_POST['INID'], $_POST['Amount']);
                
                break;
              } 


                break;
             


            

      default:
        echo $templates->render('notfound');
    }    
  
        // ... switch-lauseen alku säilyy sellaisenaan
            
        // ... switch-lauseen loppu säilyy sellaisenaan
    
  

?> 
