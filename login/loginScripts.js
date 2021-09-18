var warnText = document.querySelector("#warn-text");
var warnBox = document.querySelector("#warn-box");

switch (warnText.innerText) {
    case "err01":
        warnText.innerText = "Usuário já existente, favor usar outro nome ou fazer login!"
        break;

    case "":
        warnBox.classList.remove("alert-danger")
        warnBox.classList.add("alert-success")
        warnText.innerText = "Seja bem-vindo! Faça o seu login ou cadastre-se!"
        break;
        
    case "err02":
        warnText.innerText = "Email ou senha incorretas!"
        break;
}

console.log(warnText.textContent);