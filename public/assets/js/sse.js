var evtSource = new EventSource("/broadcast", {
	withCredentials: true
  });

evtSource.addEventListener('open', function(){
	console.log('open');
})

evtSource.addEventListener('close', function(){
	console.log('close');
})

evtSource.addEventListener('action1', function(e){
	console.log(e);
	var msg = JSON.parse(e.data);
	console.log('this is action 1-> '+msg.presentId);
	
})
evtSource.addEventListener('action2', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 2-> '+msg);
	
})

evtSource.addEventListener('action3', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 3-> '+msg);
	
})