function getListaContratos() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/contratoAction.php?method=getListaContratos',
		success: function(responseData, textStatus, jqXHR) {
			$('#contratos').html(responseData)
		}
	});

}

function getQtdContratos() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/contratoAction.php?method=getQtdContratos',
		success: function(responseData, textStatus, jqXHR) {
			$('#big_stats').html(responseData)
		}
	
	});

}

function getNumeroContratoDataAtual() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/contratoAction.php?method=getNumeroContratoDataAtual',
		success: function(responseData, textStatus, jqXHR) {
			var xmlDoc = $.parseXML(responseData), $xml = $(xmlDoc);
			$('#numContrato').val($xml.find('numContrato').text());
			$('#datInicio').val($xml.find('datInicio').text());
		}
	});

}


function inserirContrato() {
	
	if(document.getElementById('contratoForm').checkValidity()){
		
		var dados = '&';
		
		$("input:text, select, textarea").each(function(){
			dados += $(this).attr('name') + '=' + $(this).val()+'&';
		})
		
		$.ajax({
			type: 'GET',
			crossDomain: true,
			cache: false,
			url: 'actions/contratoAction.php?method=inserirContrato'+dados,
			success: function(responseData, textStatus, jqXHR) {
				$('#myModal').modal('hide');
				getListaContratos();
				getQtdContratos();
				clearForm();
			}
		
		});
		
	} else {
		document.getElementById('btnSubmit').click();
	}
}


function prepararAlterarContrato(seqContrato) {
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/contratoAction.php?method=selecionarContratoPorId&seqContrato='+seqContrato,
		success: function(responseData, textStatus, jqXHR) {
			var xmlDoc = $.parseXML(responseData), $xml = $(xmlDoc);
			
			$('#seqContrato').val($xml.find('seqContrato').text());
			$('#numContrato').val($xml.find('numContrato').text());
			$('#datInicio').val($xml.find('datInicio').text());
			$('#numMesesValidade').val($xml.find('numMesesValidade').text());
			$('#numFormaPagamento').val($xml.find('numFormaPagamento').text());
			$('#numDiaVencimento').val($xml.find('numDiaVencimento').text());
			$('#seqServico').val($xml.find('seqServico').text());
			$('#seqUsuario').val($xml.find('seqUsuario').text());
			$('#dscObservacao').text($xml.find('dscObservacao').text());
			$('#vlrContrato').val($xml.find('vlrContrato').text());

			
			$('#btnAlterar').show();
			$('#btnSalvar').hide();
			
			$('#myModal').modal('show');
			getListaContratos();
			getQtdContratos();
		}
	
	});
	
}

function alterarContrato() {
	
	if(document.getElementById('contratoForm').checkValidity()){
		
		var dados = '&';
		
		$("input:text, input[name=seqContrato], select, textarea").each(function(){
			dados += $(this).attr('name') + '=' + $(this).val()+'&';
		})
		
		$.ajax({
			type: 'GET',
			crossDomain: true,
			cache: false,
			url: 'actions/contratoAction.php?method=atualizarContrato'+dados,
			success: function(responseData, textStatus, jqXHR) {
				$('#myModal').modal('hide');
				getListaContratos();
				getQtdContratos();
				clearForm();
				showMsg('success', 'Sucesso', 'Contrato atualizado com sucesso.');
				$('#btnAlterar').hide();
				$('#btnSalvar').show();
			}
		
		});
		
	} else {
		document.getElementById('btnSubmit').click();
	}
}


function clearForm() {

	$("input[name=seqContrato], select, textarea").each(function(){
		$(this).val("");
		
		if($(this).attr('id') == 'numMesesValidade')
			$(this).val('12');
		
		if($(this).attr('id') == 'numFormaPagamento')
			$(this).val('1');
		
		if($(this).attr('id') == 'numDiaVencimento')
			$(this).val('5');
		
		if($(this).attr('id') == 'seqServico')
			$(this).val('1');
		
	})
	
}

function showMsg(tipo, cabecalho, msg) {
	
     $.msgGrowl ({
         type: tipo,
         title: cabecalho,
         text: msg
     });
}

function confirmaExcluirContrato(seqContrato) {
	
	$.msgbox('Deseja excluir o contrato selecionado?', {
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
					url: 'actions/contratoAction.php?method=excluirContrato&seqContrato='+seqContrato,
					success: function(responseData, textStatus, jqXHR) {
						getListaContratos();
						getQtdContratos();
						showMsg('success', 'Sucesso', 'Contrato excluido com sucesso.');
					}
				
				});
			}
		});

}

$('#btnNovoContrato').click(function(){

	getNumeroContratoDataAtual();

});
