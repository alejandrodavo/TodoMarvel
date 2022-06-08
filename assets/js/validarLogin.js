$(document).ready(function () {


    //RECOGE USUARIO Y CONTRASEÑA DE LOCAL STORAGE//
    let us = localStorage.getItem("Usuario")
    let co = localStorage.getItem("Contraseña")

    //LOS INTRODUCE EN EL FORMULARIO//
    if (us != "" && co != "") {
        document.getElementById("usuario").value = us
        document.getElementById("contraseña").value = co
    }

    //RECOGE USUARIO Y CONTRASEÑA DEL FORMULARIO
    $("#iniciar-sesion").click(function () {
        //SI SE ELIGE GUARDAR USUARIO Y CONTRASEÑA//
        if ($("#recordar-contraseña").is(":checked")) {
            us = $("#usuario").val()
            co = $("#contraseña").val()
            //RELLENAR DATOS PERSONA DE LOCAL STORAGE//
            localStorage.setItem("Usuario", us)
            localStorage.setItem("Contraseña", co)
        } else {
            localStorage.clear();
        }
    });

    $("#usuario").blur(function () {
        if ($("#usuario").val() == "") {
            $("#usuario").attr("placeholder", "Introduce usuario!")
            $("#usuario").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#iniciar-sesion").attr("disabled", "disabled")
            $("#iniciar-sesion").toggleClass("iniciar-sesion-disable")
            $("#iniciar-sesion").val("Corrige los errores")
        }
        if ($("#usuario").val() != "") {
            if ($("#contraseña").val() == "") {
                $("#iniciar-sesion").attr("disabled", "disabled");
                $("#iniciar-sesion").toggleClass("iniciar-sesion-disable");
                $("#iniciar-sesion").val("Corrige los errores");
            }
            $("#usuario").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#iniciar-sesion").removeAttr("disabled")
            $("#iniciar-sesion").toggleClass("iniciar-sesion-disable")
            $("#iniciar-sesion").val("Login")
        }
    })

    $("#contraseña").blur(function () {
        if ($("#contraseña").val() == "") {
            $("#contraseña").attr("placeholder", "Contraseña vacía!")
            $("#contraseña").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#error-password").text("Faltan campos")
            $("#iniciar-sesion").attr("disabled", "disabled");
            $("#iniciar-sesion").toggleClass("iniciar-sesion-disable");
            $("#iniciar-sesion").val("Corrige los errores");
        }
        if ($("#contraseña").val() != "") {
            if ($("#usuario").val() == "") {
                $("#iniciar-sesion").attr("disabled", "disabled");
                $("#iniciar-sesion").toggleClass("iniciar-sesion-disable");
                $("#iniciar-sesion").val("Corrige los errores");
            }
            $("#contraseña").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#iniciar-sesion").removeAttr("disabled")
            $("#iniciar-sesion").removeAttr("class")
            $("#iniciar-sesion").val("Login")
        }
    })

    $("#contraseña").keyup(function () {
        var expCont = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/
        if (expCont.test($("#contraseña").val())) {
            $("#error-password").text("")
            $("#iniciar-sesion").removeAttr("class")
            $("#iniciar-sesion").removeAttr("disabled")
            $("#iniciar-sesion").val("Login")
        } else {
            $("#error-password").text("8-16 caracteres, minusculas, mayusculas, digitos y no alfanumérico")
            $("#iniciar-sesion").val("Corrige los errores");
            $("#iniciar-sesion").attr("disabled", "disabled");
            $("#contraseña").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
        }
    })
});