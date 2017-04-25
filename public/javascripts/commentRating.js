$(function () {

    var commentRating = parseInt(document.getElementById('commentRating').innerText);

    if (commentRating > 0) {
        $('span#commentRating').attr('style', 'color: green');
    } else if (commentRating < 0) {
        $('span#commentRating').attr('style', 'color: red');
    } else {
        $('span#commentRating').attr('style', 'color: orange');
    }
});
