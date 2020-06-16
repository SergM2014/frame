var evtSource = new EventSource("/broadcast", {
	withCredentials: true
  });



evtSource.addEventListener('action1', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 1'+msg);
	
})
evtSource.addEventListener('action2', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 2'+msg);
	
})

evtSource.addEventListener('action3', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 3'+msg);
	
})