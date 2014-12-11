function getListaClientes() {
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/novoPagamentoAction.php?method=getListaClientes',
		success: function(responseData, textStatus, jqXHR) {
			$('#seqUsuario').html(responseData)
		}
	
	});

}

function inserirPagamentoAvulso() {
	
	if(document.getElementById('pagamentoAvulsoForm').checkValidity()){
		
		var dados = '&';
		
		$("input, select, textarea").each(function(){
			dados += $(this).attr('name') + '=' + $(this).val()+'&';
		});
		
		alert(dados);
		
		$.ajax({
			type: 'GET',
			crossDomain: true,
			cache: false,
			url: 'actions/novoPagamentoAction.php?method=inserirPagamentoAvulso'+dados,
			success: function(responseData, textStatus, jqXHR) {
				
				showMsg('success', 'Sucesso', 'Pagamento(s) incluidos(s) com sucesso.');
				
				clearForm();
				
			}
		
		});
		
	} else {
		document.getElementById('btnSubmit').click();
	}
}

function clearForm() {

	$("#seqUsuario").val("");
	$("#datPagamento").val("");
	$("#vlrPagamento").val("");
	$("#qtdMeses").val("1");
	$("#dscObservacao").val("");

}

function showMsg(tipo, cabecalho, msg) {
	
     $.msgGrowl ({
         type: tipo,
         title: cabecalho,
         text: msg
     });
}

$('#btnSalvar').click(function(){
	
	inserirPagamentoAvulso();
	
});

$(document).ready(function() {
	getListaClientes();
	$('#datPagamento').mask('00/00/0000');	
	$('#vlrPagamento').mask("#.##0,00", {reverse: true, maxlength: false});
});