
$(document).ready(function () {
    $("#cmbTitulacion").change(function () {
        if ($("#cmbTitulacion").val().length > 5)
        {
            cargadivconsulta('datos', 'listaaprendices/' + $("#cmbTitulacion").val());
        }
    });
    
    $("#resetBtn").click(function () {
        $("#datos").hide();
    });
       
});

$(document).ready(function() {
    $(".btnPrint").printPage();
  });