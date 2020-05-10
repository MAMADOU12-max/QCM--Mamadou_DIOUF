
    <?php
        session_start() ;
        // if (!isset($_POST['verif_element'])) {
        //     header('Location:../../index.php');
        //     # code...
        // }
        $stock= file_get_contents('../../asset/JSON/stock_valeur.json');
        $num= json_decode($stock,true) ;
        $_SESSION["num"]=$num ;
        // var_dump($_SESSION["num"]) ; 

        $tab = file_get_contents('../../asset/JSON/question.json');
        $objet = json_decode($tab, true); 
                // var_dump(@$_COOKIE['num']) ;
        if($_SESSION["num"]<=count($objet)) {
            // var_dump($_SESSION["num"]) ;
	    }else{ 

            $_SESSION["num"]=6;
	    }

        if (isset($_POST['suivant'])) {
            //ce var permet de voir si le recup a pris un element  
            //   var_dump ($_POST['recup']);
            //  die() ;        //die permet d"arreter la progression pour voir le vardump
                
            //recuperation de elemnt cocher et on le met dans dans recup  
            @$_SESSION['questionPartti'][$_POST['pos']]['responseJ'] = $_POST['recup']; 
        
            //   var_dump ($_SESSION['questionPartti'][$_POST['pos']]);
            
            // cela fait parti de la pagination a l'endroit 1
            $debut=$_SESSION['fin']; 
            //désigne le nbre de question qui suit
            $fin=$_SESSION['fin']+1;
            
        } 
        //   pour tester si data recup pour kstion0
        //   var_dump ($_SESSION['questionPartti'][0]);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page de jeu</title>
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css">
        <style>
            #text-jeu
            {
                margin-left: 180px;
                position:absolute;
            }
            p{
                font-size: 12px;
                bottom: 20px;
                position: relative;
                font-weight:bold;
                text-transform: uppercase;
                text-align: center;
              
            }
            #ressortir
            {
                position: relative;
                display: inline-table;
                float: left;
                text-align: center;
                margin-left: 600px;
                color: cornsilk;
                bottom: 6px;
                background-color: turquoise;
            }
            #sort
            {
               
                border-radius: 2px;
                border-color: turquoise;
            }
            #clik
            {
                color: cornsilk;
                text-decoration: none;
            
            }
            .jeu
            {
                width: 60%;
                height: 290px;
                border:1px solid blue;
                position: absolute;
               border-radius: 3px;
               margin-left: 20px;
               margin-top: 10px;
            }
            .btn
            {
                background-color: green;
                position: relative;
                margin-top: 70px;
                margin-left: 90px;
                border-radius: 5px;
            }
            h3
            {
                font-size: 22px;
                color: black;
                margin-left: 160px;
                text-decoration: underline;
            }
         
            .contain-table{
                background-color:turquoise;
                border-radius: 15px;
                width:270px;
                height:270px;
                margin-left:500px;
                text-align:center;
               margin-top: 4px;
            }
            .mon-table{
                width: 200px;
                height:100px;
                background-color: gray;
                border-collapse:collapse;
                margin-left:30px;
                border-radius: 5px;
                margin-bottom:12px;
            }
             table{
                border-radius:13;
                border-collapse:collapse;
                
                
            }
            td{
                border:2px solid black;
              
            }
            th{
                border:2px solid black; 
            }
            .page{
                width: 60px;
                height: 30px;
                background-color: turquoise;
                margin-top: 30px; 
                margin-left: 600px;
                text-align:center;
               border-radius: 5px;
            }
        </style>
      
    </head>
    <body>
        <form action="" method = "post"> 
            
            </div><div id="container">
                <div id="header"> </div>
        
                         <div id="image">
        
                             <div id="acceuil">
                            <h2 style="color:white;text-decoration:none;">le plaisir de jouer</h2>
                            </div>
                                           
                            <div id="zone">
                                <div id="entete">
                                    <div id="text-jeu"><p> Bienvenue sur la plateforme de jeu de quizz <br> jouer
                                 et tester votre niveau de culture generale<p></div>
                                    <button name="quitter" id="ressortir"><a id="clik" href="../../index.php"> Déconnexion</a></button>
                                </div>
                               <div class="partie-jeux">
                                    <span class="jeu" style="overflow: auto;">
                              
                                                <?php
                                               

                                                    // mettre le tableau $objet dans une session
                                                 if (empty($_SESSION['questionPartti'])) {
                                                    $tab = file_get_contents('../../asset/JSON/question.json');
                                                    $objet = json_decode($tab, true);
                                                    $_SESSION['questionPartti'] = $objet;
                                                     }
                                                    // var_dump($_SESSION['questionPartti']) ;
                                                
                                                 //initialisation d'un tableau pour score
                                                 $_SESSION['score'] ;
                                                 //initialisation d'un tableau pour ls bonnes réponse
                                            
                                                $_SESSION['questiontrouver'] ;
                                                // var_dump($_SESSION['questiontrouver']) ;
                                               
                                                if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($_SESSION['questionPartti'])) {
                                                  //endroit1
                                                      // cela fait parti de la pagination a l'endroit 1
                                                    $debut=$_SESSION['fin'];
                                                    //désigne le nbre de question qui suit
                                                    $fin=$_SESSION['fin']+1;

                                                }elseif (isset($_POST['precedent']) && $_SESSION['fin']>2) {
                                                    // 
                                                    $debut=$_SESSION['fin']-2;
                                                    $fin=$_SESSION['fin']-1;
                                                    // var_dump ($_SESSION['questionPartti'][0]);
                                                }else
                                                {
                                                    $debut=0;
                                                    $fin=1;
                                                }
                                                $_SESSION['j']=$debut+1;
                             
                                        for ($i=$debut; $i <$fin ; $i++) {
                                            // $_SESSION['questiontcocher'][$i] = [] ;
                                            // var_dump($_SESSION['questiontcocher'][$i]) ;
                                            if ($i< @$_SESSION["num"]) {
                                               ?>
                                                    <div style="margin-left: 150px; padding-left: 8px; background: turquoise; margin-top: 15px; border-radius: 4px; margin-bottom: 20px; border: 2px solid gold ; height: 20px; width: 130px; ">
                                                <?php
                                                      
                                                            $question = 'QUESTIONS : '.($i+1).'/'.($_SESSION["num"]).'<br><br>' ;
                                                        echo $question  ;          
                                                ?>   
                                                    </div>
                                                        
                                                         <input type="hidden" name="pos" value="<?php echo $i ; ?>">  
                                 
                                                <?php       
                                                                       
                                                    //    var_dump($_SESSION['somme_score'] ) ;
                                                        echo $_SESSION['questionPartti'][$i]['question'].'<br>' ;
                                                        echo '<div style="float: right;">'.$_SESSION['questionPartti'][$i]['points'].'points'.'</div>' ;
                                                        // if ($i<count($objet)) {
                                                            if($_SESSION['questionPartti'][$i]["choix"]=="texte"){
                                                                $reponse=$_SESSION['questionPartti'][$i]["reponse"];
                                                                //enlevé la fonction read.. et la valeur du value
                                                                if (isset($_SESSION['questionPartti'][$i]["responseJ"])) {
                                                                    echo "<input type='texte' value='".$_SESSION['questionPartti'][$i]["responseJ"]."' name='recup' style='font-weight: bold;text-align: center;border-radius: 5%;height: 30px;'><br><br>";
                                                                        // verification si le joueur a trouvé
                                                                    if ($_SESSION['questionPartti'][$i]["responseJ"] == $_SESSION['questionPartti'][$i]["reponse"]) {                                                                                                                                                        
                                                                       
                                                                        $_SESSION['questioncocher'] = [
                                                                            "question" =>  $_SESSION['questionPartti'][$i]['question'],
                                                                            "trouver" => $_SESSION['questionPartti'][$i]["reponse"]  
                                                                        ] ;
                                                                        // pour acculumer le score
                                                                        $_SESSION['somme_score'] = $_SESSION['questionPartti'][$i]['points'] ;  
                                                                     }
                                                                }else{
                                                                    echo "<input type='texte' value='' name='recup' style='font-weight: bold;text-align: center;border-radius: 5%;height: 30px;'><br><br>";
                                                                }
                                                            }
                                                            elseif($_SESSION['questionPartti'][$i]["choix"]=="simple"){
                                                                for($k=1;$k<=10;$k++){
                                                                 
                                                                   if(isset($_SESSION['questionPartti'][$i]["reponse$k"])){
                                                                            $recup_radio=$_SESSION['questionPartti'][$i]["reponse$k"];
                                                                             //si un elemennt est coché on le met dans recup .le checked permet de garder l'élement cocher
                                                                            if ( isset($_SESSION['questionPartti'][$i]["responseJ"]) && "reponse".$_SESSION['questionPartti'][$i]["responseJ"]== "reponse".$k  ) {
                                                                                
                                                                                echo "<input type='radio' id='recup_simple' checked name='recup' value='".$k."'>".$recup_radio."<br><br>";
                                                                               
                                                                                  if ($_SESSION['questionPartti'][$i]["responseJ"] == $_SESSION['questionPartti'][$i]["exacte"]){
                                                                                    $_SESSION["score"]=$_SESSION["score"]+ $_SESSION["questionPartti"][$i]["points"];
                                                                                    // $_SESSION['questiontrouver'][$i] =[ $_SESSION['questionPartti'][$i]['question'].'<br>'.' '.'
                                                                                    // reponse trouvé :'.$_SESSION['questionPartti'][$i]["reponse$k"],] ;
                                                                                     
                                                                                       $_SESSION['questioncocher'] = [
                                                                                           "question" =>  $_SESSION['questionPartti'][$i]['question'],
                                                                                           "trouver" => $_SESSION['questionPartti'][$i]["reponse$k"]  
                                                                                       ] ;
                                                                                                                   
                                                                                         
                                                                                // var_dump( $_SESSION['questioncocher'][$i] );
                                                                                  }else{ }  
                                                                            }else{
                                                                                //sinon la question va rester intacte
                                                                                echo "<input type='radio' id='recup_simple' name='recup' value='".$k."'>".$recup_radio."<br><br>";                                                                                                                                                       
                                                                           }    
                                                                    } 
                                                                
                                                                }
                                                                // var_dump( $stock); 
                                                        }
                                                        elseif($_SESSION['questionPartti'][$i]["choix"]=="multiple"){
                                                            for($k=1;$k<=10;$k++){
                                                               
                                                                if(isset($_SESSION['questionPartti'][$i]["reponse$k"])){
                                                                    $reponse=$_SESSION['questionPartti'][$i]["reponse$k"];
                                                                    if ( isset($_SESSION['questionPartti'][$i]["responseJ"]) && in_array($k,$_SESSION['questionPartti'][$i]["responseJ"])  ) {
                                                                        echo "<input type='checkbox' checked name='recup[]' value='".$k."'>".$reponse."<br><br>";

                                                                        //   if ($_SESSION['questionPartti'][$i]["responseJ"] == $_SESSION['questionPartti'][$i]["exacte"]) {
                                                                            # code...
                                                                            // foreach($_SESSION["questionPartti"][$i]["responseJ"] as $value){
				
                                                                            //     if($value==$_SESSION["questionPartti"][$i]["reponse$k"]){
                                                                            //     $checktable[]=$_SESSION["questionPartti"][$i]["Reponse$chek"];
                                                                            //     $chektg[]=$_SESSION["questionPartti"][$i]["Reponse$value"];
                                                                                
                                                                            //         $_SESSION["questioncocher"]=[
                                                                            //             "question"=> $_SESSION["questionPartti"][$i]["question"],
                                                                            //             "trouver"=>$checktable,
                                                                                            
                                                                                        
                                                                            //         ];
                                                                            //     }
                                                                                // else{
                                                                                //     $_SESSION["Mes_reponses"]=[
                                                                                //         "Question"=> $_SESSION["partie"][$i]["question"],
                                                                                //         "BonneReponse"=>$checktable,
                                                                                //         "MauvaiseReponse"=> $chektg,
                                                                                        
                                                                                //     ];
                                                                                // }
                                                                                
                                                                            // }
                                                                                   
                                                                        // }
                                                                    }else{
                                                                        echo "<input type='checkbox' name='recup[]' value='".$k."'>".$reponse."<br><br>";
                                                                   }                                                                                                                                        

                                                                }
                                                            }
                                                        }
                                                    $_SESSION['j']++;
                                                }

                                                
                                                     //  // si click du bouton terminer
                                                     //afficher le resultat a la fin du jeu 
                                            ?>
                                            <div style='overflow: auto;'>
                                               
                                              <?php      
                                                     if(isset($_POST["suivant"]) && $_SESSION["num"] ==$i){
                                                        $réponse = file_get_contents('../../asset/JSON/stock_réponse.json');
                                                        $réponse = json_decode($réponse, true);
                                                      
                                                        $réponse =  $_SESSION['questioncocher'] ;
                                                        $réponseEncode = json_encode($réponse) ;
                                                     
                                                        file_put_contents('../../asset/JSON/réponse.json',$réponseEncode) ;
                                                     
                                                      $réponse = file_get_contents('../../asset/JSON/stock_réponse.json');
                                                      $réponse = json_decode($réponse, true);
                                                    //   var_dump($réponse) ;
                                                             echo "les réponses trouvées sont :".'<br>' ;
                                                        foreach ($réponse as $key => $value) {
                                                            
                                                            echo @$value["question"].'<br>'; 
                                                            echo @$value["trouver"].'<br>';
                                                        }
                                                        echo 'votre score final est de'.$_SESSION['score'].'points' ;
                                                    //   echo "bonjour abdou karim";
                                                    } 

                                             }
                                          ?>
                                         </div> 

                                             <div style="width:200px;margin-left:60px;border-radius:5px; height:30px;margin-top:40px;psition:fix;
                                             padding-left: 90px;background:turquoise; border:2px solid gold;display: flex;">
                                             <?php
                                            $_SESSION['fin']=$fin;
                                                    if (isset($_POST['suivant']) OR $_SESSION['fin']>=3) {
                                                        echo "<button  name='precedent' style='float:left;margin-left:-0vw;'> Precedent</button> ";
                                                    }
                                                    ?>
                                                   <?php
                                                    if ($i<= @$_SESSION['num']) {
                                                        echo "<button class='bttn' name='suivant' style=''> suivant</button> ";
                                                    }
                                                   elseif($i = @$_SESSION['num']){
                                                         echo "<button class='bttn' name='fini' style='padding-left:50px;'>terminer</button> ";                                                                                                      
                                                    }   
                                               
                                              ?>
                                               </div>
                                        
                                    </span>
                                    </form>
                                    <span class="score">

                                            <?php
                                                    $tab = file_get_contents('../../asset/JSON/commun.json');
                                                    $objet = json_decode($tab, true);
                                                                                        
                                                    // permet de ranger les nombres par ordre décroissant
                                                    //1ere méthode

                                                    $cpt=count($objet);
                                                    $temp=array();
                                                
                                                    for ($i=0; $i < $cpt; $i++)
                                                    {  
                                                            for ($j=0; $j <$i ; $j++)
                                                            { 
                                                                if (isset($objet[$i]['score'])) {
                                                                    # code...
                                                                    if(@($objet[$i]['score']>$objet[$j]['score']))
                                                                    {
                                                                        $temp=$objet[$i] ;
                                                                        $objet[$i]=$objet[$j];
                                                                        $objet[$j]=$temp;
                                                                    }
                                                                }
                                                              
                                                            }
                                                       
                                                    }
                                                    //mettre objet dans une session
                                                    $_SESSION['meilleur']=$objet; 
                                                    
                                                    //2 eme méthode
                                                        // $tab = [] ;
                                                        // foreach ($objet as $value) {
                                                        //    if($value['profil'] =="joueur"){
                                                        //         $tab[] =array
                                                        //         (
                                                        //             "nom" => $value["nom"] ,
                                                        //             "prenom" => $value["prenom"] ,
                                                        //             "score" => $value["score"]
                                                        //         ) ;
                                                        //    }
                                                        // }
                                                        // $colone = array_column($tab,"score") ;
                                                        // array_multisort($colone,SORT_DESC,$tab) ;

                                                    // pagination des scores décroissants par page de 15  
                                                  
                                                  
                                                    if(isset($_SESSION['meilleur']) )
                                                    {                                             
                                                        $total=sizeof($_SESSION['meilleur']);                                                    
                                                        $col=1;
                                                        $lign=15;
                                                        $elePag=($col*$lign); //element par page
                                                        // arrondir par excés...le nbre de page 
                                                        $nbrPage=ceil($total/$elePag);
                                                    
                                                        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
                                                        {
                                                            $page_num=$_GET['page'];
                                                        }
                                                        else
                                                        {
                                                            $page_num=1;
                                                        }
                                                        ?>
                                                        <div class='contain-table'>
                                                        <?php
                                                                // var_dump($_SESSION['meilleur']) ;
                                                            echo'<table class="mon-table">' ;
                                                            echo'<tr>';
                                                            echo'<th>Nom</th>';
                                                            echo'<th>Prénom</th>';
                                                            echo'<th>Score</th>';
                                                            echo'<tr>';
                                                            echo'<tr>';
                                                            for($j=($page_num-1)*15;$j<$page_num*15 && isset($_SESSION['meilleur'][$j]['score']);$j++)
                                                            {
                                                                ?>
                                                                  
                                                                <?php
                                                                if($j==$total) //stop des peges si on finit de parcouir $objet
                                                                {
                                                                break;
                                                                }
                                                                echo'<td >'. $_SESSION['meilleur'][$j]['prenom'].'</td>';
                                                                echo'<td >'. $_SESSION['meilleur'][$j]['nom'].'</td>';
                                                                echo'<td >'. $_SESSION['meilleur'][$j]['score']."points".'</td>';
                                                                echo '<br>';
                                                                {
                                                                    echo'</tr><tr>';
                                                                }
                                                            } 
                                                            echo'</tr></table>';
                                                      ?>
                                                       </div>
                                                      <?php      

                                                            for ($i=1; $i <=$nbrPage ; $i++) 
                                                            {
                                                                echo "<div class='page'\"><a href='listesjoueurs.php?lien=3&page=".$i."' >Page $i </a></div>";                     
                                                            }                   
                                                        }  
                                      
                                            ?>
                                            </div>

                                    </span>
                                  
                               </div>
           
                            </div> 
                        </div>
                        
                <div id="footer"></div>
              
        </body>
        </html>
                                              
     