//najpierw pobieramy wszystkie przyciski, które sa powiązane z serduszkami

//ponieważ chcemy pobrac wszystkie przyciski z całej strony projektów to pobieramy je sobie za pomocą
// querySelectorAll

let like_buttons = [];
let dislike_buttons = [];

akcje();

function akcje(){


    for(let i=0; i<like_buttons.length; i++) {
        like_buttons[i].outerHTML = like_buttons[i].outerHTML;
    }


    for(let i=0; i<dislike_buttons.length; i++) {
        dislike_buttons[i].outerHTML = dislike_buttons[i].outerHTML;
    }


    like_buttons = document.querySelectorAll(".serce_puste");
    dislike_buttons = document.querySelectorAll(".serce_zamalowane");


    like_buttons.forEach(button => button.addEventListener("click", function(){giveLike(this);}));
    dislike_buttons.forEach(button => button.addEventListener("click", function(){giveDislike(this);}));

}



function giveLike(this_button) {

    const likes = this_button;
    const container = likes.parentElement.parentElement;
    const brother_button = likes.nextSibling.nextSibling;
    const id = container.getAttribute("id");

    let tmp_string = "";

    if(brother_button.className === "podpis_tabela") tmp_string = "/likeSelectTable";
    else if(brother_button.className === "podpis_kalkulator") tmp_string = "/likeSelectCalculator";

    fetch(tmp_string+`/${id}`) //wywołujemy endpoint, czyli akcję likeSelectCalculator i przekazujemy argument
        .then(function () {
            likes.innerHTML = `<i class="fas fa-heart fa-lg"></i>`;

            //likes.className="serce_zamalowane";
            likes.setAttribute("class", "serce_zamalowane");

            if(brother_button.className === "podpis_tabela") alert('Tablica została dodana do Twojego Board');
            else if(brother_button.className === "podpis_kalkulator") alert('Kalkulator został dodany do Twojego Board');

            this_button.outerHTML = this_button.outerHTML;

         akcje();


        })
}


function giveDislike(this_button) {

    const dislikes = this_button;
    const container = dislikes.parentElement.parentElement;
    const brother_button = dislikes.nextSibling.nextSibling;
    const id = container.getAttribute("id");


    let tmp_string = "";

    if(brother_button.className === "podpis_tabela") tmp_string = "/dislikeSelectTable";
    else if(brother_button.className === "podpis_kalkulator") tmp_string = "/dislikeSelectCalculator";



    fetch(tmp_string+`/${id}`)
        .then(function () {
            dislikes.innerHTML = `<i class="far fa-heart fa-lg"></i>`;
            dislikes.setAttribute("class", "serce_puste");



            if(brother_button.className === "podpis_tabela") alert('Tablica została usunięta z Twojego Board');
            else if(brother_button.className === "podpis_kalkulator") alert('Kalkulator został usunięty z Twojego Board');

            this_button.outerHTML = this_button.outerHTML;
            akcje();

        })
}


