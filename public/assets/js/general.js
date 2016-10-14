$(document).ready(function(){

	/*console.log(window.history);
	//loadMainContent(window.history);

	$(".menu-option").on('click', function(e){
		e.preventDefault();

		mainUrl = $(this).data('href');
		loadMainContent(mainUrl);
	});*/
});

function loadMainContent(url)
{
	console.log(url);
	$.get(url, function(response){
		history.pushState({},'',url);
		$('#mainContent').html(response);
	});
}

function loadInitialMarkup(){
	$.get('/admin', function(response){
		$('html').html(response);
	});
}