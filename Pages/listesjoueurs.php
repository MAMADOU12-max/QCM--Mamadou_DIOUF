<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="cptcreation1.css">
    </head>
    <body>
        <form action="" method = "post"> 

            
            </div><div id="container">
                <div id="header"></div>
        
                         <div id="image">
        
                             <div id="acceuil">
                            <h3>le plaisir de jouer</h3>
                            </div>
                            
                
                            <div id="zone">
                                <div id="entete">
                                    <div id="text"> <h4>créer et paramétrer vos quizz</h4></div>
                                    <div id="ressortir"><a id="clik" href="pageconnexion.php"> deconnexion</a></div>
                                </div>
        
                                <div id="deal">
                                    <div id="petit">
                                        <div id="img1">
                                            <img src="" alt="">
                                        </div>
                                        <div id="dessous1">
                                            <div id="liste"><a id="sk" href="listesquestion.php">Listes des Questions</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-liste.png" alt=""> </label>
                                            <div id="liste1"><a id="sk1" href="creeradmin.php">Creer Admin</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-ajout.png" alt=""> </label>  
                                            <div id="liste2"><a id="sk1" href="listesjoueurs.php">Listes Joueurs</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-liste.png" alt=""> </label>    
                                            <div id="liste3"><a id="sk1" href="creerquestion.php">Creer Questions</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-ajout.png" alt=""> </label>    
                                        </div>
                                    </div>
                                    <div id="grand">
                                    <?php
                                        $tab = file_get_contents('../commun.json');
                                         $objet = json_decode($tab, true);
                                        
                                      
                                            echo '<table style="margin-left:100px; border-collapse: collapse;" >' ;
                                            echo "<tr>";
                                               echo '<th style="border: 2px solid black;">NOM</th>' ;
                                                echo '<th style="border: 2px solid black;">PRENOM</th>';
                                                echo '<th style="border: 2px solid black;">SCORE</th>' ;
                                            echo"</tr>";    
                                                echo ' <tr style="border: 2px solid black;">';
                                                for ($i=0; $i < count($objet) ; $i++) { 
                                                    if ($objet[$i]['profil']=='joueur') {
                                                        echo '<td style="border: 2px solid black;">' ;
                                                        echo $objet[$i]['nom'] ;
                                                        echo '</td>' ;

                                                        echo '<td style="border: 2px solid black;">' ;
                                                        echo $objet[$i]['prenom'] ;
                                                        echo '</td>' ;

                                                        echo '<td style="border: 2px solid black;">' ;
                                                        
                                                        echo '</td>' ;
                                                    }
                                                       
                                                }
                                                
                                               echo "</tr>";

                                            
                                           echo "</table>";

                                        
                                          

                                                    
                                                   
                                        
                                    ?>                                             
                                        </div>
        
                                    </div>
        
                                </div>
                                       
                                     
                            </div> 
                        </div>
                        
                        
                      
                <div id="footer"></div>
         </form>
            
        </body>
        </html>