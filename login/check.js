document.forms['form_cadastro'].onsubmit = function(){return false;};
const login = document.getElementById("login");
const form_cadastro = document.getElementById("form_cadastro");
const user_input = document.getElementById("id_username");
const pass_input = document.getElementById("id_password");
const username_cadastro = document.getElementById("id_username_cadastro");
const token_cadastro = document.getElementById("id_token_cadastro");
const botton_cadastro = document.getElementById("botton_cadastro");
const passwd_cadastro_hidden_one = document.getElementById("id_passwd_cadastro_hidden_one");
const passwd_cadastro_hidden_two = document.getElementById("id_passwd_cadastro_hidden_two");
const password_one = document.getElementById("id_password_one");
const password_two = document.getElementById("id_password_two");
const modal_confirm = document.getElementById("confirm-cadastro");


function SpaceLeft(event) {
    if (user_input.value.length > 4) {
        user_input.style.borderColor = "green";
    } else {
        user_input.style.borderColor = "red";
    }
}
function VerifyPass(event) {
    if (pass_input.value.length > 7) {
        pass_input.style.borderColor = "green";
    } else {
        pass_input.style.borderColor = "red";
    }
}
function VerifyUserRegister(event) {
    if (username_cadastro.value.length > 3) {
        username_cadastro.style.borderColor = "green";
    } else {
        username_cadastro.style.borderColor = "red";
    }
}
function VerifyTokenRegister(event) {
    if ( (username_cadastro.value.length > 4) && (token_cadastro.value.length > 4) ) {
        botton_cadastro.disabled = "";
        botton_cadastro.style["backgroundColor"] = "#e46d95";
        token_cadastro.style.borderColor = "green";
    } else {
        botton_cadastro.disabled = "disabled";
        token_cadastro.style.borderColor = "red";
    }
        
}
function RegisterUser(event) {
    let sendformflag = 0;
    passwd_cadastro_hidden_one.value = password_one.value;
    passwd_cadastro_hidden_two.value = password_two.value;
    if ( username_cadastro.value.length < 5 ) {
        login.style.borderColor = "red";
        UIkit.notification({message: 'O usuário deve ter mais de 4 caracteres.'});
        sendformflag++;
    }
    if ( token_cadastro.value.length < 5 ) {
        login.style.borderColor = "red";
        UIkit.notification({message: 'O token contém 64 caracteres.'});
        sendformflag++;
    }
    if ( ( passwd_cadastro_hidden_two.value.length < 8 ) && ( passwd_cadastro_hidden_one.value.length < 8 ) ) {
        login.style.borderColor = "red";
        UIkit.notification({message: 'A senha deve ter mais de 8 caracteres.'});
        sendformflag++;
    }
    if ( passwd_cadastro_hidden_two.value != passwd_cadastro_hidden_one.value ) {
        login.style.borderColor = "red";
        UIkit.notification({message: 'Senhas diferentes.'});
        sendformflag++;
    }
    if ( sendformflag == 0 ) {
        form_cadastro.submit();
    }
}