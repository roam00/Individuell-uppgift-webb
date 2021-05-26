$(function(){
    var randomNum = function(){
        return Math.floor(Math.random()*101)
    }
    $('a').click(function(e){
        e.preventDefault();
        var size = 75 + randomNum(), 
        x = randomNum() + '%', 
        y = randomNum() + '%',

        $img = $('<img/>');
        $img.attr('src', 'http://placekitten.com/' + size + '/' + size);
        $img.css({
            'position': 'fixed',
            'left' : x,
            'top' : y
        });
        $('body').append($img);
    });
});