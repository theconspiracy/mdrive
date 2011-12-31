DL = {
	
	apiUrl: "/drivelog",
	//BRANDS
	
	api:function(formId,method)
	{
		//CALLBACK TO VIEW
		onBegin();
		
		//store serialized data
		var theData = $("#"+formId).serialize();
		
		//clear form
		var form = $("#"+formId);
		$(':input', form).each(function(index) 
		{
    		if($(this).attr('type') == 'text')
    		{
    			$(this).val('');
    		}
		});
		
		//HANDLE AJAX CALL
		$.ajax({
  			url: this.apiUrl+'/'+method,
  			data: theData,
  			dataType:"json",
  			type:"POST",
  			success: function(msg){
  				//callback send msg/data
  				onComplete(msg);
  			}
		});
	}
}



