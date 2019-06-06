let botonComentar = document.getElementById("botonComentar");
let botonVerComentarios = document.getElementById("botonVerComentarios");

let divComentar = document.getElementById("subida-comentarios");
let divComentarios = document.getElementsByClassName("caja-comentarios");

divComentar.style.display = "none";

if(divComentarios != undefined){
    for(let comentario of divComentarios){
        comentario.style.display = "none";
    }
}

botonComentar.addEventListener("click", function(){

    let status = divComentar.style.display;
    if(status != "none"){
        status = "none";
        botonComentar.textContent = "Comentar";
    }else{
        status = "flex";
        botonComentar.textContent = "Ocultar";
    }

    divComentar.style.display = status;
});

botonVerComentarios.addEventListener("click", function(){
    if(divComentarios != undefined){
        for(let comentario of divComentarios){
            let status = comentario.style.display;

            if(status != "none"){
                status = "none";
                botonVerComentarios.textContent = "Ver comentarios";
            }else{
                status = "flex";
                botonVerComentarios.textContent = "Ocultar comentarios";
            }
            
            console.log(botonVerComentarios.textContent);
            comentario.style.display = status;
        }
    }
});