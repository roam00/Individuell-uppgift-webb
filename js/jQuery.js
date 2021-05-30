$(document).ready(function(){
    setInterval(function() {
        $("#showData").load("../db/Comments/showComments.php")
    }, 1000);
});