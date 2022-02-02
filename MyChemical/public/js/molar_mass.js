

document.querySelectorAll("#kolba").forEach(button => button.addEventListener("click", dodaj_pierwiastek));
document.querySelectorAll(".oblicz").forEach(button => button.addEventListener("click", calculate));
document.querySelectorAll(".clear").forEach(button => button.addEventListener("click", clear));

var molar_mass_tab = [];
var tmp;




function clear(){

    var tab3 = ["pole11", "pole21", "pole31", "pole41", "pole51", "pole12", "pole22", "pole32", "pole42", "pole52"];
    var tab = [];
    for(let i=0; i<tab3.length; i++){
        tab.push(document.getElementsByClassName(tab3[i]).item(0));
    }

    for(let i=0; i<5; i++) {
        tab[i].id = "puste";
        tab[i].innerHTML = `<i class="far fa-question-circle"></i>`;
        tab[i + 5].innerHTML = `<i class="far fa-question-circle"></i>`;
    }


    document.getElementsByClassName("result").item(0).innerHTML = "Result: " +`<i class="far fa-question-circle"></i>` + "g/mol";
    molar_mass_tab = [];
}



function calculate(){

let wynik = Number(0);

var tab3 = ["pole11", "pole21", "pole31", "pole41", "pole51", "pole12", "pole22", "pole32", "pole42", "pole52"];
var tab4 = [];


for(let i=0; i<tab3.length; i++){
    if(i<5) tab4.push(document.getElementsByClassName(tab3[i]).item(0));
    else  tab4.push(document.getElementsByClassName(tab3[i]).item(0).innerHTML);
}


var tab1 = [tab4[0].id, tab4[1].id, tab4[2].id, tab4[3].id, tab4[4].id];
var tab2 = [tab4[5], tab4[6], tab4[7], tab4[8], tab4[9]];


for(let i=0; i<tab1.length; i++){

    if(tab1[i] == "zajete")  wynik = Number(wynik) + (Number(tab2[i]) * Number(molar_mass_tab[i])) ;
    else break; //bo jesli jest puste tzn ze juz zadne nastepne nie moze byc zajete!
}

    document.getElementsByClassName("result").item(0).innerHTML = "Result: " + Number(wynik) + "g/mol";
}




function showOptions(s){
    tmp = s[s.selectedIndex].id;

}







function dodaj_pierwiastek(){

    alert("kolba!");

    const kolba = this;
    const input = kolba.parentElement.firstElementChild.firstElementChild;

    const wartosc_wybrana_przez_user = input.value;
    const wartosc_wybrana_przez_user_molar_mass = tmp;

    var tab3 = ["pole11", "pole21", "pole31", "pole41", "pole51", "pole12", "pole22", "pole32", "pole42", "pole52"];
    var tab = [];
    for(let i=0; i<tab3.length; i++){
        tab.push(document.getElementsByClassName(tab3[i]).item(0));
    }




if(wartosc_wybrana_przez_user=="brak")  alert("Nie wybrano pierwiastka!");

    for(let i=0; i<5; i++){

        if(tab[i].id == "puste"){

            tab[i].id = "zajete";
            tab[i].innerHTML = wartosc_wybrana_przez_user;
            tab[i+5].innerHTML = Number(1);
            molar_mass_tab.push(wartosc_wybrana_przez_user_molar_mass);

            break; //wychodzimy z petli bo pole bylo puste wiec tutaj zostal wpisane!!!
        }

        else{
            if(tab[i].innerHTML==wartosc_wybrana_przez_user){
                tab[i+5].innerHTML = Number(tab[i+5].innerHTML) + Number(1);

                break; //wychodzimy z petli bo tutajwpisujemy wiec juz wpisane!!
            }

            else{
                continue; //tu nie mozna wpisac wiec szukamy dalej....
            }
        }


        //NIE ZNALEZIONO MIEJSCA DO WPISANIA:

        alert("Brak miejsca. Użyj clear lub oblicz.");
    }


}