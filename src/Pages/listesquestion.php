    <?php
        session_start();    
        //  @setcookie("numb",$num ,(time()+60*60*24*30));  
                          
        $tab = file_get_contents('../../asset/JSON/question.json');
        $objet = json_decode($tab, true); 

            //json pour stocker des le nbre voulu par admin 
            $stock= file_get_contents('../../asset/JSON/stock_valeur.json');
            $stock= json_decode($stock,true) ;
         if (isset($_POST['apply']) && !empty($_POST["num"]) ){
            $num = $_POST['num'] ;  
             
            $stockEncode = json_encode($num)   ;
            file_put_contents('../../asset/JSON/stock_valeur.json',$stockEncode);
        //    var_dump(file_put_contents('../../asset/JSON/stock_valeur.json',$stockEncode) ) ;                                                      
        }                                         
    ?> 
   
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listes des questions</title>
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css">
        <style>
            #error{
                color: red;
                font-size: 1em ;
            }
            .cercle{
                background-color: gray;
                width: 90px;
                height: 90px;
                position: relative;
                margin-left: 10px;
                border-radius: 50px;
            }
            /* .manque-error{
                margin-left: 40px;
            }
            .error{
                color: red;
                font-size: 0.9em;
            } */
        </style>
    </head>
    <body>
    
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
                                        
                                        <?php
                                        if(isset($_POST['img_charge'])){ 
                              
                              $dossier = '../../asset/IMG/Images/img/';
                              $fichier = basename($_FILES['avatar']['name']);
                              $taille_maxi = 1000000;
                              $taille = filesize($_FILES['avatar']['tmp_name']);
                              $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                              $extension = strrchr($_FILES['avatar']['name'], '.'); 
                              //Début des vérifications de sécurité...
                              if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                              {
                                   $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
                              }
                              if($taille>$taille_maxi)
                              {
                                   $erreur = 'Le fichier est trop gros...';
                              }
                              if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                              {
                                   //On formate le nom du fichier ici...
                                   $fichier = strtr($fichier, 
                                        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                                   $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                                   if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                                   {
                                        echo 'Upload effectué avec succès !';
                                   }
                                   else //Sinon (la fonction renvoie FALSE).
                                   {
                                        echo 'Echec de l\'upload !';
                                   }
                              }
                              else
                              {
                                   echo $erreur;
                              }
                         }
                        //  else{ $fill_tof ="you must enter an image" ;}

                                            
                                       ?>  
                                            <div class="cercle"> 
                                                <img name="img_charge" style="height: 0px; width: 0px; border-radius: 1px; "  id="photo" alt="" src="<?php $_SESSION['admin_image'];?>">
                                                <p style="color:black;margin-left:100px;">Avatar</p> 
                                                <div style="margin-left:1px;" class="error"><?php ?></div>
                                            </div>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
                                                            
                                             <input type="file" id="button2" name="avatar"  class="bouton" 
                                                            
                                            onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])">  

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
                                            <label for="">Nombre de question souhaité par jeu</label><br>
                                            <input type="number" id="numb" min ="6" name="num" placeholder= "saisissez ici un chiffre"><br>
                                            <span id="error"></span>
                                            <button type="submit" id="apply" name="apply">apply</button><br>
                                        
                                             <table>
                                                <?php                                                
                                                $tab = file_get_contents('../../asset/JSON/question.json');
                                                $objet = json_decode($tab, true);                                               
                                                // $objet=[1,4,5,8,4,2,46,89,12,30,40,50,67];
                                                
                                                //  var_dump($tab) ;
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
                                        for ($i=$debut; $i < $fin ; $i++) {
                                            if ($i< $fin && $i< count($objet)) {
                                                        //  $objet = $objet-$value ;
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
        <script>   
        //    validation en js
            var apply = document.getElementById('apply') ;
            var num = document.getElementById('num') ;
            var error = document.getElementById('error') ;
          
            apply.addEventListener('click',function(e){
                //verifie si le champs n'est pas vide
                if (num.value == "") {
                    e.preventDefault()
             
                    error.innerHTML = "put something before"
                    // verifie si la valeur saisie est superieur a 6
                }else if (num.value < 6) {
                    e.preventDefault()
             
                    error.innerHTML = "bigger than 5 please"
                    // alert('ok')
                }
                 
            })
        </script>
       