const search_table = document.querySelector('input[placeholder="Search table"]');
const tableContainer = document.querySelector("#tables");

//keyup czyli po wcisnieciu entera -> pobierzemy wartosc przeslanwgo hasla i pobierzemy ja na backend
search_table.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();  //zapobiegamy innym akcjom

        const data = {search: this.value};   //klucz i wartosc z searchbaru czyli to co wpislismy

        fetch("/searchTables", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();

        }).then(function (tables) {      //reactions zostaje przechwycone przez response wczesniejsze
            alert("opo");
            tableContainer.innerHTML = "";   //usuwamy wczesniej wczytane nasze rekacje w my board
            loadTables(tables);

        });
    }
});


function loadTables(tables) {
    alert("Znaleziono" + tables.length + "pozycje.");
    tables.forEach(table => {
        console.log(table);
        createTable(table);   //reakcje wstawiamy do htmla
    });
}

function createTable(table) {

    const template = document.querySelector("#template_table");
    const clone = template.content.cloneNode(true);


//ELEMENETY

    const div1 = clone.querySelector("div");
    div1.id = table.id_table;

    const image1 = clone.querySelector("img");
    image1.src = `/public/img/img_tables/${table.img_table}`;


    const podpis1 = clone.querySelector(".podpis_tabela");
    podpis1.onclick = function() { window.location.href=`seeContentTable/${table.id_table}`; };


    podpis1.innerText = table.name_table;


    const serce1 = clone.querySelector("#serce");
    serce1.onclick = function() { giveDislike(serce1); };

    tableContainer.appendChild(clone);
}
