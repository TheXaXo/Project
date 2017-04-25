$(function () {

    $('#searchBar').keyup(function (e) {
        url = '/search?q=' + $('#searchBar').val().split(' ').join('+');
        $('a#button').attr('href', url);
    });
});