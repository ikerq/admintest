$(document).ready(function(){
	$(".menu-option").on('click', function(){
		loadMainContent($(this).attr('href'));
	});
});

function loadMainContent(url)
{
	console.log(url);
	/*$.get(url, function(response){
		
	});*/
}