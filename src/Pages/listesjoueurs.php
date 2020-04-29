
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css">
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
                                    <div id="grand">
                                    <?php
                                            $tab = file_get_contents('../../asset/JSON/commun.json');
                                            $objet = json_decode($tab, true);
                                          
                                               $temp=array();
                                            //permet de ranger le score par ordre croissant                          
                                            for ($i=0; $i < count($objet); $i++)
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
                                      
                                            if(isset($objet))
                                            {
                                                $total=sizeof($objet);
                                            
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


                                            
                                                    echo'<table style="margin-left:120px; margin-top: -40px; border-collapse: collapse;"><tr>';
                                                    for($j=($page_num-1)*15;$j<$page_num*15;$j++)
                                                    {
                                                        if($j==$total )
                                                        {
                                                        break;
                                                        }
                                                        echo'<td  style="border: 2px solid black;">'. $objet[$j]['prenom'].'</td>';
                                                        echo'<td  style="border: 2px solid black;">'. $objet[$j]['nom'].'</td>';
                                                        echo'<td  style="border: 2px solid black;">'. $objet[$j]['score']."points".'</td>';
                                                        echo '<br>';
                                                        {
                                                            echo'</tr><tr>';
                                                        }
                                                    } 
                                                    echo'</tr></table>';

                                                    for ($i=1; $i <=$nbrPage ; $i++) 
                                                    {
                                                        echo "<div style=\" position: relative; top: 100px; margin-left: 163px;\"><a href='listesjoueurs.php?lien=3&page=".$i."' >Page $i  </a></div>";

                                                    }

                                            } 
                                      
                                            ?>
                                        </div>

                                        </div>
        
                                    </div>
        
                                </div>
                                       
                                     
                            </div> 
                        </div>
                        
                        
                      
                <div id="footer"></div>
         </form>
            
        </body> 
        </html>
        <script>
        //   var obj = {"question" : "Sammy", "réponse1" : "Shark", "réponse2" : "Ocean"}

        //     var objet = JSON.stringify(obj)
        </script>
        <script src="creerquestion.php"></script>