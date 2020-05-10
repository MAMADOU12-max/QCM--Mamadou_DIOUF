        <?php      
                $champs_vide = "" ;
                // rajout des données dans json
                if (!empty($_POST)) {
                  $tab=[] ;
                  unset($_POST['bouton']) ;
                  $tab = $_POST;
                        $data = file_get_contents('../../asset/JSON/question.json') ;
                $data = json_decode($data, true);

                $data[]=$tab;
                $data = json_encode($data) ;
                // var_dump($data) ;

                file_put_contents('../../asset/JSON/question.json', $data) ;

                }else{ $champs_vide = "tout les champs sont obligatoires";}



            //     $open_json = file_get_contents('../../asset/JSON/question.json') ;
            //     $tab = json_decode($open_json , true) ;

            // if (isset($_POST['bouton']) && !empty($_POST['text']) && !empty($_POST['points']) && !empty($_POST['choix']) 
            // && (!empty($_POST['choix_texte']) || !empty($_POST['choix_unik']) || !empty($_POST['choix_multiple'])))
            //  {               
            //     $session['text'] = $_POST['text'] ;
            //     $session['points'] = $_POST['points'] ; 
            //     $session['choix'] = $_POST['choix'] ; 

            //         if(($_POST['choix']) == "simple" ){  
            //         $session['choix_unik'] = $_POST['choix_unik'] ;
            
            //             $proposition[] = 
            //             [
            //                 "question" => $session['text'] ,
            //                 "points" => $session['points'],
            //                 "option" => $session['choix'],
            //                 "reponse" => $session['choix_unik'] ,  
            //             ];
            //         $tab[] = $proposition ;
            //         $tabEncode = json_encode($tab) ;
            //         file_put_contents('../../asset/JSON/question.json', $tabEncode) ;
            //             }elseif(($_POST['choix']) == "multiple" ){
            //                 $session['choix_multiple'] = $_POST['choix_multiple'] ;
            //             $proposition = 
            //             [
            //                 "question" => $session['text'] ,
            //                 "points" => $session['points'],
            //                 "option" => $session['choix'],
            //                 "reponse" => $session['choix_multiple']  ,  
            //             ];
            //         $tab[] = $proposition ;
            //         $tabEncode = json_encode($tab) ;
            //         file_put_contents('../../asset/JSON/question.json', $tabEncode) ;

            //             }elseif(($_POST['choix']) == "texte" ){
            //                 $session['choix_texte'] = $_POST['choix_texte'] ;
            //             $proposition = 
            //             [
            //                 "question" => $session['text'] ,
            //                 "points" => $session['points'],
            //                 "option" => $session['choix'],
            //                 "reponse" => $session['choix_texte']  ,  
            //             ];
            //         $tab[] = $proposition ;
            //         $tabEncode = json_encode($tab) ;
            //         file_put_contents('../../asset/JSON/question.json', $tabEncode) ;
                                     
            //             }
            // } 
            
        ?>
   
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Creez vos questions</title>
        <link rel="stylesheet" href="../../asset/CSS/depotquizz.css">
      <style>
          .Gn{
            margin-left: 8px; 
            margin-top: 13px; 
            }
          .btn-first{
                background-color: turquoise ;
              margin-left: 4px;
              margin-top: -11px;
              width: 37px;
              height:37px;
            }
         .new{
            height: 20px; width: 160px;
            margin-top: 10px; 
            margin-left: 12px;
            display: flex;
         } 
         .new_btn{
             background-color: red; 
              margin-left: 1px;
              width: 25px;
              height:25px; 
         }  
         .check{
             margin-left: 12px;
              position: relative;
         }
         #error{
             color: red;
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
                                            
                            <div id="zone">
                                <div id="entete">
                                    <div id="text"> <h4>créer et paramétrer vos quizz</h4></div>
                                    <div id="ressortir"><a id="clik" href="../../index.php"> Déconnexion</a></div>
                                </div>
        
                                <div id="deal">
                                    <span id="petit">
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
                                    </span>

                                   <form  id="form" action="" method="post">
                                
                                        <span class="" style="width: 340px; padding-top: 12px; height: 280px; border: 1px solid turquoise;" id="grand" > 
                                            
                                            <div>   
                                                <label style="margin-top: 20px; position: absolute; margin-left:5px;" for="">Questions</label>
                                                <textarea name="question" id="question" class="area" cols="33" rows="3" style="position: absolute; margin-left: 70px;"></textarea>   
                                               
                                            </div>

                                            <div style="margin-top: 67px; margin-left: 8px;"  >
                                                <label for="">Nbre de Points</label>                                             
                                                <input style="height: 20px; width: 54px;" id="points" name="points" type="number">
                                                 <span id="error"><?php echo $champs_vide ;?></span>
                                            </div>

                                            <div id="inputs" class="Gn">
                                                <label for="">Types de réponse</label>            
                                                <select style="height: 35px; width: 160px;" placeholder="Donnez le type de réponse" name="choix" id="choix">
                                                    <option  value="simple">réponse à choix simple</option>
                                                    <option value="multiple">réponse à choix multiple</option>
                                                    <option value="texte">texte</option>
                                                </select>
                                                    <button type="button" id="btn-first" class="btn-first" onClick="genere()";>+</button>
                                            </div>

                                            <div>   
                                                <input type="submit" name="bouton" id="soumet" value="Enregistrer" style=" background-color: turquoise; height: 25px; width: 75px; position: absolute ;margin-left: 260px; margin-top: 40px;">
                                            </div>
                                        
                                        </span>
                                    
                                    </form> 
                                </div>
                                       
                                     
                            </div> 
                        </div>
                        
                <div id="footer"></div>
    
         <script>
         
        // FONCTION qui permet de generer des inputs
        //  var indice = 0 ;
        var nbr = 0 ;
         function genere(){
           nbr++ ; 
        //    indice++ ;
                // recup de l'id select
                 var choix = document.getElementById("choix").value  ;
                //divinputs est le div parent
                  var divinputs = document.getElementById("inputs");
                  //nous crreeons un div
                  var newinput  = document.createElement("div");
                  //on veut agreger a notre div les attributs suivants
                  newinput.setAttribute('class','new') ;              
                    // newinput.setAttribute("type","text");
                   newinput.setAttribute("id","reponse_"+nbr); 
                  
                     if(choix === "simple"){
                         var nb = 0 ;
                         //pour desactiver le bouton    
                        document.getElementById("btn-first").disabled = false;
                                  newinput.innerHTML = `
                        <input type="text" name="reponse${nbr}" class="new">
                        <input type="radio" value="${nbr}" name="exacte" class="radio">
                        <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>                      
                   `;   
                    } else if(choix === "multiple"){
                        document.getElementById("btn-first").disabled = false;
                        newinput.innerHTML = ` 
                        <input type="text" name="reponse${nbr}" class="new">
                        <input type="checkbox" value="${nbr}" name="exacte${nbr}" class="check" >
                        <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>
                   `;   
                    } else if(choix === "texte"){
                        //pour activer le bouton
                        document.getElementById("btn-first").disabled = true;
                        newinput.innerHTML = `
                        <input type="text" name="reponse"  class="new">
                        <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>                     
                   `; 
                    }
                    divinputs.appendChild(newinput) ; 
                  
                  } 

                //  function pour supprimer un input
                    function sup (n){ 
                       var target = document.getElementById('reponse_'+n) ; 
                            target.remove() ;
                       }
                //validation des champs
                    var question = document.getElementById('question');
                    var points = document.getElementById('points');
                    var new_input_text = document.getElementById('reponse');
                document.getElementById('soumet').addEventListener('click',function(e){
                   
                    if(points.value == "") {
                        e.preventDefault() ;
                        // alert('ok')
                        error.textContent = "**slate a mark**";
                    }else if(question.value == "") {
                        e.preventDefault() ;
                        // alert('ok')
                        error.textContent = "**Ask a question**";
                    }
                    // else if(new_input_text.value == "") {
                    //     e.preventDefault() ;
                    //     // alert('ok')
                    //     error.textContent = "**slate a answer**";                 
                })
            </script>
           
    </body> 
    </html>     
