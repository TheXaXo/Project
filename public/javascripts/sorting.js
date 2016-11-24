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
		   sortParameterFromUrl = 'undefined';
	   }
		
	   if (sortParameterFromUrl === 'undefined') {
		   $('a#sortnew').attr('class', 'btn btn-default active');
	   } else if (sortParameterFromUrl === 'views') {
		   $('a#sortviews').attr('class', 'btn btn-default active');
	   } else if (sortParameterFromUrl === 'downloads') {
		   $('a#sortdownloads').attr('class', 'btn btn-default active');
	   }
});