let popupMenuSaved;


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
        .catch(e => console.log(e))

}



window.Language = JSON.parse(document.getElementById('languageContainer').value);





// example how to translate
//translate('loginTitleL');
function translate(word)
{

    return Language[word];
}









class Alert {

    static hide() {

        if(document.getElementById('alert')){
            document.getElementById('alert').remove();
        }
    }

    static show(message) {
        this.hide();
        document.body.insertAdjacentHTML('afterBegin', `
                <div id="alert" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
                      <strong id="alert-text">Holy guacamole!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                `);
        document.getElementById('alert-text').innerText = message;
    }
}



class PopUpMenu{
    constructor(e){
        this.x = e.pageX;
        this.y = e.pageY;

        this.screenWidth = document.body.clientWidth;
        this.screenHeight = document.body.clientHeight;
        this.target = e.target;
    }


    drawMenuFrame(x = 100, y = 60){

        if(popupMenuSaved && document.getElementById('popupMenu')){
            this.popUp = document.getElementById('popupMenu');
            this.popUp.classList.remove('d-none')
        } else {

            this.popUp = document.createElement('div');
            this.popUp.className = "popup-menu";
            this.popUp.id = "popupMenu";
            this.popUp.classList.add('list-group');

            document.body.insertBefore(this.popUp, document.body.firstChild);
        }



        if(this.x+x >this.screenWidth+pageXOffset) this.x= (this.screenWidth+pageXOffset-x);
        if(this.y+y >this.screenHeight+pageYOffset) this.y= (this.screenHeight+pageYOffset-y);

        this.popUp.style.left = this.x+"px";
        this.popUp.style.top = this.y+"px";
    }

    static deleteMenu()
    {
        if(document.getElementById('popupMenu')){document.getElementById('popupMenu').remove();}
    }


    outputMenu(id, popUpContr, processContr){

       this.drawMenuFrame();

        let formData = new FormData;
        formData.append('id', id);
        formData.append('processContr', processContr);

        postAjax(popUpContr,formData)
            .then(response => { popupMenuSaved = true; return response.text(); })
            .then(html =>document.getElementById('popupMenu').innerHTML= html);
    }

    static hideMenu()
    {
        if(document.getElementById('popupMenu')){
            document.getElementById('popupMenu').classList.add('d-none');


        }
    }


}

/* where popUpControler is controler responsible foe menu drawing
and prozessControler is acjntroler that is used in output menu of popupview */

//new PopUpMenu(e).outputMenu(id, popupController(routing), prozessController)


class Modal {

    static showWindow(controller, formData){       
       
        postAjax(controller,formData)
             .then(response => response.text())
            .then(html =>document.getElementById('modal-body').innerHTML = html);
    }

    static hide (){
        $('#modalWindow').hide();
        document.getElementById('modal-body').innerHTML = '';
    }


}


//hide popup menu at the click outside
document.getElementsByClassName('container')[0].addEventListener('click', function (e) {
    if( document.getElementById('popupMenu')){

        PopUpMenu.hideMenu();
    }
    Alert.hide();
});


document.body.onload = function(){
    document.getElementById('languageContainerBox').remove();
    console.log(Language);

};

document.body.addEventListener('click', function (e) {

    if(e.target.id === 'clickMeToAlert' ){
        Alert.show('this is the alert')
    }

//example how to activate popupmenu
    if(e.target.id === "clickMeToPopup") {

        let id = 1;
        new PopUpMenu(e).outputMenu(id, '/popup/category/'+id, 'routingInMenu');
    }

//close popup menu

    if(!e.target.closest('#popupMenu') && !e.target.closest('.content')){
        if(document.getElementById('popupMenu')){
            document.getElementById('popupMenu').remove();
        }
    }


    if(e.target.id === "clickMeToModal") {

        $('#modalWindow').modal();
       Modal.showWindow('/modal/show/');
    }


    });










