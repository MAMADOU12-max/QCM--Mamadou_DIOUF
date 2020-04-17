<?php
    session_start() ;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Page connexion </title>
    <link rel="stylesheet" href="asset/CSS/pageconnexion.css">
</head>
<body>
<div id="container">
        <div id="header"></div>

                 <div id="center">
                 <img  id="center" style=' position: "absolute" ; ' src="asset/IMG/images/img-bg.jpg" alt=""> 
                     <div id="bande">
                    <h3>le plaisir de jouer</h3>
                    </div>
                    
        
                          <div id="zone">
                                <div id="login">
                                    <h4>login form</h4>
                                    <label for=""></label>
                                </div>
                                
                                    <form id="form" action=""  method="post">
                                        <div class="ensemble">
                                            <div class="input">
                                                <input type="text" id="input" value="<?php if(isset($_POST['login'])) {  echo $_POST['login'] ; } ?>" name="login" placeholder="login">
                                            </div>
                                            <div class="img">
                                                <label class="label" for="login"><img id="carnar" src=url(asset/IMG/images/Icones/ic-login.png) alt=""></label>
                                            </div>
                                        </div>
                                        <div class="ensemble">
                                            <div class="input">
                                                <input type="text" id="input" value="<?php if(isset($_POST['mdp'])) {  echo $_POST['mdp'] ; }  ?>" name="mdp" placeholder="password">
                                            </div>
                                            <div class="img">
                                                <label id="label0" for="mdp"><img  src="Images/Icones/icone-password.png" alt=""></label>
                                            </div>
                                        </div>
                                        <button id="bouton" name="clik" type="submit">connexion</button>
                                        <div id="inscrire"><a id="ins" href="Pages/joueurprofil.php">s'inscrire pour jouer?</a></div>
                                    </form>
                             
                             </div> 
                
                
                </div>  
        <div id="footer"></div>
          

</div>                
        
</body>
</html>
<?php 




              

 if(isset($_POST['clik']) && !empty($_POST['login']) && !empty($_POST['mdp']))  {      
     $login = $_POST['login'] ;
     $mdp = $_POST['mdp'] ; 
     $_SESSION['login'] = $_POST['login'] ;
     $_SESSION['mdp'] =$_POST['mdp'] ;
     
    //  $mdpError= $loginError =""; 
  
    $tab = file_get_contents('commun.json');
    $objet = json_decode($tab, true);
 
     
        for ($i = 0; $i < count($objet); $i++) {
    
            if ( $_SESSION['login'] == $objet[$i]['login'] &&   $_SESSION['mdp'] == $objet[$i]['mot de passe']) {
                if($objet[$i]['profil']=== "admin"){
                    
                    header("Location:Pages/cptcreation.php");
                }
                if($objet[$i]['profil']=== "joueur"){  
                 
                    header("Location:Pages/pagejeu.php");
                }
              
            }else{ echo '<div style="color: red; padding-top: 200px; padding-left: 500px; position: absolute;">
                not corresponding password and login</div>'; }
        }
       
  
  
     
    }elseif(isset($_POST['clik']) && (empty($_POST['login']) || empty($_POST['mdp']))) 
    { echo '<div style="color: red; padding-top: 260px; padding-left: 550px; position: absolute;">
        you must fill all box!</div>';    } 
        
 
 
 
?> 