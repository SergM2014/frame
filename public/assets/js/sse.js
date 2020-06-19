// var evtSource = new EventSource("/broadcast", {
// 	withCredentials: true
//   });
  let evtSource = new EventSource("SseServer.php", {
	withCredentials: true
  });


  evtSource.addEventListener('error', function(error){
	console.error("⛔ EventSource failed: ", error);
  } )

evtSource.addEventListener('open', function(){
	console.log('open');
})

// evtSource.addEventListener('ping', function(e){
// console.log(e)
// })

evtSource.addEventListener('close', function(){
	console.log('close');
})

// evtSource.addEventListener('action1', function(e){
// 	console.log(e);
// 	var msg = JSON.parse(e.data);
// 	console.log('this is action 1-> '+msg.presentId);
	
// })
evtSource.addEventListener('action2', function(e){
	
	var msg = JSON.parse(e.data);
	console.log('this is action 2-> '+msg.presentId);
	// console.log(e);
	// console.log(e.data);
	// console.log(JSON.parse(e.data));
	
})

// evtSource.addEventListener('action3', function(e){
	
// 	var msg = JSON.parse(e.data);
// 	console.log('this is action 3-> '+msg);
	
// })