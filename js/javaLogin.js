const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const username = document.getElementById("username")
const password = document.getElementById("password")
//const userError = document.getElementById("userError")



form.addEventListener("submit", (e) =>{
    let messages = []

    if (username.value.trim() == ""  || username.value.trim() == null){
        messages.push("You must enter a username")
    }
    if (password.value.trim() == ""  || password.value.trim() == null){
        messages.push("You must enter a password")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(', ')
    }
})