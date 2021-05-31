const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const username = document.getElementById("username")
const password = document.getElementById("password")
//const userError = document.getElementById("userError")



form.addEventListener("submit", (e) =>{
    let messages = []

    if (username.value.trim() == ""  || username.value.trim() == null){
        messages.push("Du måste ange ett namn.")
    }
    if (password.value.trim() == ""  || password.value.trim() == null){
        messages.push("Du måste skriva ett lösenord.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})