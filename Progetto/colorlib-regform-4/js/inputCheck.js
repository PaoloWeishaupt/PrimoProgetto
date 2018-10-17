"use strict";

function validateCharAndSpace(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^[a-zA-Zàáâäãåaccèéìínòóùú ,.'-]+$/u;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
    } else {
        obj.style.borderColor = "red";
        console.log("numero");
    }
}

function validateCivicNumber(id) {
    var obj = document.getElementById(id);
    var str = obj.value;
    var patt = /^\d{1,3}[a-zA-Z]{0,1}$/;
    if (patt.test(str)) {
        obj.style.border = "1px solid lime";
        console.log("carattere");
    } else {
        obj.style.borderColor = "red";
        console.log("numero");
    }
}

function calcAge(dateString) {
    var birthday = dateString;
    return ((Date.now() - birthday) / (31557600000));
}

function validateDate(id){
    var obj = document.getElementById(id);
    var stringa = obj.value;
    var day = stringa.substring(0,2);
    var month = stringa.substring(3,5);
    var year = stringa.substring(6,10);
    var date = new Date(year, (month - 1), day);
    var today = new Date();
    console.log(today);
    if((calcAge(date) >= 0) && (calcAge(date) < 100)){
        if(date < today){
            obj.style.border = "1px solid lime";
        } else {
            obj.style.borderColor = "red";
        }
    } else{
        obj.style.borderColor = "red";
    }
}

function validateCAP(id){
    var obj = document.getElementById(id);
    var cap = obj.value;
    var patt = /^\d{1,5}$/;
    if(patt.test(cap)){
        obj.style.border = "1px solid lime";
        console.log("carattere");
    } else {
        obj.style.borderColor = "red";
        console.log("numero");
    }
}