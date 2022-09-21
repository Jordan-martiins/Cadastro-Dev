$("#bnt-cadastro").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "../php/cadastro.php",
        data: $("#formulario_cadastro").serialize(),
        dataType: "text",
        success: function (response) {
            
          
            $("#resultado").text(response);
          
            
        }
    });
});