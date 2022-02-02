const search = document.querySelector('input[placeholder="Search reaction"]');
const reactionContainer = document.querySelector("#reactions");

//keyup czyli po wcisnieciu entera -> pobierzemy wartosc przeslanwgo hasla i pobierzemy ja na backend
search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {

        event.preventDefault();  //zapobiegamy innym akcjom

        const data = {search: this.value};   //klucz i wartosc z searchbaru czyli to co wpislismy

        fetch("/searchReactions", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (reactions) {      //reactions zostaje przechwycone przez response wczesniejsze
            reactionContainer.innerHTML = "";   //usuwamy wczesniej wczytane nasze rekacje w my board
            loadReactions(reactions);
        });
    }
});


function loadReactions(reactions) {
    alert("Znaleziono" + reactions.length + "pozycje.");
    reactions.forEach(reaction => {
        console.log(reaction);
        createReaction(reaction);   //reakcje wstawiamy do htmla
    });
}

function createReaction(reaction) {

    const template = document.querySelector("#template_reaction");
    const clone = template.content.cloneNode(true);


//ELEMENETY

    const div3 = clone.querySelector("div");
    div3.id = reaction.id_reaction;

    const image3 = clone.querySelector("img");
    image3.src = `/public/img/img_reaction/${reaction.img_reaction}`;

    const chemical_formula3 = clone.querySelector("h2");
    chemical_formula3.innerHTML = "Chemical formula: " + reaction.chemical_formula;

    const description3 = clone.querySelector("p");
    description3.innerHTML = "Description: " + reaction.description;


    const podpis3 = clone.querySelector(".podpis");
    podpis3.innerText = reaction.name_reaction;

   const kosz3 = clone.querySelector("#kosz");
   kosz3.onclick = delete_reaction;

    reactionContainer.appendChild(clone);
}
