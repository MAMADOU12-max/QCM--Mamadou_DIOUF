 <?php
      session_start();
?>

<?php
           include("../src/fonction.php");
             
           $joueur = file_get_contents('../commun.json') ;
           $objet = json_decode($joueur , true) ;
         
          
           
           if(isset($_POST['creer']) && verifyinput(is_nom($_POST['firstname']))  &&  verifyinput(is_nom($_POST['lastname'])) && 
           verifyinput(is_password($_POST['password'])) && is_login($_POST['login']))    
           {
                 if ($_POST['password'] ===$_POST['confirmation']) {





                    $dossier = '../asset/img/';
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
     




            $firstname = $_POST['firstname'] ;
            $lastname =  $_POST['lastname'] ;
            $password = $_POST['password'] ;
            $login = $_POST['login'] ;
            $avatar = $_FILES['avatar'];
            
            
              $_SESSION['firstname'] = $_POST['firstname'] ;
              $_SESSION['lastname'] = $_POST['lastname'] ;
              $_SESSION['login'] = $_POST['login'] ;
              $_SESSION['password'] = $_POST['password'] ;
              $_SESSION['avatar'] = $_FILES['avatar'] ;
           
              $nouveaujoueur = 
              [
                  'nom' => $firstname ,
                   'prenom' => $lastname ,
                   'login' =>  $login ,   
                   'mot de passe' =>  $password ,
                   'profil' => "admin" ,
                   'image' =>  $_FILES['avatar'],
                     
              ]  ;
                $objet[] = $nouveaujoueur ;
               $objetEncode = json_encode($objet) ;
           
               file_put_contents('../commun.json' ,$objetEncode) ;
            
    
          header('location:Bienvenue.html') ;
             }else{ echo "write same password please</div>" ;}
              
              
          }
           elseif (isset($_POST['creer']) && (empty($_POST['firstname']) || empty($_POST['lastname']) && 
           empty($_POST['password']) || empty($_POST['login']))) {
                echo "you must fill all box! " ;
           }
           
            elseif(isset($_POST['creer']) && !(is_nom($_POST['firstname'])) ) 
              {     
               echo "your firstname is not valable";}
               elseif(isset($_POST['creer']) && !(is_nom($_POST['lastname'])) ) 
               {     
                echo " your lastname is not good";}
                elseif(isset($_POST['creer']) && !(is_login($_POST['login'])) ) 
                {     
                 echo "*****BAD mail*****";}
                 elseif(isset($_POST['creer']) && !(is_password($_POST['password'])) ) 
                 {     
                  echo "password must contain great and small letters at least ";}
                
           ?>
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
        <link rel="stylesheet" href="../asset/CSS/creeradmin.css">

        <style>
      
     .cercle{
          background-color: turquoise;
          width: 190px;
          height: 190px;
          position: relative;
          margin-left: 760px;
          border-radius: 130px;
           top: 280px ;
     }

</style>
    </head>
    <body>
       

            
            <div id="container">

                <div id="header"></div>
        
                <div id="image">

                    <div id="acceuil">
                        <h3>le plaisir de jouer</h3>
                    </div>
                    <div id="entete">
                        <span id="text"> <h4>créer et paramétrer vos quizz</h4></span>
                        <span id="ressortir"><a id="clik" href="../index.php">DECONNEXION</a></span>
                    </div>

                    <span class="petit">
                        <div class="img1">

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

                    </span> 
                    
                    
                    <span class="part1">
                        <form action="" method = "post"> 
                            <h5>s'inscrire</h5>
                            <h6>Pour creer des quizz</h6>
        
                            <div class="label">
                                <label for="firsname">Prenom</label>
                            </div>
        
                            <div class="input">
                                <input type="text" name="firstname" required>
                            </div>
        
                            <div class="label">
                                <label for="name">Nom</label>
                            </div>
        
                            <div class="input">
                                <input type="text" name="lastname" required>
                            </div>
        
                            <div class="label">
                                <label for="login">Login</label>
                            </div>
        
                            <div class="input">
                                <input type="text" name="login" required>
                            </div>
        
                            <div class="label">
                                <label for="password">Password</label>
                            </div>
        
                            <div class="input">
                                <input type="text" name="password" required>
                            </div>
        
                            <div class="label">
                                <label for="confirmation">Confirmer password</label>
                            </div>
        
                            <div class="input">
                                <input type="text" name="confirmation" required>
                            </div>



                                            
                      <div class="avatar">      <h3>Avatar</h3> </div>
                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <div class="fiche"><input type="file" name="avatar" id="fichier"  onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])"></div>  
                          <div class="click"><input type="submit" name="creer" value="submit" id="clik"></div>  
                        </form>
                    </span>
                   
                                        
                  
               </div>        
                      
                <div id="footer"></div>
           </div>                             
           <span>

                            
<div class="cercle">
               <img style="height: 190px; width: 190px; border-radius: 130px; "  id="photo" alt="">
         
            </div>
</span>
            
        </body>
        </html>




