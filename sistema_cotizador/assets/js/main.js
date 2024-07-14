$("document").ready(() => {
  
  function notify(content, type = 'success'){
    let wrapper = $('.wrapper_notifications'),
    id = Math.floor((Math.random * 500) * 500 +1),
    notification = '<div class="alert alert-'+type+'" id="noty_'+id+'">'+content+'</div>',
    time = 5000;

    /* Insertar en el contenedor la notificación */
    wrapper.append(notification);

    /* Timer para ocultar las notificaciones */
    setTimeout(function(){
      $('#noty_'+id).remove();
    }, time);

    return true;
  }
  
  /* Cargar contenido de la cotización */
  function get_quote() {
    let wrapper = $(".wrapper_quote");
    action = "get_quote_res";
    name = $('#nombre');
    company = $('#empresa');
    email = $('#email');

    $.ajax({
      url: "ajax.php",
      type: "get",
      cache: false,
      dataType: "json",
      data: { action },
      beforeSend: function () {
        wrapper.waiMe();
      },
    })
      .done((res) => {
        if(res.status === 200){
            name.val(res.data.quote.name);
            company.val(res.data.quote.company);
            email.val(res.data.quote.email);
            wrapper.html(res.data.html);
        }else{
          name.val('');
          company.val('');
          email.val('');
            wrapper.html(res.msg);
        }
      })
      .fail((err) => {
        wrapper.html('Ocurrio un error, recarga la p{agina...');
      }).always(() => {
        wrapper.waiMe('hide');
      });
  }

  get_quote();
});
