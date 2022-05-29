const cuori=document.querySelectorAll(".cuoreV");
for(let cuore of cuori){ //cosi aggiungo a tutti  l'evento del mi piace
    cuore.addEventListener("click",setlike);
}


function onResponse(response) {
    console.log("risposta 1");
    return response.json();
 }

function onJsoncheck_mipiace(json){
    console.log(json);
    if(json){
    const array=[];
    for(let i=0; i<json.length; i++){
    array[json[i].id_social]=json[i].id_social;
    
    }
    console.log(array);
    const cuori=document.querySelectorAll(".cuoreV");
    let j=1;
     for(let cuore of cuori){ //cosi aggiungo a tutti  l'evento del mi piace
        if(array[j]!=undefined){
            cuore.src="images/CuorePieno.png";
        }
        j++;
     }
    }
    

    else{

    }
    
}

const id_user1=document.querySelector("#home");

function setlike(event){
    console.log(event.currentTarget.src);
    if( event.currentTarget.src=="http://localhost/hmw1/images/cuoreVuoto.png"){
        event.currentTarget.src="images/CuorePieno.png";
        const social=event.currentTarget.parentNode; 
        const social_id=social.querySelector(".Logo");
        console.log(id_user1.dataset.id_user);
        fetch("add_like.php?user_id="+encodeURIComponent(id_user1.dataset.id_user)+"&social_id="+encodeURIComponent(social_id.dataset.id));
    }

    else if (event.currentTarget.src=="http://localhost/hmw1/images/CuorePieno.png"){
       event.currentTarget.src="images/cuoreVuoto.png";
       const social=event.currentTarget.parentNode;
       const social_id=social.querySelector(".Logo");
       console.log(id_user1.dataset.id_user);
       fetch("remove_like.php?user_id="+encodeURIComponent(id_user1.dataset.id_user)+"&social_id="+encodeURIComponent(social_id.dataset.id));
    }
}

fetch("verifica_mipiace.php?user_id="+encodeURIComponent(id_user1.dataset.id_user)).then(onResponse).then(onJsoncheck_mipiace);

