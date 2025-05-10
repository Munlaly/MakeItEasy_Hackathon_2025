const shoppingCart = document.getElementById("shoppingCart");
const popUp = document.getElementById("popUp");
const order = document.getElementById("order");
const closeBtn = document.getElementById("minimize");
const imgContainers = document.querySelectorAll('.img-container');
const orderList = document.getElementById("orderList");

shoppingCart.addEventListener('click', ()=>{

    popUp.style.display = "block";
    popUp.style.pointerEvents = "all";
}
);

closeBtn.addEventListener('click', () =>{
    popUp.style.display = "none";
    popUp.style.pointerEvents = "none";
});

imgContainers.forEach(container => {
    container.addEventListener('click', () => {
        
        const productText = container.querySelector('.text-overlay-small').textContent.trim();
        
        const listItem = document.createElement("li");
        listItem.textContent = `${productText}`;
        orderList.appendChild(listItem);
    });
});