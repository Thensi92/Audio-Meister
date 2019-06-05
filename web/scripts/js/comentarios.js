let botonComentar = document.getElementById("botonComentar");
let botonVerComentarios = document.getElementById("botonVerComentarios");

let divComentar = document.getElementById("subida-comentarios");
let divComentarios = document.getElementById("caja-comentarios");

divComentar.style.display = "none"
divComentarios.style.display = "none"

botonComentar.addEventListener("click", function(){

    let status = divComentar.style.display;
    if(status != "none"){
        status = "none";
    }else{
        status = "block";
    }

    divComentar.style.display = status;
});

botonVerComentarios.addEventListener("click", function(){
    let status = divComentarios.style.display;
    if(status != "none"){
        status = "none";
    }else{
        status = "block";
    }
});