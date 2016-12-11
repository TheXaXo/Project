$(function(){

	   var sortParameterFromUrl = null;
       var queryFromUrl = window.location.search.substring(1);
       var vars = queryFromUrl.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == 'sort'){
				   sortParameterFromUrl = pair[1];
			    }
        }

		if (sortParameterFromUrl === null) {
		   sortParameterFromUrl = 'rating';
	   }

	   if (sortParameterFromUrl === 'rating') {
		   $('a#ratingSort').attr('class', 'btn btn-default active');
	   } else if (sortParameterFromUrl === 'new') {
		   $('a#newSort').attr('class', 'btn btn-default active');
	   }
});
