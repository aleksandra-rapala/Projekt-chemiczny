


document.querySelectorAll("#kosz").forEach(button => button.addEventListener("click", delete_reaction));



function delete_reaction(){

    const kosz = this;
    const reakcja_do_usuniecia = kosz.parentElement.parentElement;
    const id = reakcja_do_usuniecia.getAttribute("id");

    const tmp_string = "/usun_reakcje";


    fetch(tmp_string+`/${id}`) //wywołujemy endpoint, czyli akcję likeSelectCalculator i przekazujemy argument
        .then(function () {
            location.reload();
            alert("Usunięto reakcję z Twojego Board.");

        })

}



