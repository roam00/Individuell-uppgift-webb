const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const username = document.getElementById("username")
const email = document.getElementById("email")
const password = document.getElementById("password")


function valideraEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email)
}


console.log(valideraEmail(email.value));
console.log(email.value);
console.log(username.value);
console.log(password.value);

form.addEventListener("submit", (e) =>{
    let messages = []

    if (username.value.trim() == ""  || username.value.trim() == null){
        messages.push("Du måste ange ett namn.")
    }
    if (!valideraEmail(email.value)){
        messages.push("Du måste ange en giltigt emailaddress.")
    }
    if (password.value.trim() == ""  || password.value.trim() == null){
        messages.push("Du måste skriva ett lösenord.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})