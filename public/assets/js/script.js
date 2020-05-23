//return intersection of two arrays



if (typeof ([].intersect) !== "function") {

    Array.prototype.intersect = function(a){
        return this.filter(function(i){ return a.indexOf(i) > -1;});
    };
}


function refreshImageDataField(){
    let all = document.querySelectorAll('.image');
    let images =[];
    for (let i=0; i < all.length; i++){
        images.push(all[i].dataset.image);
    }
    document.getElementById('imageData').value = images;
//vielleicht hier is die f obj.values zu verwenden
}



function postAjax(givenUrl, formData = new FormData){

        formData.append('ajax', true );


            let url = "/" + Language.attrLangL + givenUrl;

            return   fetch(
                url, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData
                })

}




window.Language = JSON.parse(document.getElementById('languageContainer').value);

//console.log(Language);

document.body.onload = function() {
     
    document.getElementById('languageContainerBox').remove();
    
    
    //здесь обработчик часу
    //get browser clientzone
    let timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    let timeZoneContainer =  document.getElementById('clientTimeZone');
    timeZoneContainer.value = timeZone;
    let timeZoneInitTime = timeZoneContainer.dataset.timezoneinittime;
    
    let nowTime = Math.round(Date.now()/1000);
  

   if (timeZoneInitTime + 1440 < nowTime)
    {
        //launch ajax query
        let formData = new FormData;
        formData.append('timeZone', timeZone);

        postAjax('/index/setTimeZone',formData)
          .then(responce => responce.json())
          .then(j => { timeZoneContainer.dataset.timezoneinittime = j.timeZoneInitTime;
                       timeZoneContainer.dataset.timezonesend = 1;
          })
    }

};

// example how to translate
//translate('loginTitleL');

function translate(word)
{
   return Language[word]

}





document.body.addEventListener('click', function(e){

 if(e.target.classList.contains('footer')){

     $('#modalWindow').modal()
 }







});//ends of events that are hanged on the body



document.body.addEventListener('keyup', function(e){

    if(e.target.classList.contains('form-control')){
        e.target.classList.remove('is-invalid')
    }

});

window.imNotARobot = function() {
    document.getElementById('triggerCaptchaErrorField').classList.remove('is-invalid')
};




if(document.getElementById('manyImagesContainer')){
    let el = document.getElementById('manyImagesContainer');
    let sortable = Sortable.create(el, {
        onEnd: function () {

           refreshImageDataField();
        },
    });
}
