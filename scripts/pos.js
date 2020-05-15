let btnAdd = document.querySelector("#add");
let btnSubtract = document.querySelector("#subtract");
let qty = document.getElementById("qty");

btnAdd.addEventListener('click', () => {
    qty.value = parseInt(qty.value) + 1;
});

btnSubtract.addEventListener('click', () =>{
    qty.value = parseInt(qty.value) - 1;
});

let btnQty = document.querySelector("#qty_btn");
btnQty.addEventListener('click', () => {
    event.preventDefault();
});

let btnAdd1 = document.querySelector("#add1");
let btnSubtract1 = document.querySelector("#subtract1");
let qty1 = document.getElementById("variant_option_qty");

btnAdd1.addEventListener('click', () => {
    qty1.value = parseInt(qty1.value) + 1;
});

btnSubtract1.addEventListener('click', () =>{
    qty1.value = parseInt(qty1.value) - 1;
});




// for right sidebar
var menuCategories = document.querySelector("#menu-category-btns");
function gone() {
menuCategories.style.display = "none";
}

/*
function appear() {
    menuCategories.style.display ="block";
    fooddivs.classList.remove("active");
}*/