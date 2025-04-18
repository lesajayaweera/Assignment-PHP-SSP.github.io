
window.addEventListener("DOMContentLoaded",function(){
    const calculatorBtn = document.querySelector("#calculator");

    calculatorBtn.addEventListener("click",function(){
        const price = parseFloat(document.querySelector("#price").value);
        const down =parseFloat(document.querySelector("#down").value);
        const interest = parseFloat(document.querySelector("#rate").value); 
        const years = parseFloat(document.querySelector("#term").value);
        


        const months= years *12;

        const loanAmount = price-down;
        const monthlyRate =interest/12/100;

        const monthlyPayment = (loanAmount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -months));
        
        console.log(monthlyPayment);
        document.querySelector("#monthly").innerHTML = `$${monthlyPayment.toFixed(2)}/=`;
        document.querySelector("#result").classList.remove("hidden");

    })

})