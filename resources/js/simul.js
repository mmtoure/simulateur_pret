const sliders = document.querySelectorAll("input[type='range']");
console.log(sliders);


const billInput = document.getElementById("bill");
billInput.addEventListener("change", calculateTip);

function calculateTip(){
    let bill = billInput.value;
    let tipPercent = document.getElementById("tip").value;
    let noOfPeople = document.getElementById("no-of-people").value;
    

    let totalTip = bill * (tipPercent/100);
    let total = (bill + totalTip);

    document.getElementById("tip-amount").textContent = `$\ ${totalTip}`;
    document.getElementById("total-amount").textContent = `$\ ${total}`;
    document.getElementById("tip-percent").textContent = `${tipPercent}`;
    document.getElementById("split-num").textContent = `${noOfPeople}`;

    document.getElementById("tip-per-person").textContent = `${tipPercent}`;
    document.getElementById("total-per-person").textContent = `${noOfPeople}`;
    

}


calculateTip();