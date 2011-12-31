DL = {
	
	api:function(formId,method,params)
	{
		var form = $("#"+formId);
		
		var defaults = {
			confirmAction:false,
			confirmText:'You Sure',
			requireAllFields:false,
			validateFields:[],
			customMethod:false,
			apiUrl:"/drivelog"
		};
		
		var options = $.extend(defaults,params);
		
		
		var valid = true;
		//DO WE NNED TO VALIDATE FIELDS
		if(options.requireAllFields == true)
		{
			$(':input', form).each(function(index) 
			{
    			if($(this).val() == '' )
    			{
    				//alert($(this).attr('name'));
    				valid = false;
    			}
			});
		}
		
		
		if(!valid)
		{
			alert('You must complete all form fields');
		}
		
		if(options.customMethod)
		{
			options.customMethod.call(formId,method);
			valid = false;
		}
		
		if(options.confirmAction == true)
		{
			conf = confirm(options.confirmText);	
		} else {
			conf = true;
		}
		
		if(conf && valid)
		{
			//CALLBACK TO VIEW
			onBegin();
		
			//store serialized data
			var theData = $("#"+formId).serialize();
			
			//clear form
			$(':input', form).each(function(index) 
			{
    			if($(this).attr('type') != 'button' )
    			{
    				$(this).val('');
    			}
			});
		
			//HANDLE AJAX CALL
			$.ajax({
  				url: options.apiUrl+'/'+method,
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

//EXTEND JQUERY WITH DL OBJECT
$.extend(DL);


