DL = {
	
	apiUrl: "/drivelog",
	
	//BRANDS
	
	api:function(formId,method,params)
	{
		//alert(params.confirmAction);
		var defaults = {
			confirmAction:false,
			confirmText:'You Sure'
		};
		
		var options = $.extend(defaults,params);
		
		if(options.confirmAction == true)
		{
			conf = confirm(options.confirmText);	
		} else {
			conf = true;
		}
		
		if(conf)
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
}



