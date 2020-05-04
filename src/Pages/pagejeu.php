
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
        </style>
    </head>
    <body>
        <form action="" method = "post"> 
            
            </div><div id="container">
                <div id="header"> </div>
        
                         <div id="image">
        
                             <div id="acceuil">
                            <h3>le plaisir de jouer</h3>
                            </div>
                                           
                            <div id="zone">
                                <div id="entete">
                                    <div id="text-jeu"><p> Bienvenue sur la plateforme de jeu de quizz <br> jouer
                                 et tester votre niveau de culture generale<p></div>
                                    <div id="ressortir"><a id="clik" href="../../index.php"> Déconnexion</a></div>
                                </div>
                               <div class="partie-jeux">
                                    <span class="jeu" style="overflow: auto;">
                                    <table>
                                                <?php
                                                session_start();
                                                $tab = file_get_contents('../../asset/JSON/question.json');
                                                $objet = json_decode($tab, true);
                                               
                                                if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($objet)) {
                                                    $debut=$_SESSION['fin'];
                                                    //désigne le nbre de question qui suit
                                                    $fin=$_SESSION['fin']+2;
                                                }elseif (isset($_POST['precedent']) && $_SESSION['fin']>4) {
                                                    // 
                                                    $debut=$_SESSION['fin']-4;
                                                    $fin=$_SESSION['fin']-2;
                                                }else
                                                {
                                                    $debut=0;
                                                    $fin=2;
                                                }
                                                $_SESSION['j']=$debut+1;
                                                $j = 0 ;
                                        for ($i=$debut; $i <$fin ; $i++) {

                                            if ($i<count($objet)) {
                                                
                                                        echo $objet[$i]['question'].'<br>' ;
                                                        // if ($i<count($objet)) {
                                                            if($objet[$i]["choix"]=="texte"){
                                                                $reponse=$objet[$i]["reponse"];
                                                                //enlevé la fonction read.. et la valeur du value
                                                                echo "<input type='texte' value='' style='font-weight: bold;text-align: center;border-radius: 5%;height: 30px;'><br><br>";
                                                            }
                                                            elseif($objet[$i]["choix"]=="simple"){
                                                                for($k=1;$k<=10;$k++){
                                                                    if(isset($objet[$i]["reponse$k"])){

                                                                        // if($objet[$i]["exacte"]==$k){

                                                                            $recup_radio=$objet[$i]["reponse$k"];
                                                                            echo "<input type='radio' id='recup_simple' value='selectionner'>".$recup_radio."<br><br>";
                                                                    }
                                                                    // if($objet[$i]["exacte"]!=$k){

                                                                    //     $bien=$objet[$i]["reponse$k"];
                                                                    //     echo "<input type='radio' disabled  value='$bien'>".$bien."<br><br>";
                                                                    // }
                                                                }
                                                            //}
                                                        }
                                                        elseif($objet[$i]["choix"]=="multiple"){
                                                            for($k=1;$k<=10;$k++){
                                                               
                                                                if(isset($objet[$i]["reponse$k"])){

                                                                    // if(@$objet[$i]["exacte$k"]==$k){
                                                                        $reponse=$objet[$i]["reponse$k"];
                                                                        echo "<input type='checkbox' name='recup' value=''>".$reponse."<br><br>";
                                                                // }
                                                                // if(@$objet[$i]["exacte$k"]!=$k){

                                                                //     $bien=$objet[$i]["reponse$k"];
                                                                //     echo "<input type='checkbox' disabled  value='$bien'>".$bien."<br><br>";
                                                                // }
                                                                }
                                                            }
                                                        }


                                                        $_SESSION['j']++;
                                                    // }
                                                    // $_SESSION['j']++;
                                                }
                                             }
                                            $_SESSION['fin']=$fin;
                                                    if (isset($_POST['suivant']) OR $_SESSION['fin']>=9) {
                                                        echo "<button  name='precedent' style='float:left;margin-left:-0vw;'> Precedent</button> ";
                                                    }
                                                    ?>
                                                   <?php
                                                    if ($_SESSION['fin']< count($objet)) {
                                                        echo "<button class='bttn' name='suivant' style='float:right;margin-top:1.7vw'> suivant</button> ";
                                                    }
                                    
                                               ?>
                                          </table>                 

                                    </span>
                                    <span class="score">

                                                <?php
                                                    $tab = file_get_contents('../../asset/JSON/commun.json');
                                                    $objet = json_decode($tab, true);
                                                                                        
                                                
                                                    $l=count($objet);
                                                    $temp=array();
                                                    
                                                    
                                                                            
                                                    for ($i=0; $i < $l; $i++)
                                                    { 
                                                        for ($j=0; $j <$i ; $j++)
                                                        { 
                                                            if($objet[$i]['score']>$objet[$j]['score'])
                                                            {
                                                                $temp=$objet[$i];
                                                                $objet[$i]=$objet[$j];
                                                            $objet[$j]=$temp;
                                                            }
                                                        }
                                                    }
                                                    $_SESSION['meilleur']=$objet;  
                                                    
                                                    //
                                                    if(isset($_SESSION['meilleur']))
                                                    {                                             
                                                        $total=sizeof($_SESSION['meilleur']);
                                                    
                                                        $col=1;
                                                        $lign=15;
                                                        $elePag=($col*$lign);
                                                        
                                                        $nbrPage=ceil($total/$elePag);
                                                    
                                                        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
                                                        {
                                                            $page_num=$_GET['page'];
                                                    
                                                        }
                                                        else
                                                        {
                                                            $page_num=1;
                                                        }
                                                    
                                                            echo'<table style="margin-left:470px; margin-top: -90px; border-collapse: collapse; border-radius: 5px;"><tr>';
                                                            for($j=($page_num-1)*15;$j<$page_num*15;$j++)
                                                            {
                                                                if($j==$total)
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

                                                            for ($i=1; $i <=$nbrPage ; $i++) 
                                                            {
                                                                echo "<div style=\" position: relative; top: 100px; margin-left: 463px;\"><a href='pagejeu.php?lien=3&page=".$i."' >Page $i </a></div>";                     
                                                            }                   
                                                    }    

                                                    ?>
                                                </div>

                                    </span>
                                  
                               </div>
           
                            </div> 
                        </div>
                        
                        
                      
                <div id="footer"></div>
         </form>
            
        </body>
        </html>

        <script>
            
        </script>