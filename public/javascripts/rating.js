$(function(){

	   var rating = parseInt(document.getElementById('rating').innerText);

		if (rating > 0) {
			$('span#rating').attr('style', 'color: green');
		} else if (rating < 0) {
				$('span#rating').attr('style', 'color: red');
		} else {
			$('span#rating').attr('style', 'color: orange');
		}

});
