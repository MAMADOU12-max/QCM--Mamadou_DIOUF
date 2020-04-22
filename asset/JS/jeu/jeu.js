
 document.querySelector('#form-submit').addEventListener('submit',function(e){
    var a = document.querySelector('#num1')
    for ( i = 0; i < a.value.length; i++) {
       document.write("<form action='' method='post' id=\"recup\">")
       document.write("<input type='text' id='q' placeholder='saisir question'>")
       document.write("<input type='text' id='reponse1' placeholder='reponse1'>")
       document.write("<input type='text' id='reponse2' placeholder='reponse2'>")
       document.write("<input type='text' id='reponse3' placeholder='reponse3'>")
       document.write("<input type='text' id='answer' placeholder='preciser la vraie reponse ici'>")
       document.write("<input type='submit' id='click' placeholder='submit'><br><br>")
       document.write("<form>")
    }

   

   document.querySelector('#recup').addEventListener('submit',function(e){
      alert(document.getElementById("q") )
   //  var a = document.querySelector('#q') 
   //  var b = document.querySelector('#reponse1') 
   //  var c = document.querySelector('#reponse2') 
   //  var d = document.querySelector('#reponse3') 
   //  var e = document.querySelector('#answer')  

//     creer.q = a.value   
// creer.opt1 = b.value  
// creer.opt2 = c.value  
// creer.opt3 = d.value 
// creer.ans = e.value 
  
    
   })
  
})





    
    



 