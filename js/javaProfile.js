const form1 = document.getElementById("form1")
const form2 = document.getElementById("form2")
const form3 = document.getElementById("form3")
const errorElement = document.getElementById("error")
const username = document.getElementById("newUsername")
const email = document.getElementById("newEmail")
const password = document.getElementById("newPassword")

function valideraEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email)
}


form1.addEventListener("submit", (e) =>{
    let messages = []

    if (username.value.trim() == ""  || username.value.trim() == null){
        messages.push("You must enter an username.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})

form2.addEventListener("submit", (e) =>{
    let messages = []

    if (!valideraEmail(email.value)){
        messages.push("You must enter a valid email.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})

form3.addEventListener("submit", (e) =>{
    let messages = []

   
    if (password.value.trim() == ""  || password.value.trim() == null){
        messages.push("You must enter a password.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})