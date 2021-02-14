(function(win, doc) {
  'use strict'

  //Delete
  function confirmDel(event){
    event.preventDefault();

    let token = doc.getElementsByName('_token')[0].value;

    if(confirm('deseja mesmo apagar?')){
      let ajax = new XMLHttpRequest();
      ajax.open("DELETE", event.target.parentNode.href);
      ajax.setRequestHeader('X-CSRF-TOKEN', token);
      ajax.onreadystatechange=function(){
        if(ajax.readyState === 4 && ajax.status === 200){
          win.location.href = "products";
        }
      }
      ajax.send()
    }else{
      return false;
    }
  }

  if(doc.querySelector('.jsdel')){
    let btn = doc.querySelectorAll('.jsdel');

    btn.forEach(each => {
      each.addEventListener('click', confirmDel, false);
    });
  }
})(window, document)