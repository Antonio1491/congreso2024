$(window).ready(function(){
	$("#ocultar_texto").click(function(){
		$(".ocultar_dia2").hide();
		$(".ocultar_dia3").hide();
		$(".ocultar_dia1").show();

	

	});
	$("#ocultar_texto1").click(function(){
		$(".ocultar_dia3").hide();
		$(".ocultar_dia1").hide();
		$(".ocultar_dia2").show();

	

	});
	$("#ocultar_texto2").click(function(){
		$(".ocultar_dia1").hide();
		$(".ocultar_dia2").hide();
		$(".ocultar_dia3").show();

	

	});
	$("#mostrar_todo").click(function(){
	
		$(".ocultar_dia1").show();
		$(".ocultar_dia2").show();
		$(".ocultar_dia3").show();


	

	});

});