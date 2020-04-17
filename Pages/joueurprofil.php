

<?php
           include("../src/fonction.php");
             
           $joueur = file_get_contents('../commun.json') ;
           $objet = json_decode($joueur , true) ;
      //      for ($i=0; $i < count($objet) ; $i++) { 
      //      echo'<img id="cool" src="' . $objet[$i]['image'] .'">' ;  }
          
           
           if(isset($_POST['creer']) && verifyinput(is_nom($_POST['firstname']))  &&  verifyinput(is_nom($_POST['lastname'])) && 
           verifyinput(is_password($_POST['password'])) && is_login($_POST['login']))    
           {
                 if ($_POST['password'] ===$_POST['confirmation']) {

            $firstname = $_POST['firstname'] ;
            $lastname =  $_POST['lastname'] ;
            $password = $_POST['password'] ;
            $login = $_POST['login'] ;
            // echo'<img id="cool" src="' . $objet[$i]['image'] .'">' ;
              $_SESSION['firstname'] = $_POST['firstname'] ;
              $_SESSION['lastname'] = $_POST['lastname'] ;
              $_SESSION['login'] = $_POST['login'] ;
              $_SESSION['password'] = $_POST['password'] ;
           
           
              $nouveaujoueur = 
              [
                  'nom' => $firstname ,
                   'prenom' => $lastname ,
                   'login' =>  $login ,   
                   'mot de passe' =>  $password ,
                        'profil' => "joueur" ,
              ]  ;
                $objet[] = $nouveaujoueur ;
               $objetEncode = json_encode($objet) ;
           
               file_put_contents('../commun.json' ,$objetEncode) ;
            
    
          header('location:pagejeu.php') ;
              }else{ echo '<div style="color: red; font-size: 14px; position: relative; top: 467px; left: 160px">write same password please</div>' ;}
              
           }
           // elseif (isset($_POST['creer']) && (empty($_POST['firstname']) || empty($_POST['lastname']) && 
           // empty($_POST['password']) || empty($_POST['login']))) {
           //      echo "you must fill all box!"
           // }
           
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
    <link rel="stylesheet" href="joueur_profil.css">
</head>
<body>
    <div class="header"></div>
        <div class="logo"></div>
        <div class="header-text">Le Plaisir de Jouer</div>
    <div class="content">
            <div class="center">
                 

                        
                          <form action="" method="post">   
                               
                              <span id="formulaire">   
                                  <h5>s'inscrire</h5>
                                     <h6>Pour tester votre niveau de culture </h6>

                                     <div class="label">
                                     <label for="firsname">Firstname</label>
                                    
                                     </div>

                                     <div class="input">
                                     <input type="text" name="firstname" >
                                     <div class="error-form" error1="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="lastname">Lastname</label>
                                  
                                     </div>

                                     <div class="input">
                                     <input type="text" name="lastname" >
                                     <div class="error-form" error2="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="login">Login</label>
                                     </div>

                                     <div class="input">
                                     <input type="text" name="login" >
                                     <div class="error-form" error3="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="password">Password</label>
                                     </div>

                                     <div class="input">
                                     <input type="text" name="password" >
                                     <div class="error-form" error4="error-1"></div>
                                     </div>

                                     <div class="label">
                                     <label for="confirmation">Confirm your password</label>
                                     </div>

                                     <div class="input">
                                       <input type="text" name="confirmation" >
                                       <div class="error-form" error5="error-1"></div>
                                       </div>
                  

                                

                                          
                                                <div class="tof"></div>
                                                <div class="bas">
                                                      <div id="dernier">
                                                            <a id="annule" href="../index.php">Annuler</a>
                                                      </div>
                                                      <div id="clik2">
                                                            <input type="file" id="button2">
                                                      </div>
                                                      <div class="clik3">
                                                            <button class="button3" name="creer">Creer un compte</button>
                                                      </div>
                                                </div>
                                         
                                    </span>
                                   
                           </form>

</body>
</html>
              