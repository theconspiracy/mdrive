DL = {
	
	api:function(formId,method,params)
	{
		var form = $("#"+formId);
		var defaults = {
			confirmAction:false,
			confirmText:'Are you sure?',
			invalidText:'You must complete all form fields.',
			requireAllFields:false,
			validateFields:[],
			apiUrl:"/drivelog",
			onBegin:true,
			onComplete:true
		};
		
		//EXTEND DEFAULTS
		var options = $.extend(defaults,params);
		
		
		var valid = true;
		//DO WE NNED TO VALIDATE FIELDS
		if(options.requireAllFields == true)
		{
			$(':input', form).each(function(index) 
			{
    			if($(this).val() == '')
    			{
    				valid = false;
    			}
			});
		}
		
		///IF THE FORM IS nOT VALID POP A MESSAGE
		if(!valid)
		{
			alert(options.invalidText);
		}
	
		//IF WE REQUIRE A CONFIRMATION BEFORE AN ACTION POP CONFIRM MESSAGE
		if(options.confirmAction == true)
		{
			conf = confirm(options.confirmText);	
		} else {
			conf = true;
		}
		
		
		//ONLY CONTINUE IF ACTION IS VALID AND CONFIRMED
		if(conf && valid)
		{
			//CALLBACK TO VIEW - BEGIN ACTION
			if(options.onBegin)
			{
				onBegin();
			}
			
		
			//store serialized data
			var theData = $("#"+formId).serialize();
			
			//clear form
			$(':input', form).each(function(index) 
			{
    			if($(this).attr('type') != 'button'  && $(this).attr('name')!='free')
    			{
    				$(this).val('');
    			}
			});
		
			if(method)
			{
				//HANDLE AJAX CALL
				$.ajax({
  					url: options.apiUrl+'/'+method,
  					data: theData,
  					dataType:"json",
  					type:"POST",
  					success: function(msg){
  						//onComplete callback, default is on
  						if(options.onComplete)
  						{
  							onComplete(msg);
  						}
  					}
				});
			}
		} else{
			///SEND BACK INVALID MESSAGE TO VIEW
			if(options.onComplete)
  			{
  				onComplete({invalid:true});
  			}
		}
	}
}
jQuery(document).ready(function($) {
//EXTEND JQUERY WITH DL OBJECT
$.extend(DL);
});


