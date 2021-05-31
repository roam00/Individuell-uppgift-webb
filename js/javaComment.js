
const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const comment = document.getElementById("comment")

/*
function valideraEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email)
}
*/


form.addEventListener("submit", (e) =>{
    let messages = []

    if (comment.value.trim() == ""  || comment.value.trim() == null){
        messages.push("The comment cannot be empty")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }
})