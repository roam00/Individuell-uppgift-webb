const email = document.getElementById("email")
const form = document.getElementById("formId")
const errorElement = document.getElementById("error")
const name1 = document.getElementById("name1")
const comment = document.getElementById("comment")


/*
form.addEventListener("submit", (e) =>{
    let messeges = []
    if (email.value == "" || email.value == null){
        messeges.push("Ange email")
    }
    if (messeges.length > 0){
    e.preventDefault();
    errorElement.innerText = messeges.join(", ")
    }
})
*/


function valideraEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email)
}

console.log(valideraEmail(email.value));
console.log(email.value);


form.addEventListener("submit", (e) =>{
    let messages = []

    if (name1.value.trim() == ""  || name1.value.trim() == null){
        messages.push("Du måste ange ett namn.")
    }
    if (!valideraEmail(email.value)){
        messages.push("Du måste ange en giltigt emailaddress.")
    }
    if (comment.value.trim() == ""  || comment.value.trim() == null){
        messages.push("Du måste skriva en kommentar.")
    }
    if (messages.length > 0){
        e.preventDefault();
        errorElement.innerText = messages.join(' , ')
    }

})






/*
function validate() {
    const $result = $("#result");
    const email = $("#email").val();
    $result.text("");
    if (valideraEmail(email)){
        $result.text(email + " is valid :)");
        $result.css("color", "green");
    
    }
    else {
        $result.text(email + " is not valid :(");
        $result.css("color", "red");
    }
    return false;
}
$("#validate").on("click", validate);
*/