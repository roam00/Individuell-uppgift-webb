const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const username = document.getElementById("username")
const email = document.getElementById("email")
const password = document.getElementById("password")
//const userError = document.getElementById("userError")


function valideraEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email)
}


form.addEventListener("submit", (e) =>{
    let messages = []

    if (username.value.trim() == ""  || username.value.trim() == null){
        messages.push("You must enter an username.")
    }
    if (!valideraEmail(email.value)){
        messages.push("You must enter a valid email.")
    }
    if (password.value.trim() == ""  || password.value.trim() == null){
        messages.push("You must enter a password.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})