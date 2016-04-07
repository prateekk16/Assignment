function callAjax(type, url, dataString, callback){
	try{
		//console.log(type+' '+url+ ' '+dataString);
		$.ajax({
        type: type,
        url: url,
        data: dataString,
         beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='_token']").attr('content'));
         },
         success: function(response) {  
         	callback && callback(response);
         },
         error: function() {
         	callback(0);
         }
     });
	}catch(err){
		callback(0);
	}
}