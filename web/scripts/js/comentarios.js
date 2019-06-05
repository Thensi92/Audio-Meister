let botonComentar = document.getElementById("botonComentar");
let botonVerComentarios = document.getElementById("botonVerComentarios");

let divComentar = document.getElementById("subida-comentarios");
let divComentarios = document.getElementsByClassName("caja-comentarios");

divComentar.style.display = "none"

if(divComentarios != undefined){
    for(let comentario of divComentarios){
        comentario.style.display = "none";
    }
}


botonComentar.addEventListener("click", function(){

    let status = divComentar.style.display;
    if(status != "none"){
        status = "none";
    }else{
        status = "flex";
    }

    divComentar.style.display = status;
});

botonVerComentarios.addEventListener("click", function(){
    if(divComentarios != undefined){
        for(let comentario of divComentarios){
            let status = comentario.style.display;
            if(status != "none"){
                status = "none";
            }else{
                status = "flex";
            }
    
            comentario.style.display = status;
        }
    }
});