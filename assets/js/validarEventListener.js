$(document).ready(function () {

  $("#pedidoInput").blur(function () {
    if ($("#pedidoInput").val() == "") {
        $("#pedidoInput").attr("placeholder", "Introduce pedido!")
        $("#pedidoInput").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
        $("#submit-btn").attr("disabled", "disabled")
        $("#submit-btn").css("background-color","rgb(100,100,100)")
        $("#submit-btn").css("color","white")
        $("#submit-btn").css("border","1px solid white")
        $("#submit-btn").val("Corrige los errores")
    }
    if ($("#pedidoInput").val() != "") {
      $("#pedidoInput").attr("placeholder", "Introduce pedido!")
      $("#pedidoInput").css("box-shadow", "inset 0px 0px 0px 0px transparent")
      $("#submit-btn").removeAttr("disabled")
      $("#submit-btn").css("background-color","white")
      $("#submit-btn").css("color","red")
      $("#submit-btn").css("border","1px solid red")
      $("#submit-btn").val("Crear Pedido")
  }
  })
  
})

function ActivaFoco(a){
  a.setAttribute("style", "background-color:rgb(207,207,207)");
}
function quitaFoco(a){
  a.setAttribute("style", "background-color:rgb(247,247,247)");
}

