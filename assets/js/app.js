require('bootstrap');
const axios = require('axios');

let name = document.getElementById('name');
let validationResult = document.getElementById('validation-result');
const validateName = function () {
    validationResult.innerText = '...';
    axios.post(validationResult.dataset.path, {input: name.value})
        .then(function(response) {
            if (response.data.valid) {
                validationResult.innerHTML = ':)';
            } else {
                validationResult.innerHTML = ':(';
            }
        })
        .catch(function (error){
            validationResult.innerText = 'Error: ' + error;
        });
};

name.onkeyup = validateName;
name.onchange = validateName;


//////////////team/////////////////////
let team = document.getElementById('team');
let validationResultTeam = document.getElementById('validation-result-team');
const validateTeam = function () {
    validationResultTeam.innerText = '...';
    axios.post(validationResultTeam.dataset.path, {input: team.value})
        .then(function(response) {
            if (response.data.valid) {
                validationResultTeam.innerHTML = ':)';
            } else {
                validationResultTeam.innerHTML = ':(';
            }
        })
        .catch(function (error){
            validationResultTeam.innerText = 'Error: ' + error;
        });
};

team.onkeyup = validateTeam;
// team.onkeyup = validationResultTeam.innerText = "hehe";
team.onchange = validateTeam;
// team.onchange = validationResultTeam.innerText = "hehe";


