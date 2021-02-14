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
          win.location.href = "customers";
        }
      }
      ajax.send()
    }else{
      return false;
    }
  }
  //Show
  function show(event){
    event.preventDefault();

    let token = doc.getElementsByName('_token')[0].value;

    console.log('event.target.parentNode.href > ', event.target.parentNode.href);

    $.get(event.target.parentNode.href, {'X-CSRF-TOKEN': token})
    .done(function(data) {
      $("#modalCustomerId").html(`ID: ${data.id}`);
      $("#modalCustomerName").html(`Name: ${data.name}`);
    });
  }

  if(doc.querySelector('.jsdel')){
    let btn = doc.querySelectorAll('.jsdel');

    btn.forEach(each => {
      each.addEventListener('click', confirmDel, false);
    });
  }
  if(doc.querySelector('.jsshow')){
    let btn = doc.querySelectorAll('.jsshow');

    btn.forEach(each => {
      each.addEventListener('click', show, false);
    });
  }
})(window, document)