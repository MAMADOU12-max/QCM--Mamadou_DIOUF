<?php
//fonction commun
function verifyinput($var) //good
    {
        $var = trim($var);  //enleve les espaces supplementaires dans notre formulaire
        $var = stripslashes($var); //les enleves tt les anti-slash
        $var = htmlspecialchars($var); // nous protege contre la faille xxs 
           return $var; 
    }
//fonction permettant de confirmer un un nom et un prenom
function is_nom($nom) //good
{
    $masque='#^[A-Z][a-z]{2,}[a-z]$#';
    if(preg_match($masque ,$nom))
    {
        return true;
    
    }
    else
    {
        return false;
    }
} 
   
//fonction qui permet de verifier un numero 
function is_numero($num) //good
{
    $masque = '#^7[7860]([-. ]?[0-9]{1}){7}$#';
    if(preg_match($masque, $num))
    {
        return true;
    }
    else{ return false;}

}

function is_address($mis)  //good
{
    if(preg_match('#^[A-Za-z][0-9]{?}[\s]#',$mis))
    {
        return true;
    }
    else{ return false; }
  }

  //fonction ki verifie un email good
    function is_login($login){
        if(preg_match('#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#',$login))
        {
            return true;
        }
        else{ return false; }

    }  

//function qui verifie un password  // Vérifie la présence d'au moins une majuscule et une minuscule.
function is_password($mdp){
    if(preg_match('#(^(?=.*[A-Z])(?=.*[a-z]))#',$mdp))
    {
        return true;
    }
    else{ return false; }

}  

// Regex _regex = new Regex("((^(?=.*[A-Z])(?=.*[a-z]))|"  