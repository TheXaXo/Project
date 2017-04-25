$(function () {

    var wallpaperRating = parseInt(document.getElementById('wallpaperRating').innerText);

    if (wallpaperRating > 0) {
        $('span#wallpaperRating').attr('style', 'color: green');
    } else if (wallpaperRating < 0) {
        $('span#wallpaperRating').attr('style', 'color: red');
    } else {
        $('span#wallpaperRating').attr('style', 'color: orange');
    }
});
