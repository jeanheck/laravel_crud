(function(win, doc) {
  'use strict'

  //Delete
  function confirmDel(event){
    event.preventDefault();

    let token = doc.getElementsByName('_token')[0].value;

    if(confirm('deseja mesmo apagar?')){
      $.ajax({
        url: event.target.href,
        type: 'DELETE',
        beforeSend: function(request) {
          request.setRequestHeader("X-CSRF-TOKEN", token);
        },
        success: function(response) {
          win.location.href = "customers";
        }
     });
    }else{
      return false;
    }
  }
  //Show
  function show(event){
    event.preventDefault();

    let token = doc.getElementsByName('_token')[0].value;

    $.get(event.target.parentNode.href, {'X-CSRF-TOKEN': token})
    .done(function(data) {
      $("#EditCustomerForm").attr("action", `customers/${data.id}`);
      $("#DeleteCustomer").attr("href", `customers/${data.id}`);
      $("#EditCustomerName").val(data.name);
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