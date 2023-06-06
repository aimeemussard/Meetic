window.onload = function years() {
    const yearSelect = document.getElementById('year');
    const date = new Date();
    const year = date.getFullYear();

    for (let i = 0; i <= 82; i++) {
        const option = document.createElement('option');
        option.setAttribute("value", ((year - 18) - i))
        option.textContent = ((year - 18) - i);
        yearSelect.appendChild(option);
    }
}

function validateSignUp() {

    var gender;
    
    var lastname;
    var firstname;
    var namecheck = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    
    var email;
    var mailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    var password;
    var passcheck = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,30}$/;
    
    var day;
    var month;
    var year;

    var city;
    var citycheck = /^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$/;


    var selectDay = document.getElementById("day");
    var selectMonth = document.getElementById("month");
    var selectYear = document.getElementById("year");
    var selectedValueDay = selectDay.options[selectDay.selectedIndex].value;
    var selectedValueMonth = selectMonth.options[selectMonth.selectedIndex].value;
    var selectedValueYear = selectYear.options[selectYear.selectedIndex].value;


    gender = false;
    if (document.getElementById("homme").checked || document.getElementById("femme").checked || document.getElementById("autre").checked) {
        gender = true;
    }
    if (gender === false) {
        alert("Veuillez renseigner votre genre.");
    }

    firstname = true;
        if (document.getElementById("firstname").value.length == 0) {
            firstname = false;
        } else if (document.getElementById("firstname").value.match(namecheck) && document.getElementById("firstname").value.length >= 2) {
            firstname = true;
        } else {
            firstname = false;
        }
        if (firstname === false) {
            alert("Veuillez renseigner votre prénom.");
            //document.getElementById("nom").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
        }

    lastname = true;
    if (document.getElementById("lastname").value.length == 0) {
        lastname = false;
    } else if (document.getElementById("lastname").value.match(namecheck) && document.getElementById("lastname").value.length >= 2) {
        lastname = true;
    } else {
        lastname = false;
    }
    if (lastname === false) {
        alert("Veuillez renseigner votre nom.");
        //document.getElementById("lastname").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }

    const date = new Date();
    const actualYear = date.getFullYear();
    const actualMonth = (date.getMonth())+1;
    const actualDay = date.getDate();

    day = false;
    month = false;
    year = false;

    if (selectedValueDay === "0" && selectedValueMonth === "0" && selectedValueYear === "0" ) {
        alert("Veuillez renseigner votre date de naissance.");
    } else{
        if(parseInt(selectedValueYear) == (actualYear - 18) && parseInt(selectedValueMonth) == actualMonth && parseInt(selectedValueDay) < actualDay && selectedValueDay != "0" && selectedValueMonth != "0" && selectedValueYear != "0"){
            year = true;
            month = true;
            day = true;
        }
        if(parseInt(selectedValueYear) == (actualYear - 18) && parseInt(selectedValueMonth) == actualMonth && parseInt(selectedValueDay) >= actualDay && selectedValueDay != "0" && selectedValueMonth != "0" && selectedValueYear != "0"){
            alert("Vous n'avez pas 18 ans!");
        }
        if(parseInt(selectedValueYear) == (actualYear - 18) && parseInt(selectedValueMonth) < actualMonth && selectedValueDay != "0" && selectedValueMonth != "0" && selectedValueYear != "0"){
            year = true;
            month = true;
            day = true;
        }
        if(parseInt(selectedValueYear) == (actualYear - 18) && parseInt(selectedValueMonth) > actualMonth && selectedValueDay != "0" && selectedValueMonth != "0" && selectedValueYear != "0"){
            alert("Vous n'avez pas 18 ans!");
        }
        if(parseInt(selectedValueYear) < (actualYear - 18) && selectedValueDay != "0" && selectedValueMonth != "0" && selectedValueYear != "0"){
            year = true;
            month = true;
            day = true;
        }
        if(selectedValueDay === "0"){
            alert("Veuillez renseigner votre jour de naissance.");
        }
        if (selectedValueMonth === "0"){
            alert("Veuillez renseigner votre mois de naissance.");
        }
        if (selectedValueYear === "0"){
            alert("Veuillez renseigner votre année de naissance.");
        }
    }

    city = true;
    if (document.getElementById("city").value.length == 0) {
        city = false;
        alert("Veuillez renseigner une ville valide.");
    } else if (document.getElementById("city").value.match(citycheck)) {
        city = true;
    } else {
        city = false;
        alert("Veuillez renseigner une ville valide.");
        //document.getElementById("lastname").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }

    email = true;
    if (document.getElementById("email").value.length == 0) {
        email = false;
        alert("Veuillez renseigner une adresse e-mail");
    } else if (document.getElementById("email").value.match(mailcheck)) {
        email = true;
    } else {
        email = false;
        alert("Veuillez renseigner une adresse e-mail valide");
        //document.getElementById("email").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }

    password = true;
    if (document.getElementById("password").value.length == 0) {
        password = false;
        alert("Veuillez renseigner un mot de passe valide.");
    } else if (document.getElementById("password").value.match(passcheck)) {
        password = true;
    } else {
        password = false;
        alert("Votre mot de passe doit comporter entre 8 et 30 caractères et contenir une majuscule, un symbole et un chiffre.");
        //document.getElementById("email").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }

    if (gender === true && firstname === true && lastname === true && day === true && month === true && year === true && email === true && password === true) {
        alert("Vous avez bien envoyé votre formulaire.");
        return true;
    } else {
        return false;
    }
}

function validateSignIn() {
    var email;
    var mailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    var password;
    var passcheck = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;

    email = true;
    if (document.getElementById("email").value.length == 0) {
        email = false;
        alert("Veuillez entrer une adresse e-mail");
    } else if (document.getElementById("email").value.match(mailcheck)) {
        email = true;
    } else {
        email = false;
        alert("Veuillez entrer une adresse e-mail valide");
        //document.getElementById("email").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }

    password = true;
    if (document.getElementById("password").value.length == 0) {
        password = false;
        alert("Veuillez entrer un mot de passe valide");
    } else if (document.getElementById("password").value.match(passcheck)) {
        password = true;
    } else {
        password = false;
        alert("Votre mot de passe doit comporter entre 8 et 30 caractères et contenir une majuscule, un symbole et un chiffre");
        //document.getElementById("email").style.backgroundColor = 'rgb(' + 255 + ',' + 75 + ',' + 113 + ')';
    }
        
    if (email === true && password === true) {
        alert("Bienvenue");
        return true;
    } else {
        return false;
    }

}