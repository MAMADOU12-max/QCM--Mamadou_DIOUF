

<?php
           include("../fonction.php");
             
           $joueur = file_get_contents('../../asset/JSON/commun.json') ;
           $objet = json_decode($joueur , true) ;
              
          
           
           if(isset($_POST['creer']) && verifyinput(is_nom($_POST['firstname']))  &&  verifyinput(is_nom($_POST['lastname'])) && 
           verifyinput(is_password($_POST['password'])) && is_login($_POST['login']) )    
           {
                 if ($_POST['password'] ===$_POST['confirmation']) {




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
     
            $firstname = $_POST['firstname'] ;
            $lastname =  $_POST['lastname'] ;
            $password = $_POST['password'] ;
            $login = $_POST['login'] ;
            $avatar = $_FILES['avatar'];
            
          //   echo'<img id="cool" src="' . $objet[$i]['image'] .'">' ;
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
                  
                        'profil' => "joueur" ,
                        'image' =>  $_FILES['avatar'],
                        'score' => 0 ,
              ]  ;
                $objet[] = $nouveaujoueur ;
               $objetEncode = json_encode($objet) ;
           
               file_put_contents('../../asset/JSON/commun.json' ,$objetEncode) ;

                    header('location:pagejeu.php');

              }else{ echo '<div style="color: red; font-size: 14px; position: relative; top: 467px; left: 160px">write same password please</div>' ;}
              
           }
           elseif (isset($_POST['creer']) && (empty($_POST['firstname']) || empty($_POST['lastname']) && 
           empty($_POST['password']) || empty($_POST['login']))) {
                echo "you must fill all box!" ;
           }
           
            elseif(isset($_POST['creer']) && !(is_nom($_POST['firstname'])) ) 
              {     
               echo '<div style="color: red; font-size: 14px; top: 267px; left: 160px"> your firstname is not valable</div>';}
               elseif(isset($_POST['creer']) && !(is_nom($_POST['lastname'])) ) 
               {     
                echo '<div style="color: red; font-size: 14px; top: 228px; left: 165px"> your lastname is not good</div>';}
                elseif(isset($_POST['creer']) && !(is_login($_POST['login'])) ) 
                {     
                 echo '<div style="color: red; font-size: 14px; top: 297px; left: 175px">*****BAD mail*****</div>';}
                 elseif(isset($_POST['creer']) && !(is_password($_POST['password'])) ) 
                 {     
                  echo '<div style="color: red; font-size: 14px; top: 360px; left: 85px">password must contain great and small letters at least </div>';}
                
           ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/CSS/joueur_profil.css">
<style>
      
     .cercle{
          background-color: yellow;
          width: 250px;
          height: 250px;
          position: relative;
          margin-left: 600px;
          border-radius: 130px;
     }

</style>

</head>
<body>
    <div class="header"></div>
        <div class="logo"></div>
        <div class="header-text">Le Plaisir de Jouer</div>
    <div class="content">
            <div class="center">
                 

                        
                          <form action="" method="post" id="joueur" enctype="multipart/form-data">   
                               
                              <span id="formulaire">   
                                  <h5>s'inscrire</h5>
                                     <h6>Pour tester votre niveau de culture </h6>

                                     <div class="label">
                                     <label for="firsname">Firstname</label>
                                    
                                     </div>

                                     <div class="input">
                                     <input type="text" name="firstname" id="firstname">
                                     <div class="error-form" error1="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="lastname">Lastname</label>
                                  
                                     </div>

                                     <div class="input">
                                     <input type="text" name="lastname" id="lastname">
                                     <div class="error-form" error2="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="login">Login</label>
                                     </div>

                                     <div class="input">
                                     <input type="text" name="login" id="login">
                                     <div class="error-form" error3="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="password">Password</label>
                                     </div>

                                     <div class="input">
                                     <input type="text" name="password" id="password">
                                     <div class="error-form" error4="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="confirmation">Confirm your password</label>
                                     </div>

                                     <div class="input">
                                       <input type="text" name="confirmation" id="confirmation">
                                       <div class="error-form" error5="error-1"></div>
                                       </div>
                  

                                

                                          
                                                <div class="tof"></div>
                                                <div class="bas">
                                                      <div id="dernier">
                                                            <a id="annule" href="../index.php">Annuler</a>
                                                      </div>
                                                      <div id="clik2">
                                                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
                                                            
                                                            <input type="file" id="button2" name="avatar"  class="bouton" 
                                                            
                                                            onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])">
                                                      </div>
                                                      <div class="clik3">
                                                            <button type="submit" class="button3" name="creer">Creer un compte</button>
                                                      </div>
                                                </div>
                                         
                                    </span>
                             <!-- <script src="../asset/JS/index.js"></script>       -->
                           </form>

             
                                <div class="cercle">
                                   <img style="height: 250px; width: 250px; border-radius: 130px; "  id="photo" alt="">
                                   Avatar
                                </div>
                       

</body>
</html>

