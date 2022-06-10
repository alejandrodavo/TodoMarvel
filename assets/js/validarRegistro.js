$(document).ready(function () {

    $("#usuario").blur(function () {
        if ($("#usuario").val() == "") {
            $("#usuario").attr("placeholder", "Introduce usuario!")
            $("#usuario").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#login").attr("disabled", "disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Corrige los errores")
        }
        if ($("#usuario").val() != "") {
            if ($("#contraseña").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#usuario").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Login")
        }
    })


    $("#fecha").blur(function () {
        if ($("#fecha").val() == "") {
            $("#fecha").attr("placeholder", "Introduce fecha!")
            $("#fecha").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#login").attr("disabled", "disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Corrige los errores")
        }
        if ($("#fecha").val() != "") {
            if ($("#contraseña").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#fecha").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Login")
        }
    })

    $("#email").blur(function () {
        if ($("#email").val() == "") {
            $("#email").attr("placeholder", "Introduce email!")
            $("#email").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#login").attr("disabled", "disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Corrige los errores")
        }
        if ($("#email").val() != "") {
            if ($("#contraseña").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#email").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").toggleClass("iniciar-sesion-disable")
            $("#login").val("Login")
        }
    })




    $("#contraseña1").blur(function () {
        if ($("#contraseña1").val() == "") {
            $("#contraseña1").attr("placeholder", "Contraseña vacía!")
            $("#contraseña1").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#error-password").text("Faltan campos")
            $("#login").attr("disabled", "disabled");
            $("#login").toggleClass("iniciar-sesion-disable");
            $("#login").val("Corrige los errores");
        }
        if ($("#contraseña1").val() != "") {
            if ($("#usuario").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#contraseña1").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").removeAttr("class")
            $("#login").val("Login")
        }
        if ($("#contraseña1").val() != $("#contraseña2").val()) {
            $("#error-password").text("Contraseñas diferentes")
            $("#login").attr("disabled", "disabled");
            $("#login").toggleClass("iniciar-sesion-disable");
            $("#login").val("Contraseñas diferentes");
        }else{
            $("#contraseña1").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").removeAttr("class")
            $("#login").val("Login")
        }

    })


    $("#contraseña2").blur(function () {
        if ($("#contraseña2").val() == "") {
            $("#contraseña2").attr("placeholder", "Contraseña vacía!")
            $("#contraseña2").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#error-password").text("Faltan campos")
            $("#login").attr("disabled", "disabled");
            $("#login").toggleClass("iniciar-sesion-disable");
            $("#login").val("Corrige los errores");
        }
        if ($("#contraseña2").val() != "") {
            if ($("#usuario").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#contraseña2").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").removeAttr("class")
            $("#login").val("Login")
        }
        if ($("#contraseña2").val() != $("#contraseña1").val()) {
            $("#login").attr("disabled", "disabled");
            $("#login").toggleClass("iniciar-sesion-disable");
            $("#login").val("Contraseñas diferentes");
        }else{
            $("#contraseña2").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").removeAttr("class")
            $("#login").val("Login")
        }

    })




    $("#nombre").blur(function () {
        if ($("#nombre").val() == "") {
            $("#nombre").attr("placeholder", "Nombre vacío!")
            $("#nombre").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,1)")
            $("#error-password").text("Faltan campos")
            $("#login").attr("disabled", "disabled");
            $("#login").toggleClass("iniciar-sesion-disable");
            $("#login").val("Corrige los errores");
        }
        if ($("#nombre").val() != "") {
            if ($("#usuario").val() == "") {
                $("#login").attr("disabled", "disabled");
                $("#login").toggleClass("iniciar-sesion-disable");
                $("#login").val("Corrige los errores");
            }
            $("#nombre").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
            $("#login").removeAttr("disabled")
            $("#login").removeAttr("class")
            $("#login").val("Login")
        }
    })



    $("#email").keyup(function () {
        var expCont = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/
        if (expCont.test($("#email").val())) {
            $("#error-password").text("")
            $("#login").removeAttr("class")
            $("#login").removeAttr("disabled")
            $("#login").val("Login")
        } else {
            $("#error-password").text("Email no valido")
            $("#login").val("Corrige los errores");
            $("#login").attr("disabled", "disabled");
            $("#email").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
        }
    })

    $("#contraseña1").keyup(function () {
        var expCont = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/
        if (expCont.test($("#contraseña1").val())) {
            $("#error-password").text("")
            $("#login").removeAttr("class")
            $("#login").removeAttr("disabled")
            $("#login").val("Login")
        } else {
            $("#error-password").text("8-16 caracteres, minusculas, mayusculas, digitos y no alfanumérico")
            $("#login").val("Corrige los errores");
            $("#login").attr("disabled", "disabled");
            $("#contraseña").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
        }
    })
    $("#contraseña2").keyup(function () {
        var expCont = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/
        if (expCont.test($("#contraseña1").val())) {
            $("#error-password").text("")
            $("#login").removeAttr("class")
            $("#login").removeAttr("disabled")
            $("#login").val("Login")
        } else {
            $("#error-password").text("8-16 caracteres, minusculas, mayusculas, digitos y no alfanumérico")
            $("#login").val("Corrige los errores");
            $("#login").attr("disabled", "disabled");
            $("#contraseña").css("box-shadow", "inset 0px 0px 2px 2px rgba(237,29,36,0)")
        }
    })
});