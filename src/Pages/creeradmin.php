

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
        <link rel="stylesheet" href="../../asset/CSS/cptcreation1.css"> 
    </head>
    <body>
        <form action="" method = "post"> 

            


        <?php


include("../fonction.php");
             
$joueur = file_get_contents('../../asset/JSON/commun.json') ;
$objet = json_decode($joueur , true) ;
   


if(isset($_POST['creer']) && verifyinput(is_nom($_POST['firstname']))  &&  verifyinput(is_nom($_POST['lastname'])) && 
verifyinput(is_password($_POST['password'])) && is_login($_POST['login']) )    
{
      if ($_POST['password'] ===$_POST['confirmation']) {




//          $dossier = '../../asset/IMG/Images/img/';
// $fichier = basename($_FILES['avatar']['name']);
// $taille_maxi = 1000000;
// $taille = filesize($_FILES['avatar']['tmp_name']);
// $extensions = array('.png', '.gif', '.jpg', '.jpeg');
// $extension = strrchr($_FILES['avatar']['name'], '.'); 
// //Début des vérifications de sécurité...
// if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
// {
// $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
// }
// if($taille>$taille_maxi)
// {
// $erreur = 'Le fichier est trop gros...';
// }
// if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
// {
// //On formate le nom du fichier ici...
// $fichier = strtr($fichier, 
// 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
// 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
// $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
// if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
// {
// echo 'Upload effectué avec succès !';
// }
// else //Sinon (la fonction renvoie FALSE).
// {
// echo 'Echec de l\'upload !';
// }
// }
// else
// {
// echo $erreur;
// }

 $firstname = $_POST['firstname'] ;
 $lastname =  $_POST['lastname'] ;
 $password = $_POST['password'] ;
 $login = $_POST['login'] ;

 
//   echo'<img id="cool" src="' . $objet[$i]['image'] .'">' ;
   $_SESSION['firstname'] = $_POST['firstname'] ;
   $_SESSION['lastname'] = $_POST['lastname'] ;
   $_SESSION['login'] = $_POST['login'] ;
   $_SESSION['password'] = $_POST['password'] ;
 



   $nouveauadmin = 
   [
       'nom' => $firstname ,
        'prenom' => $lastname ,
        'login' =>  $login ,   
        'mot de passe' =>  $password ,
       
             'profil' => "admin" ,
            
          
   ]  ;
     $objet[] = $nouveauadmin ;
    $objetEncode = json_encode($objet) ;

    file_put_contents('../../asset/JSON/commun.json' ,$objetEncode) ;

         header('location:Bienvenue.html');

   }else{ echo '<div >write same password please</div>' ;}
   
}
elseif (isset($_POST['creer']) && (empty($_POST['firstname']) || empty($_POST['lastname']) && 
empty($_POST['password']) || empty($_POST['login']))) {
     echo "you must fill all box!" ;
}

 elseif(isset($_POST['creer']) && !(is_nom($_POST['firstname'])) ) 
   {     
    echo '<div"> your firstname is not valable</div>';}
    elseif(isset($_POST['creer']) && !(is_nom($_POST['lastname'])) ) 
    {     
     echo '<div> your lastname is not good</div>';}
     elseif(isset($_POST['creer']) && !(is_login($_POST['login'])) ) 
     {     
      echo '<div>*****BAD mail*****</div>';}
      elseif(isset($_POST['creer']) && !(is_password($_POST['password'])) ) 
      {     
       echo '<div>password must contain great and small letters at least </div>';}
     




?>


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
                                            <label id="img2" for=""> <img src="images/icones/ic-liste.png" alt=""> </label>
                                            <div id="liste1"><a id="sk1" href="creeradmin.php">Creer Admin</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-ajout.png" alt=""> </label>  
                                            <div id="liste2"><a id="sk1" href="listesjoueurs.php">Listes Joueurs</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-liste.png" alt=""> </label>    
                                            <div id="liste3"><a id="sk1" href="">Creer Questions</a></div>
                                            <label id="img2" for=""> <img src="images/icones/ic-ajout.png" alt=""> </label>    
                                        </div>
                                    </div>
                                    <div id="grand">
                                        <div id="part1">
                                        <h5>s'inscrire</h5>
                                            <h6>Pour creer des quizz</h6>
        
                                            <div class="label">
                                            <label for="firsname">Prenom</label>
                                            </div>
        
                                            <div class="input">
                                            <input type="text" name="firstname">
                                            </div>
        
                                            <div class="label">
                                            <label for="name">Nom</label>
                                            </div>
        
                                            <div class="input">
                                            <input type="text" name="lastname">
                                            </div>
        
                                            <div class="label">
                                            <label for="login">Login</label>
                                            </div>
        
                                            <div class="input">
                                            <input type="text" name="login">
                                            </div>
        
                                            <div class="label">
                                            <label for="password">Password</label>
                                            </div>
        
                                            <div class="input">
                                            <input type="text" name="password">
                                            </div>
        
                                            <div class="label">
                                            <label for="confirmation">Confirmer password</label>
                                            </div>
        
                                            <div class="input">
                                            <input type="text" name="confirmation">
                                            </div>
                                            
                                        </div>
                                        <div id="part2">
        
                                        </div>
        
                                    </div>
        
                                </div>
                                       
                                     
                            </div> 
                        </div>
                        
                        
                      
                <div id="footer"></div>
                                            <div id="bod">
                                            <div id="dernier">
                                                <h7>Avatar</h7>
                                            </div>
                                            <div id="clik2">
                                                <button id="button2">Choisir un fichier</button>
                                            </div>
                                            <div id="clik3">
                                                <button id="button3" name="creer">Creer un compte</button>
                                            </div>
                                            </div>
         </form>
            
        </body>
        </html>


