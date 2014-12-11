function getListaUsuarios() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/usuarioAction.php?method=getListaUsuarios',
		success: function(responseData, textStatus, jqXHR) {
			$('#usuarios').html(responseData)
		}
	
	});

}

function getQtdUsuarios() {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/usuarioAction.php?method=getQtdUsuarios',
		success: function(responseData, textStatus, jqXHR) {
			$('#big_stats').html(responseData)
		}
	
	});

}

function inserirUsuario() {
	
	if(document.getElementById('usuarioForm').checkValidity()){
		
		var dados = '&';
		
		$("input:text,input:password,input[name=dscEmailUsuario], select").each(function(){
			dados += $(this).attr('name') + '=' + $(this).val()+'&';
		})
		
		$.ajax({
			type: 'GET',
			crossDomain: true,
			cache: false,
			url: 'actions/usuarioAction.php?method=inserirUsuario'+dados,
			success: function(responseData, textStatus, jqXHR) {
				$('#myModal').modal('hide');
				getListaUsuarios();
				getQtdUsuarios();
				clearForm();
			}
		
		});
		
	} else {
		document.getElementById('btnSubmit').click();
	}
}

function gerarPadraoConfirmaSenha() {
	
	var charArray = $('#dscSenhaUsuario').val().split('');
	var pattern = '';
	
	for(var i = 0; i < charArray.length; i++) {
		
		var newItem = '[' + charArray[i] + ']{1}';
		pattern+= newItem;
	}
	
	$('#confirmaSenha').attr('pattern', pattern);
}

$('#dscSenhaUsuario').keyup(function(){
	
	gerarPadraoConfirmaSenha();
	
});


function prepararAlterarUsuario(seqUsuario) {
	
	$.ajax({
		type: 'GET',
		crossDomain: true,
		cache: false,
		url: 'actions/usuarioAction.php?method=selecionarUsuarioPorId&seqUsuario='+seqUsuario,
		success: function(responseData, textStatus, jqXHR) {
			var xmlDoc = $.parseXML(responseData), $xml = $(xmlDoc);
			
			$xml.find('seqUsuario').text();
			
			$('#seqUsuario').val($xml.find('seqUsuario').text());
			$('#nomUsuarioGpsgate').val($xml.find('nomUsuarioGpsgate').text());
			$('#dscNomUsuario').val($xml.find('dscNomUsuario').text());
			$('#dscEmailUsuario').val($xml.find('dscEmailUsuario').text());
			$('#dscSenhaUsuario').val($xml.find('dscSenhaUsuario').text());
			$('#dscEndereco').val($xml.find('dscEndereco').text());
			$('#dscComplemento').val($xml.find('dscComplemento').text());
			$('#dscCep').val($xml.find('dscCep').text());
			$('#dscUf').val($xml.find('dscUf').text());
			$('#dscCidade').val($xml.find('dscCidade').text());
			$('#numTelefone').val($xml.find('numTelefone').text());
			$('#numFoneCelular').val($xml.find('numFoneCelular').text());
			$('#numFoneCelular').val($xml.find('numFoneCelular').text());
			$('#codCpfCnpj').val($xml.find('codCpfCnpj').text());
			$('#datNascimento').val($xml.find('datNascimento').text());
			$('#staAdmin').val($xml.find('staAdmin').text());
			$('#numAppGpsgate').val($xml.find('numAppGpsgate').text());
			
			$('#btnAlterar').show();
			$('#btnSalvar').hide();
			
			gerarPadraoConfirmaSenha();
			
			$('#myModal').modal('show');
			getListaUsuarios();
			getQtdUsuarios();
		}
	
	});
	
}

function alterarUsuario() {
	
	if(document.getElementById('usuarioForm').checkValidity()){
		
		var dados = '&';
		
		$("input:text,input:password,input[name=dscEmailUsuario],input[name=seqUsuario], select").each(function(){
			dados += $(this).attr('name') + '=' + $(this).val()+'&';
		})
		
		$.ajax({
			type: 'GET',
			crossDomain: true,
			cache: false,
			url: 'actions/usuarioAction.php?method=atualizarUsuario'+dados,
			success: function(responseData, textStatus, jqXHR) {
				$('#myModal').modal('hide');
				getListaUsuarios();
				getQtdUsuarios();
				clearForm();
				showMsg('success', 'Sucesso', 'Usuario atualizado com sucesso.');
				$('#btnAlterar').hide();
				$('#btnSalvar').show();
			}
		
		});
		
	} else {
		document.getElementById('btnSubmit').click();
	}
}


function clearForm() {

	$("input:text,input:password,input[name=dscEmailUsuario],input[name=seqUsuario], select").each(function(){
		$(this).val("");
		if($(this).attr('id') == 'dscUf')
			$(this).val('CE');
	})
	
}

function showMsg(tipo, cabecalho, msg) {
	
     $.msgGrowl ({
         type: tipo,
         title: cabecalho,
         text: msg
     });
}

function confirmaExcluirUsuario(seqUsuario) {
	
	$.msgbox('Deseja excluir o usu&aacute;rio selecionado?', {
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
					url: 'actions/usuarioAction.php?method=excluirUsuario&seqUsuario='+seqUsuario,
					success: function(responseData, textStatus, jqXHR) {
						getListaUsuarios();
						getQtdUsuarios();
						showMsg('success', 'Sucesso', 'Usuario excluido com sucesso.');
					}
				
				});
			}
		});

}
