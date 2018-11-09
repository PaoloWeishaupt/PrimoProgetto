"use strict";

function deleteData() {
    var inputs = document.querySelectorAll("input"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");

    console.log(inputs);

    inputs.forEach(element => {
        element.value = "";
        element.style.border = "none";
    });
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
}

function validateGender() {
    var gender = document.getElementsByName('gender')[0].checked;
    document.getElementsByName('gender')[0].value =
        (gender === true ?
            "Maschio" :
            document.getElementsByName('gender')[1].value = "Femmina");
    validateDate('date');
}

function validateCharAndSpace(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^[a-zA-Zàáâäãåaccèéìínòóùú ,.'-]+$/;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}

function validateMail(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))+$/;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}


function validateNotReq(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^[a-zA-Zàáâäãåaccèéìínòóùú ,.'-]+$/;
    if ((patt.test(str) === true) || (str === "")) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}

function validateVia(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^[a-zA-Z ]+$/;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}

function validateCivicNumber(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^([0-9]{1,3}[a-zA-Z]{0,1})$/;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}

function calcAge(dateString) {
    var birthday = dateString;
    return ((Date.now() - birthday) / (31557600000));
}

function validateDate(id) {
    var obj = document.getElementById(id);
    var stringa = obj.value;
    var day = stringa.substring(0, 2);
    var month = stringa.substring(3, 5);
    var year = stringa.substring(6, 10);
    var date = new Date(year, (month - 1), day);
    var today = new Date();
    console.log(today);
    if ((calcAge(date) >= 0) && (calcAge(date) < 100)) {
        if (date < today) {
            obj.style.border = "1px solid lime";
            return true;
        } else {
            obj.style.border = "1px solid red";
            return false;
        }
    } else {
        obj.style.border = "1px solid red";
        return false;
    }
}

function validateCAP(id) {
    var obj = document.getElementById(id);
    var cap = obj.value;
    var patt = /^[0-9]{4,5}$/u;
    if (patt.test(cap)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
        return true;
    } else {
        obj.style.border = "1px solid red";
        console.log("numero");
        return false;
    }
}


function validateNumber(valid) {
    var obj = document.getElementById('phone');
    if (valid) {
        obj.style.border = "1px solid lime";
        return true;
    } else {
        obj.style.border = "1px solid red";
        return false;
    }
}

function checkAll() {

    if (validateCharAndSpace('name') &&
        validateCharAndSpace('cognome') &&
        validateDate('date') &&
        validateVia('street') &&
        validateCAP('cap') &&
        validateMail('mail') &&
        validateCivicNumber('civic') &&
        validateCharAndSpace('city') &&
        validateNumber('phone') &&
        validateNotReq('hobby') &&
        validateNotReq('job')) {
        return true;
    } else {
        validateCharAndSpace('name');
        validateCharAndSpace('cognome');
        validateDate('date');
        validateVia('street');
        validateCAP('cap');
        validateMail('mail') &&
            validateCivicNumber('civic');
        validateCharAndSpace('city');
        validateNumber('phone');
        validateNotReq('hobby');
        validateNotReq('job');
        return false;
    }
}
