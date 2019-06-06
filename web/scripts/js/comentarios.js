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
        //changue value for display;
        status = "none";
        //Changue text
        botonComentar.textContent = "Comentar";
        //changue class
        botonComentar.classList.remove("btn-danger");
        botonComentar.classList.add("btn-warning");
    }else{
        //changue value for display;
        status = "flex";
        //Changue text
        botonComentar.textContent = "Ocultar";
        //changue class
        botonComentar.classList.remove("btn-warning");
        botonComentar.classList.add("btn-danger");
    }

    divComentar.style.display = status;
});

botonVerComentarios.addEventListener("click", function(){
    if(divComentarios != undefined){
        for(let comentario of divComentarios){
            let status = comentario.style.display;

            if(status != "none"){
                //changue value for display;
                status = "none";
                //Changue text
                botonVerComentarios.textContent = "Ver comentarios";
                //changue class
                botonVerComentarios.classList.remove("btn-danger");
                botonVerComentarios.classList.add("btn-info");
            }else{
                //changue value for display;
                status = "flex";
                //Changue text
                botonVerComentarios.textContent = "Ocultar comentarios";
                //changue class
                botonVerComentarios.classList.remove("btn-info");
                botonVerComentarios.classList.add("btn-danger");
            }
            
            comentario.style.display = status;
        }
    }
});