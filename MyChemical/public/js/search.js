
const search_calc = document.querySelector('input[placeholder="Search calculator"]');
const calculatorContainer = document.querySelector("#calculators");

const search_react = document.querySelector('input[placeholder="Search reaction"]');
const reactionContainer = document.querySelector("#reactions");

const search_table = document.querySelector('input[placeholder="Search table"]');
const tableContainer = document.querySelector("#tables");

let tab1 = [search_calc, search_table, search_react];
let tab2 = [calculatorContainer,tableContainer, reactionContainer];
let tab3 = ["/searchCalculators", "/searchTables", "/searchReactions"];
let tab4 = ["kalkulator", "tabela", "reakcja"];


for(let i=0; i<3; i++){

//keyup czyli po wcisnieciu entera -> pobierzemy wartosc przeslanwgo hasla i pobierzemy ja na backend
    tab1[i].addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();  //zapobiegamy innym akcjom

            const data = {search: this.value};   //klucz i wartosc z searchbaru czyli to co wpislismy

            fetch(tab3[i], {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (content) {      //reactions zostaje przechwycone przez response wczesniejsze
                tab2[i].innerHTML = "";   //usuwamy wczesniej wczytane nasze rekacje w my board
                load(content, tab4[i]);
            });
        }
    });

}


//load calculators, reactions, tables
function load(content, what_load){
    alert("Znaleziono " + content.length + " pozycje.");
    content.forEach(content => {
        console.log(content);

        if(what_load == "kalkulator") createCalculator(content);   //elementy wstawiamy do htmla
        else if(what_load == "tabela") createTable(content);
        else if (what_load == "reakcja") createReaction(content);
    });
}



function createCalculator(calculator) {
    const template = document.querySelector("#template_calculator");
    const clone = template.content.cloneNode(true);

//ELEMENETY

    const div = clone.querySelector("div");
    div.id = calculator.id_calculator;

    const image = clone.querySelector("img");
    image.src = `/public/img/img_calculators/${calculator.img_calculator}`;

    const podpis = clone.querySelector(".podpis_kalkulator");
    podpis.onclick = function() { window.location.href=`${calculator.endpoint_calculator}/${calculator.id_calculator}`; };

    podpis.innerText = calculator.name_calculator;

    const serce = clone.querySelector("#serce");
    serce.onclick = function() { set_heart(serce, "dislike"); };

   calculatorContainer.appendChild(clone);
}




function createTable(table) {
    const template = document.querySelector("#template_table");
    const clone = template.content.cloneNode(true);

//ELEMENETY

    const div = clone.querySelector("div");
    div.id = table.id_table;

    const image = clone.querySelector("img");
    image.src = `/public/img/img_tables/${table.img_table}`;

    const podpis = clone.querySelector(".podpis_tabela");
    podpis.onclick = function() { window.location.href=`seeContentTable/${table.id_table}`; };

    podpis.innerText = table.name_table;

    const serce = clone.querySelector("#serce");
    serce.onclick = function() { set_heart(serce, "dislike"); };

    tableContainer.appendChild(clone);
}


function createReaction(reaction) {

    const template = document.querySelector("#template_reaction");
    const clone = template.content.cloneNode(true);


//ELEMENETY

    const div = clone.querySelector("div");
    div.id = reaction.id_reaction;

    const image = clone.querySelector("img");
    image.src = `/public/img/img_reaction/${reaction.img_reaction}`;

    const chemical_formula = clone.querySelector("h2");
    chemical_formula.innerHTML = "Chemical formula: " + reaction.chemical_formula;

    const description = clone.querySelector("p");
    description.innerHTML = "Description: " + reaction.description;

    const podpis = clone.querySelector(".podpis");
    podpis.innerText = reaction.name_reaction;

    const kosz = clone.querySelector("#kosz");
    kosz.onclick = delete_reaction;

    reactionContainer.appendChild(clone);
}












