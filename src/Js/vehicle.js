
window.addEventListener("DOMContentLoaded",function(){

    // to calculate the intrest
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

    // to the negotiate button
    const nbtn = this.document.getElementById('negotiate');
    const cancelBtn = this.document.getElementById('cancelBtn');
    const cartBtn = this.document.getElementById('cartBtn');
    const buyBtn = this.document.getElementById('buyBtn');
    const wishBtn = this.document.getElementById('wishBtn');
    const hiddenContainer = this.document.getElementById('hiddenContainer');
    
    hiddenContainer.classList.add('hidden')
    nbtn.addEventListener("click",function(){
        hiddenContainer.classList.remove('hidden');
        nbtn.classList.add('hidden');
        cartBtn.classList.add('hidden');
        buyBtn.classList.add('hidden');
        wishBtn.classList.add('hidden');
    })
    cancelBtn.addEventListener("click",function(){
        hiddenContainer.classList.add('hidden');
        nbtn.classList.remove('hidden');
        cartBtn.classList.remove('hidden');
        buyBtn.classList.remove('hidden');
        wishBtn.classList.remove('hidden');
    })
    




})