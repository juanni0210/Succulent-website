console.log("hwllo");
const plantscontainer = document.querySelector(".plantscontainer");
const dropdownbtns = document.querySelectorAll(".dropdown-menu .type");
console.log(dropdownbtns);

function preloader() {
    displayPlants(plantsArr);
};
window.addEventListener("load", preloader);


function displayPlants(data) {
    plantscontainer.innerHTML = "";
    for (let i = 0; i < data.length; i++) {
        let plant = `<div class="col col-12 col-md-6 col-lg-4">
                        <img class="product-box" src = "${data[i]["image"]}" alt = "${data[i]["name"]}">
                        <h5 class="text-centered">${data[i]["name"]}</h5> 
                        <p class="text-centered"' ">${data[i]["price"]}</p> 
                        </div>`;
        plantscontainer.innerHTML += plant;
    }
}

function collectArray(type, data) {
    let collectData = [];
    type = type.toLowerCase();
    for (let i = 0; i < data.length; i++) {
        if (type == data[i]["type"]) {
            collectData.push(data[i]);
        }
    }
    return collectData;

}

function handleSelection(e) {

    let eventTargetObject = e.target;

    let btnLabel = eventTargetObject.textContent;
    let collectPlants = collectArray(btnLabel, plantsArr);
    displayPlants(collectPlants);


}



for (let btn of dropdownbtns) {
    btn.addEventListener("click", handleSelection);
}