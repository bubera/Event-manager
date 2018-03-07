$(document).ready(function() {

	// Star rating
	$(function () {
 
        $("#rateYo").rateYo({
            starWidth: "30px",
            halfStar: true
        });
 
    });

    // Tabs del gestor
    $(".gestor-tab").on('click',function() {
    	event.preventDefault();
    	var tab = $(this).attr('data-value');
    	$(".gestor-tab").removeClass('activo');
    	$(this).addClass('activo');
    	switch (true){
    		case (tab == 1): 
    			$(".gestion").addClass('d-none');
    			$(".datos").removeClass('d-none');
   				break;
    		case (tab == 2):
    			$(".gestion").removeClass('d-none');
    			$("datos").addClass('d-none');
    			break;
    	}
    });

    // Modal para reservas
    $(".list").on('click', function() {
    	var dia = $(this).attr('data-day');
    	var turno = $(this).html();
    	$(".modal-title").html("Reservar el turno del dia " + dia + " en el horario " + turno); 
    	
    });

    // gestion de salon
        // editar y cancelar reserva
    $(".edit").on('click', function(event) {
        var para_id = $(this).attr('data-from');
        $("div#res_"+para_id + " .display").addClass('d-none').removeClass('d-flex');
        $("div#res_"+para_id + " .edition").addClass('d-flex').removeClass('d-none');
        $("div#res_"+para_id + " textarea").removeAttr('readonly');
    });
    $(".cancel-res").on('click', function(event) {
        var para_id = $(this).attr('data-from');
        $("div#res_"+para_id + " .adition").addClass('d-flex').removeClass('d-none');
        $("div#res_"+para_id + " .display").addClass('d-none').removeClass('d-flex');
        $("div#res_"+para_id + " textarea").html('');
        $("div#res_"+para_id + " .reserved").addClass('free').removeClass('reserved');
         // borrar datos de la base de datos.
    });
        //aceptar o cancelar edicion
    $(".accept").on('click', function(event) {
            // guardar los cambios en la base de datos y cambiar a display
        var para_id = $(this).attr('data-from');
        $("div#res_"+para_id + " .display").addClass('d-flex').removeClass('d-none');
        $("div#res_"+para_id + " .edition").addClass('d-none').removeClass('d-flex');
        $("div#res_"+para_id + " textarea").attr('readonly', 'true');
    });
    $(".cancel-upd").on('click', function(event) {
        var para_id = $(this).attr('data-from');
        $("div#res_"+para_id + " .edition").addClass('d-none').removeClass('d-flex');
        $("div#res_"+para_id + " .display").addClass('d-flex').removeClass('d-none');
        $("div#res_"+para_id + " textarea").attr('readonly', 'true');
    });
        // agregar
    $(".add").on('click', function(event) {
        var para_id = $(this).attr('data-from');
        $("div#res_"+para_id + " .edition").addClass('d-flex').removeClass('d-none');
        $("div#res_"+para_id + " .adition").addClass('d-none').removeClass('d-flex');
        $("div#res_"+para_id + " textarea").removeAttr('readonly');
        $("div#res_"+para_id + " .free").addClass('reserved').removeClass('free');
    });
});