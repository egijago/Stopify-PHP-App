document.addEventListener('DOMContentLoaded', async function () {
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;
        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");
        console.log('awalll',idValue);
        xhr.open('GET', '/element/music/'+idValue, true);

    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    const data =xhr.responseText;
                    document.getElementById("page-wrapper").innerHTML = data
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };
    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }

});

function handleLoveButtonClick() {
    try {
        const xhr = new XMLHttpRequest();
        var currentUrl = window.location.href;

        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");

        var idUser=document.getElementById("id_user").value;

        console.log(document.getElementById('likeButton').innerHTML)

        likeStatus=document.getElementById('likeButton').innerHTML == "Like ❤️"

        xhr.open(likeStatus ? 'POST' : 'DELETE', '/api/users/'+idUser+'/likes/'+idValue, true);
        console.log('/api/users/'+idUser+'/likes/'+idValue)
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementById('likeButton').innerHTML = likeStatus ? "Unlike ❤️" : "Like ❤️";
                } else {
                    console.error('HTTP error! Status: ', xhr.status);
                }
            }
        };

    
        xhr.send();
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
}

function handleSubscribe(){
    var currentUrl = window.location.href;

        var url = new URL(currentUrl);
        var idValue = url.searchParams.get("id");

        var idUser=document.getElementById("id_user").value;

        var infoPayment = new XMLHttpRequest();

        infoPayment.open("GET", "/api/payment/" + idUser, true);

        infoPayment.onreadystatechange = function () {

            if (infoPayment.readyState === XMLHttpRequest.DONE) {

                if (infoPayment.status === 200) {

                    const response = JSON.parse(infoPayment.responseText);
                    console.log(response)
                    if(!response.data){
                        subscribe = new XMLHttpRequest();
                        subscribe.open("POST", "/api/payment", true);
                        subscribe.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                        subscribe.onreadystatechange = function () {

                            if (subscribe.readyState === XMLHttpRequest.DONE) {
                                    
                                    if (subscribe.status === 200) {
                                        alert("Subscribe success!")
                                    } else {
                                        console.error("Request failed with response:", subscribe.responseText);
                                    }
                                }
                            }
                        var data = `id_user=${encodeURIComponent(idUser)}&id_music=${encodeURIComponent(idValue)}`;
                        subscribe.send(data);
                        alert("Please fill your payment information first!")
                        window.location.href = "/profil";
                    }
                    else{
                        alert("Subscribe success!")
                    }
                } else {
                    console.error("Request failed with response:", infoUser.responseText);
                }
            }
        }

    
        infoPayment.send();
}