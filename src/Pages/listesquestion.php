
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listes des questions</title>
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css">
    </head>
    <body>
        <!-- <form action="" method = "GET">  -->

            
            </div><div id="container">
                <div id="header"></div>
        
                         <div id="image">
        
                             <div id="acceuil">
                            <h3>le plaisir de jouer</h3>
                            </div>
                            
                
                            <div id="zone">
                                <div id="entete">
                                    <div id="text"> <h4>créer et paramétrer vos quizz</h4></div>
                                    <div id="ressortir"><a id="clik" href="../../index.php"> deconnexion</a></div>
                                </div>
        
                                <div id="deal">
                                    <div id="petit">
                                        <div id="img1">
                                            <img src="" alt="">
                                        </div>
                                        <div id="dessous1">
                                            <div id="liste"><a id="sk" href="listesquestion.php">Listes des Questions</a></div>
                                            <label id="img2" for=""> <img  src="../../asset/IMG/Images/Icones/ic-liste.png" alt=""> </label>
                                            <div id="liste1"><a id="sk1" href="creeradmin.php">Creer Admin</a></div>
                                            <label id="img2" for=""> <img  src="../../asset/IMG/Images/Icones/ic-ajout.png" alt=""> </label>  
                                            <div id="liste2"><a id="sk1" href="listesjoueurs.php">Listes Joueurs</a></div>
                                            <label id="img2" for=""> <img  src="../../asset/IMG/Images/Icones/ic-liste.png" alt=""> </label>    
                                            <div id="liste3"><a id="sk1" href="creerquestion.php">Creer Questions</a></div>
                                            <label id="img2" for=""> <img  src="../../asset/IMG/Images/Icones/ic-ajout.png" alt=""> </label>    
                                        </div>
                                    </div>
                                    <div id="liste_question">
                                    <form method="post">
                                             <table>
                                                <?php
                                                session_start();
                                                $tab = file_get_contents('../../asset/JSON/question.json');
                                                $objet = json_decode($tab, true);
                                                
                                                // $objet=[1,4,5,8,4,2,46,89,12,30,40,50,67];
                                                
                                                if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($objet)) {
                                                    $debut=$_SESSION['fin'];
                                                    $fin=$_SESSION['fin']+5;
                                                }elseif (isset($_POST['precedent']) && $_SESSION['fin']>10) {
                                                    $debut=$_SESSION['fin']-10;
                                                    $fin=$_SESSION['fin']-5;
                                                }else
                                                {
                                                    $debut=0;
                                                    $fin=5;
                                                }
                                                $_SESSION['j']=$debut+1;
                                        for ($i=$debut; $i <$fin ; $i++) {
                                            if ($i<count($objet)) {
                                                
                                                        echo $objet[$i]['question'].'<br>' ;
                                                        if ($i<count($objet)) {
                                                            if($objet[$i]["choix"]=="texte"){
                                                                $reponse=$objet[$i]["reponse"];
                                                                echo "<input type='texte' readonly value='$reponse' style='font-weight: bold;text-align: center;border-radius: 5%;height: 30px;'><br><br>";
                                                            }
                                                            elseif($objet[$i]["choix"]=="simple"){
                                                                for($k=1;$k<=10;$k++){
                                                                    if(isset($objet[$i]["reponse$k"])){

                                                                        if($objet[$i]["exacte"]==$k){

                                                                            $reponse=$objet[$i]["reponse$k"];
                                                                            echo "<input type='radio' disabled checked value='$reponse'>".$reponse."<br><br>";
                                                                    }
                                                                    if($objet[$i]["exacte"]!=$k){

                                                                        $bien=$objet[$i]["reponse$k"];
                                                                        echo "<input type='radio' disabled  value='$bien'>".$bien."<br><br>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        elseif($objet[$i]["choix"]=="multiple"){
                                                            for($k=1;$k<=10;$k++){
                                                                if(isset($objet[$i]["reponse$k"])){

                                                                    if(@$objet[$i]["exacte$k"]==$k){
                                                                        $bonne=$objet[$i]["reponse$k"];
                                                                        echo "<input type='checkbox' disabled checked value='$bonne'>".$bonne."<br><br>";
                                                                }
                                                                if(@$objet[$i]["exacte$k"]!=$k){

                                                                    $bien=$objet[$i]["reponse$k"];
                                                                    echo "<input type='checkbox' disabled  value='$bien'>".$bien."<br><br>";
                                                                }
                                                                }
                                                            }
                                                        }


                                                        $_SESSION['j']++;
                                                    }
                                                    $_SESSION['j']++;
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

                                            
                                        </form>

                                    
                                        </div>
        
                                    </div>
        
                                </div>
                                       
                                     
                            </div> 
                        </div>
                        
                                              
                <div id="footer"></div>
        </body>
        </html>