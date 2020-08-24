

$(function (){


	$.ajaxSetup( {
		hearders: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
    });
    
    $(".saveEvent").click(function(){
        let id = $("#modalCalendar input[name='id']").val();

        let cliente = $("#modalCalendar input[name='cliente']").val();

        let start = moment($("#modalCalendar input[name='data-init']").val(),"DD/MM/YYYY HH:mm").format("YYYY-MM-DD HH:mm:ss");
    
        let end = moment($("#modalCalendar input[name='data-fim']").val(),"DD/MM/YYYY HH:mm").format("YYYY-MM-DD HH:mm:ss");

        let barbeiro = $("#modalCalendar input[name='barbeiro']").val();

        let servico = $("#modalCalendar input[name='servico']").val();
    
        let Event = {
        Id: id,
	    title: cliente,
	    start: start,
	    end: end,
        };

		let route;
		let method_ = 'PUT';

        route = routeEvents('routeUpdateEvents');
        Event.id = id;
        Event._method = 'PUT';
console.log(Event);
sendEvent(route,Event);

    });
});

function sendEvent(route, data_, method_){
    
	$.ajax({
		

		method: method_,
		url: route,
		data: data_,
		success: function (json){
			if (json) {
				console.log(route);
				location.reload();
			}
		},
		error: function(xhr, status, error){
			var errorMessage = xhr.status + ': ' + xhr.statusText
			alert('Error - ' + errorMessage);
		}
	});
}

function routeEvents(route){
    return document.getElementById('calendar').dataset[route];
}

function resetForm(form){
	$(form)[0].reset();
	resetBot();
}
