document.addEventListener('DOMContentLoaded', function () {
    const cardNumberInput = document.getElementById('cardnumber');
    const cardMonthInput = document.getElementById('cardmonth');
    const cardYearInput = document.getElementById('cardyear');
    const cardOwnerInput = document.getElementById('cardowner');

    const cardNumberError = document.getElementById('cardNumberError');
    const cardMonthError = document.getElementById('cardMonthError');
    const cardYearError = document.getElementById('cardYearError');

    const submitButton = document.getElementById('submitButton');
    
    function validateCardNumber() {
        const isValid = /^\d{16}$/.test(cardNumberInput.value);
        cardNumberError.textContent = isValid ? '' : 'Invalid card number';
        return isValid;
    }

    function validateCardMonth() {
        const isValid = /^\d{2}$/.test(cardMonthInput.value);
        cardMonthError.textContent = isValid ? '' : 'Invalid month';
        return isValid;
    }

    function validateCardYear() {

        const isValid = /^\d{4}$/.test(cardYearInput.value);
        cardYearError.textContent = isValid ? '' : 'Invalid year';
        return isValid;
    }

    function validateCardOwner(){
        return cardOwnerInput != null
    }

    function validateForm() {
        const isCardNumberValid = validateCardNumber();
        const isCardMonthValid = validateCardMonth();
        const isCardYearValid = validateCardYear();
        const isCardOwnerValid = validateCardOwner();
        submitButton.disabled = !(isCardNumberValid && isCardMonthValid && isCardYearValid && isCardOwnerValid);
    }

    cardNumberInput.addEventListener('input', validateForm);
    cardMonthInput.addEventListener('input', validateForm);
    cardYearInput.addEventListener('input', validateForm);
});

document.addEventListener('DOMContentLoaded', initialUser);
document.addEventListener('DOMContentLoaded', initialPayment);

function initialUser(){
    const xhr = new XMLHttpRequest();
    const idUser = document.getElementById('custId').value;
    xhr.open("GET", "/api/users/" + idUser, true);
    data=null
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
            const response = xhr.responseText;
            data=JSON.parse(response).data
            document.getElementById('name').placeholder=data.username
            } else {
            console.error("Request failed with response:", xhr.responseText);
            }
        }
    };
    xhr.send();

}

function initialPayment(){
    const xhr = new XMLHttpRequest();
    const idUser = document.getElementById('custId').value;
    xhr.open("GET", "/api/payment/" + idUser, true);
    data=null
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
            const response = xhr.responseText;
            data=JSON.parse(response).data
            document.getElementById('cardnumber').placeholder=data.card_number?data.card_number:"Enter you card number"
            document.getElementById('cardowner').placeholder=data.card_owner?data.card_owner:"Enter you card owner"
            document.getElementById('cardmonth').placeholder=data.card_exp_month?data.card_exp_month:"Enter you card month"
            document.getElementById('cardyear').placeholder=data.card_exp_year?data.card_exp_year:"Enter you card year"
            } else {
            console.error("Request failed with response:", xhr.responseText);
            }
        }
    };
    xhr.send();

}

async function sendForm(){
    var idUser = document.getElementById('custId').value;
    var cardnumber = document.getElementById('cardnumber').value;
    var cardowner = document.getElementById('cardowner').value;
    var cardmonth = document.getElementById('cardmonth').value;
    var cardyear = document.getElementById('cardyear').value;
    console.log("check")
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/api/payment", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    const responseData = JSON.parse(xhr.responseText);
                    console.log(responseData);
                    if (responseData.message == "gagal") {
                        window.location.href = "profil";
                        alert("update failed!");
                    } else {
                        window.location.href = "home";
                        alert("success");
                    }
                } catch (error) {
                    console.error("Error parsing JSON response:", error);
                    alert("An error occurred while processing the login.");
                }
            } else {
                console.error("Request failed with response:", xhr.responseText);
            }
        }
    };
    var data = `id_user=${encodeURIComponent(idUser)}&card_number=${encodeURIComponent(cardnumber)}&card_owner=${encodeURIComponent(cardowner)}&card_exp_month=${encodeURIComponent(cardmonth)}&card_exp_year=${encodeURIComponent(cardyear)}`;
    xhr.send(data);
}