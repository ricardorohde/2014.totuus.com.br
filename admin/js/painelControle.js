function getQtdNotificacoesNaoLidas() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/notificacaoAction.php?method=getQtdNotificacoesNaoLidas',
		success: function(responseData, textStatus, jqXHR) {
			if(responseData != '0')
				$('#notificationCount').html(responseData)
		}
	
	});

}

function getListaNotificacoes() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/notificacaoAction.php?method=getListaNotificacoes',
		success: function(responseData, textStatus, jqXHR) {
				$('#btnNotificacoes').attr('data-content',responseData);
		}
	
	});

}

function updateQtdNotificacoes() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/notificacaoAction.php?method=updateQtdNotificacoes',
		success: function(responseData, textStatus, jqXHR) {
			$('#notificationCount').html('');
		}
	});
}

$('#btnNotificacoes').click(function(){
	updateQtdNotificacoes();
});
