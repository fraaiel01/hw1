let errors = [];
errors[0]=1;
errors[1]=1;
errors[2]=1;
errors[3]=1;
errors[4]=1;
errors[5]=1;


function fetchResponse(response) {
   console.log("risposta 1");
   return response.json();
}

function controlloNome(event){
  if(event.currentTarget.value===""){
      const error="Inserisci il nome";
      const element=document.createElement("div");
      element.innerText=error;
      element.classList.add("errore");
  if(event.currentTarget.parentNode.parentNode.querySelector(".errore")===null)
     event.currentTarget.parentNode.parentNode.appendChild(element);
     errors[0]=0;
  }
  
  else{
       errors[0]=1;
       const errorstring = event.currentTarget.parentNode.parentNode.querySelector(".errore");
       errorstring.remove();
      
  }
}



function controlloCognome(event){
    if(event.currentTarget.value===""){
       const error="Inserisci il cognome";
       const element=document.createElement("div");
       element.innerText=error;
       element.classList.add("errore");
    if(event.currentTarget.parentNode.parentNode.querySelector(".errore")===null)
       event.currentTarget.parentNode.parentNode.appendChild(element);
       errors[1]=0;
       event.preventDefault();
    }
    
    else{
      const errorstring = event.currentTarget.parentNode.parentNode.querySelector(".errore");
      errorstring.remove();
      errors[1]=1;
     
 }
}

function jsoncontrolloEmail(json) {
console.log(json);
const input=document.querySelector('.email input');
if(json){
   const error="Email gia utilizzata";
   const element=document.createElement("div");
   element.innerText=error;
   element.classList.add("errore"); 
   if(input.parentNode.parentNode.querySelector(".errore")===null)
      input.parentNode.parentNode.appendChild(element);
      errors[5]=0; 
      
}
   else {
      if(input.parentNode.parentNode.querySelector(".errore")!==null){
         const errorstring = input.parentNode.parentNode.querySelector(".errore");
         errorstring.remove();
         errors[5]=1;
   }
}
}

function controlloEmail(event){

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(event.currentTarget.value).toLowerCase())) {
        const error="Email non valida";
        const element=document.createElement("div");
        element.innerText=error;
        element.classList.add("errore");
        if(event.currentTarget.parentNode.parentNode.querySelector(".errore")===null)
        event.currentTarget.parentNode.parentNode.appendChild(element);
        errors[2]=0; 
        
        
      }

      else {
        const errorstring=event.currentTarget.parentNode.parentNode.querySelector(".errore");
        errorstring.remove();
        errors[2]=1;
        fetch("check_email.php?q="+encodeURIComponent(String(event.currentTarget.value).toLowerCase())).then(fetchResponse, onError).then(jsoncontrolloEmail);
      }
}

function onError(error){
   console.log("Error" + error);
}

function controlloPassword(event) {
   if (event.currentTarget.value.length < 8) {
       const error="La password non valida";
       const element=document.createElement("div");
       element.innerText=error;
       element.classList.add("errore");
       if(event.currentTarget.parentNode.parentNode.querySelector(".errore")===null)
       event.currentTarget.parentNode.parentNode.appendChild(element);
       errors[3]=0;
       event.preventDefault();
   }
   else{
      const errorstring=event.currentTarget.parentNode.parentNode.querySelector(".errore");
      errorstring.remove();
      errors[3]=1;
   }

}



function controlloConferma(event){
   if(event.currentTarget.value!==document.querySelector('.password input').value){
      const error="Le password inserite non corrispondono";
      const element=document.createElement("div");
      element.innerText=error;
      element.classList.add("errore");
      if(event.currentTarget.parentNode.parentNode.querySelector(".errore")===null)
      event.currentTarget.parentNode.parentNode.appendChild(element);
      errors[4]=0;
      event.preventDefault();
   }
   else{
      const errorstring=event.currentTarget.parentNode.parentNode.querySelector(".errore");
      errorstring.remove();
      errors[4]=1;
   }
}

function controlloErrore(event){
  if(errors[0]===0 || errors[1]===0 || errors[2]===0 || errors[3]===0 || errors[4]===0 || errors[5]===0){
      const error="Errore nei campi inseriti";
      const element=document.querySelector(".err");
      element.innerText=error;
      element.classList.add("errore");
      event.preventDefault();
   }
   else{
      const errorstring=querySelector(".err");
      errorstring.remove();
   }

}


document.querySelector('.nome input').addEventListener('blur', controlloNome);
document.querySelector('.cognome input').addEventListener('blur', controlloCognome);
document.querySelector('.email input').addEventListener('blur', controlloEmail);
document.querySelector('.password input').addEventListener('blur', controlloPassword);
document.querySelector('.conferma_password input').addEventListener('blur', controlloConferma);
document.querySelector('form').addEventListener('submit', controlloErrore);



