let totalPrice = 0;
let packsArr = [];
let pursheList = [{
        "id": "card1",
        "type": "6",
        "price": 2.5,
        "amount": 0,
        "title": "6 Bottles pack"
    },
    {
        "id": "card2",
        "type": "12",
        "price": 4.6,
        "amount": 0,
        "title": "12 Bottles pack"
    },
    {
        "id": "card3",
        "type": "24",
        "price": 9,
        "amount": 0,
        "title": "24 Bottles pack"
    }

];

let modal = document.getElementById('myModal');
let cardsEvents=document.querySelectorAll('.btl_card button');
cardsEvents.forEach(item => {
    item.addEventListener('click', event => {
        let elem = event.target; //clicked btn
        let addProduct=elem.getAttribute("type-action");
        let inputElem = elem.parentElement.getElementsByTagName('input')[0]; //input elem
        let typeProduct = parseInt(elem.getAttribute("product-type")); // 6 ,12 ,24 bottels
        let quantetyNode = document.createElement("input");
        let product = pursheList.find(product => product.type == typeProduct);
        if (addProduct == 'add') {
            totalPrice += parseFloat(elem.getAttribute('price'))
            currentQuantety = parseInt(inputElem.getAttribute('quantety'));
            newQuantety = currentQuantety + 1;
            inputElem.setAttribute("quantety", newQuantety);
            inputElem.value = newQuantety;
            if (product.amount == 0) {
                //add to product if not in the cart
                let node = document.createElement("P");
                node.setAttribute("product-type", typeProduct);
                let textnode = document.createTextNode(elem.getAttribute('title'));
                node.append(textnode);
                document.getElementById("biling_cart").append(node);
                let packPnode = document.createElement("P");
                packPnode.setAttribute("product-type", typeProduct);
                packTextNode = document.createTextNode('Packs Quantity :');
                packPnode.append(packTextNode);
                document.getElementById("billPackText").append(packPnode);
                // let quantetyNode = document.createElement("input");
                quantetyNode.setAttribute("product-type", typeProduct);
                quantetyNode.setAttribute("class", "inputBill");
                quantetyNode.setAttribute("readonly", "");
                document.getElementById("packsQuantenty").append(quantetyNode);
            }
            product.amount = newQuantety;
            document.querySelector(`input[product-type='${typeProduct}']`).value = newQuantety;

        } else if (addProduct == 'decrease' && inputElem.value > 0) {
            currentQuantety = parseInt(inputElem.getAttribute('quantety'));
            newQuantety = currentQuantety - 1;
            inputElem.setAttribute("quantety", newQuantety);
            totalPrice -= parseFloat(elem.getAttribute('price_d'))
            inputElem.value = newQuantety;
            product.amount = newQuantety;
            quantetyNode.value = product.amount;
            document.querySelector(`input[product-type='${typeProduct}']`).value = newQuantety;
            //remove element from list if quantety is 0 of product
            if (product.amount == 0) {
                //remove from  product list
               removeFromList(typeProduct);
            }

        }
        quantetyNode.value = newQuantety;
        totalPrice = Number(totalPrice.toFixed(2));
        document.getElementById("total").innerHTML = totalPrice;
        //clear total price
        if (totalPrice == "0") {
            document.getElementById("total").innerHTML = '';
        }
    })
})

function addProduct(){

}

function removeProduct(){
    
}

function removeFromList(typeProduct){
    let removeNodeName = document.querySelector(`P[product-type='${typeProduct}']`);
    removeNodeName.parentNode.removeChild(removeNodeName);
    let removeNodeText = document.querySelector(`P[product-type='${typeProduct}']`);
    removeNodeText.parentNode.removeChild(removeNodeText);
    let removeNodeInput = document.querySelector(`input[product-type='${typeProduct}']`);
    removeNodeInput.parentNode.removeChild(removeNodeInput);
}

//validation and open modal
document.getElementById("checkout").addEventListener('click', function (event) {
    event.preventDefault();
    let firstName = document.getElementById("fname").value;
    let lastName = document.getElementById("lname").value;
    let email = document.getElementById("email").value;
    let emailRegex = "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$";
    let lettersRegex = "^[a-zA-Z0-9._-]{2,70}$";
    let errorMsg = '';
    if (firstName.match(lettersRegex)) {
        if (lastName.match(lettersRegex)) {
            if (email.length != 0) {
                if (email.match(emailRegex)) {
                    let node = document.createElement("P");
                    node.setAttribute("class", "nameMsg");
                    let textnode = document.createTextNode(`${firstName}  ${lastName} , you ordered`);
                    node.append(textnode);
                    document.getElementById("modal-content").append(node);
                    pursheList.forEach(item => {
                        if (item.amount > 0) {
                            let str = `${item.amount} packs of ${item.title}`
                            node = document.createElement("P");
                            node.setAttribute("class", 'productMsg');
                            textnode = document.createTextNode(`${str}`);
                            node.append(textnode);
                            document.getElementById("modal-content").append(node);
                        }
                    })
                    node = document.createElement("P");
                    node.setAttribute("class", 'bottom_msg');
                    textnode = document.createTextNode('Thank You!');
                    node.append(textnode);
                    document.getElementById("modal-content").append(node);
                    // Get the button that opens the modal
                    modal.style.display = 'block';
                    //close button in modal

                } else {
                    errorMsg = 'required correct form of email';
                }
            } else {
                errorMsg = 'required  email';
            }
        } else {
            errorMsg = 'last name should contain 2-70 letters';
        }
    } else {
        errorMsg = 'first name should contain 2-70 letters';
    }
    document.getElementById("errorMsg").innerHTML = errorMsg
});

// modal close

let closeBtn = document.getElementsByClassName("close")[0].addEventListener('click', function () {
    modal.style.display = "none";
    location.reload()
});
