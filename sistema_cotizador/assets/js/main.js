$("document").ready(() => {
  /* Cargar contenido de la cotización */
  function get_quote() {
    let wrapper = $(".wrapper_quote");
    action = "get_quote_res";

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
            wrapper.html(res.data.html);
        }else{
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
