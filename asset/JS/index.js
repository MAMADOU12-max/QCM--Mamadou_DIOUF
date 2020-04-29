
// validation au niveau dela page de connexion
var numb1 = document.querySelector('#input1') ;
var numb2 = document.querySelector('#input2') ;
document.querySelector('#form').addEventListener('submit',function(e){  
   if ((numb1.value  == "" &&  numb2.value  == "" )) {
    //    alert('you must fill all box')
    e.preventDefault();
    login_error.textContent = "you must fill all box" ;
   }else if(numb1.value  == "" &&  numb2.value  != "" ){
            e.preventDefault();
      login_error.textContent = "you must give a login" ;
   }else if(numb1.value  != "" &&  numb2.value == "" ){
            e.preventDefault();
      password_error.textContent = "****lake password****" ;
   } 
})




