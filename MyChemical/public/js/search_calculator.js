const search_calc = document.querySelector('input[placeholder="Search calculator"]');
const calculatorContainer = document.querySelector("#calculators");

//keyup czyli po wcisnieciu entera -> pobierzemy wartosc przeslanwgo hasla i pobierzemy ja na backend
search_calc.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {

        event.preventDefault();  //zapobiegamy innym akcjom

        const data = {search: this.value};   //klucz i wartosc z searchbaru czyli to co wpislismy

        fetch("/searchCalculators", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (calculators) {      //reactions zostaje przechwycone przez response wczesniejsze
            calculatorContainer.innerHTML = "";   //usuwamy wczesniej wczytane nasze rekacje w my board
            loadCalculators(calculators);
        });
    }
});


function loadCalculators(calculators) {
    alert("Znaleziono" + calculators.length + "pozycje.");
    calculators.forEach(calculator => {
        console.log(calculator);
        createCalculator(calculator);   //reakcje wstawiamy do htmla
    });
}

function createCalculator(calculator) {

    const template = document.querySelector("#template_calculator");
    const clone = template.content.cloneNode(true);


//ELEMENETY

    const div2 = clone.querySelector("div");
    div2.id = calculator.id_calculator;

    const image2 = clone.querySelector("img");
    image2.src = `/public/img/img_calculators/${calculator.img_calculator}`;


    const podpis2 = clone.querySelector(".podpis_kalkulator");
    podpis2.onclick = function() { window.location.href=`${calculator.endpoint_calculator}/${calculator.id_calculator}`; };

    podpis2.innerText = calculator.name_calculator;

    const serce2 = clone.querySelector("#serce");
    serce2.onclick = function() { giveDislike(serce2); };

   calculatorContainer.appendChild(clone);
}
