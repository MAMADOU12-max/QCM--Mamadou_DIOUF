
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listes des joueurs</title>
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css">
        <style>
            .contain-table{
                background-color:turquoise;
                border-radius: 15px;
                width:330px;
                height:170px;
                margin-left:200px;
                text-align:center;
            }
            .mon-table{
                width: 200px;
                height:100px;
                background-color: yellow;
                border-collapse:collapse;
                margin-left:70px;
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
                margin-top: 80px; 
                margin-left: 330px;
                text-align:center;
               border-radius: 5px;
            }
        </style>
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
                                          
                                            $cpt=count($objet);
                                            $temp=array();
                                            //permet de ranger le score par ordre croissant                          
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


                                                    $_SESSION['meilleur']=$objet; 
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