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
        <style>
            #text-jeu
            {
                margin-left: 180px;
                position:absolute;
            }
            p{
                font-size: 12px;
                bottom: 20px;
                position: relative;
                font-weight:bold;
                text-transform: uppercase;
                text-align: center;
              
            }
            #ressortir
            {
                position: relative;
                display: inline-table;
                float: left;
                text-align: center;
                margin-left: 600px;
                color: cornsilk;
                bottom: 6px;
                background-color: turquoise;
            }
            #sort
            {
               
                border-radius: 2px;
                border-color: turquoise;
            }
            #clik
            {
                color: cornsilk;
                text-decoration: none;
            
            }
            .jeu
            {
                width: 60%;
                height: 290px;
                border:1px solid blue;
                position: absolute;
               border-radius: 3px;
               margin-left: 20px;
               margin-top: 10px;
            }
            .btn
            {
                background-color: green;
                position: relative;
                margin-top: 70px;
                margin-left: 90px;
                border-radius: 5px;
            }
            h3
            {
                font-size: 22px;
                color: black;
                margin-left: 160px;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <form action="" method = "post"> 

            
            </div><div id="container">
                <div id="header"> </div>
        
                         <div id="image">
        
                             <div id="acceuil">
                            <h3>le plaisir de jouer</h3>
                            </div>
                            
                
                            <div id="zone">
                                <div id="entete">
                                    <div id="text-jeu"><p> Bienvenue sur la plateforme de jeu de quizz <br> jouer
                                 et tester votre niveau de culture generale<p></div>
                                    <div id="ressortir"><a id="clik" href="pageconnexion.php"> Déconnexion</a></div>
                                </div>
                               <div class="partie-jeux">
                                    <span class="jeu">
                                        <h3>Questions 1/5:</h3>
                                        <h4>Les languages Web</h4>
                                        <input type="checkbox">
                                        <label for="">HTML</label><br>
                                        <input type="checkbox">
                                        <label for="">R</label><br>
                                        <input type="checkbox">
                                        <label for="">JAVA</label>
                                        <div>
                                      <span ><input class="btn" type="submit" value="Précédent"></span>  
                                      <span ><input class="btn" type="submit" value="Suivant"></span>
                                      </div>  
                                    </span>
                                    <span class="score">
                              
                                    </span>
                                  

                               </div>
        
                               
                                       
                                     
                            </div> 
                        </div>
                        
                        
                      
                <div id="footer"></div>
         </form>
            
        </body>
        </html>