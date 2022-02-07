
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

    like_buttons.forEach(button => button.addEventListener("click", function(){set_heart(this, "like");}));
    dislike_buttons.forEach(button => button.addEventListener("click", function(){set_heart(this, "dislike");}));
}


//give like lub dislike w zależności od parametru method
function set_heart(this_button, method){

    const container = this_button.parentElement.parentElement;
    const brother_button = this_button.nextSibling.nextSibling;
    const id = container.getAttribute("id");

    fetch(makeUrlLine(brother_button, method)+`/${id}`) //wywołujemy endpoint, czyli akcję likeSelectCalculator i przekazujemy argument
        .then(function () {
            aktualizuj_button(this_button, method);
            makeAlert(brother_button, method);
        })
}







//pomocnicze

function makeUrlLine(brother_button, method){
    let tmp_string = "";
    if(brother_button.className === "podpis_tabela") tmp_string = "/"+method+"SelectTable";
    else if(brother_button.className === "podpis_kalkulator") tmp_string = "/"+method+"SelectCalculator";
    return tmp_string;
}



function makeAlert(brother_button, method){

    let word ="";

    if(brother_button.className === "podpis_tabela") {

        if (method == "dislike") word = "usunięta";
        else if (method == "like") word = "dodana";
        alert('Tablica została ' + word + ' z Twojego Board');
    }


    else if(brother_button.className === "podpis_kalkulator") {
        if (method == "dislike") word = "usunięty";
        else if (method == "like") word = "dodany";
        alert('Kalkulator został ' + word + ' z Twojego Board');
    }

}

function aktualizuj_button(this_button, method){

    if(method == "dislike"){
        this_button.innerHTML = `<i class="far fa-heart fa-lg"></i>`;
        this_button.setAttribute("class", "serce_puste");
    }

    else if(method == "like"){
        this_button.innerHTML = `<i class="fas fa-heart fa-lg"></i>`;
        this_button.setAttribute("class", "serce_zamalowane");
    }

    this_button.outerHTML = this_button.outerHTML;
    akcje();
}