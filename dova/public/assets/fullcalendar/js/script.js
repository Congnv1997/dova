function routeEvents(route)
{
	return document.getElementById('calendar').dataset[route];
}

$(function(){
	
 	
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.deleteEvent').click(function() {
	let id= $("#modalCalendar input[name='id']").val();
	 let Event={
       	id :id,
       	_method:'DELETE',
     };
     let route=routeEvents('routeEventDelete');
     sendEvent(route,Event);
});
$('.saveEvent').click(function(event) {
 

	 let title= $("#modalCalendar input[name='title']").val();
	 let id= $("#modalCalendar input[name='id']").val();
	 let start= moment($("#modalCalendar input[name='start']").val(),"DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
	 let end= moment($("#modalCalendar input[name='end']").val(),"DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
     let idgiaovien=$('#giaovien-tkb').val();
     let idphonghoc=$('#phonghoc-tkb').val();
     
      let color=$("#modalCalendar input[name='color']").val();
     
       let Event={
       	title :title,
       	start :start,
       	end :end,
       	color :color,
       	idgiaovien :idgiaovien,
       	idphonghoc :idphonghoc,
       };
       let route;
       if(id == '')
       {
         route=routeEvents('routeEventStore');

       }
       else
       	{
         route=routeEvents('routeEventUpdate1');
         Event.id=id;
         Event._method='PUT';
       	}
       	sendEvent(route,Event);


      
});
});	

function sendEvent(route,data_)
{

   $.ajax({
		url: route,
		data: data_,
		method: 'POST',
		dataType: 'json',
		
		success:function(json)
		{
			if(json)
			{
				location.reload();
			}
		},
		error:function(json) {

			let responseJSON=json.responseJSON.errors;
			
			$('#message').html(loadErrors(responseJSON));
		}
	
    });
	
	
}

function loadErrors(response)
{
	
	let boxAlert= '<div class="alert alert-danger">';
	for (let fields in response)
	{
		
		boxAlert +=`<span>${response[fields]}</span><br/>`;
		
	}
	boxAlert +='</div>';
	
	
	return boxAlert;
}

function clearMessages(element)
{
	$(element).text('');
}
