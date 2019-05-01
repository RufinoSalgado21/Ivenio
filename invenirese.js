//Rufino Salgado
//CS 415 Design of Data Base Systems
		window.onscroll = function() {scrollFunction();}
		function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("myBtn").style.display = "block";
				} else {
					document.getElementById("myBtn").style.display = "none";
				}
			}
		function topFunction() 
		{
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}	
			
		document.addEventListener('DOMContentLoaded', 
			function() 
			{
				document.getElementById("myBtn").addEventListener(
					"click", function(){topFunction();}
				);
				
				
			}, false
		);
			
		
			