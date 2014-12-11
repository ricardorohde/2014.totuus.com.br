function getListaPagamentosMesCorrente() {
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/pagamentoAction.php?method=getListaPagamentosMesCorrente',
		success: function(responseData, textStatus, jqXHR) {
			$('#pagamentos').html(responseData)
		}
	
	});

}

function getListaPagamentosAvulsosMesCorrente() {
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/pagamentoAction.php?method=getListaPagamentosAvulsosMesCorrente',
		success: function(responseData, textStatus, jqXHR) {
			$('#pagamentosAvulsos').html(responseData)
		}
	
	});

}

function getQtdPagamentos() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/pagamentoAction.php?method=getQtdPagamentos',
		success: function(responseData, textStatus, jqXHR) {
			$('#big_stats').html(responseData)
		}
	
	});

}

function showMsg(tipo, cabecalho, msg) {
	
     $.msgGrowl ({
         type: tipo,
         title: cabecalho,
         text: msg
     });
}

function confirmaMudarStatusPagamento(seqPagamento) {
	
	$.msgbox('Deseja mudar o status do pagamento para \'Realizado\'?', {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: 'Sim', },
		    {type: "cancel", value: "Cancelar"}
		  ]
		}, function(result) {
			if(result == 'Sim') {
				$.ajax({
					type: 'GET',
					crossDomain: true,
					cache: false,
					url: 'actions/pagamentoAction.php?method=mudarStatusPagamento&seqPagamento='+seqPagamento,
					success: function(responseData, textStatus, jqXHR) {
						getListaPagamentosMesCorrente();
						getQtdPagamentos();
						showMsg('success', 'Sucesso', 'Status do pagamento alterado com sucesso.');
					}
				
				});
			}
		});

}
