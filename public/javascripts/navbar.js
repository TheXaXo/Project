$(function(){

     var currentPage = window.location.pathname;

	   if (currentPage.split("/")[1] === 'admin') {
		   $('li#admin').attr('class', 'dropdown active');
	   } else if (currentPage.split("/")[2] === 'create') {
       $('li#upload').attr('class', 'active');
     } else if (currentPage.split("/")[2] === 'login') {
       $('li#login').attr('class', 'active');
     } else if (currentPage.split("/")[2] === 'register') {
       $('li#register').attr('class', 'active');
     }
});
