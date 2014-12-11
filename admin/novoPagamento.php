<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pagamentos m&ecirc;s corrente:: Totuus Admin</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/fonts.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
		<link href="css/msgGrowl.css" rel="stylesheet">
		<link href="css/jquery.lightbox.css" rel="stylesheet">
		<link href="css/jquery.msgbox.css" rel="stylesheet">
		<link href="css/base-admin-3.css" rel="stylesheet">
		<link href="css/base-admin-3-responsive.css" rel="stylesheet">
		<link href="css/reports.css" rel="stylesheet">
		<link href="css/admin.css" rel="stylesheet">

	</head>

	<body>

		<?php include("includes/topo.php") ?>

		<div class="main">

			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<div class="widget stacked">

							<div class="widget-header">
								<i class="icon-inbox"></i>
								<h3>Inserir novo pagamento</h3>
							</div>
							<!-- /.widget-header -->

							<div class="widget-content">

								<form action="/" role="form" class="col-md-5" id="pagamentoAvulsoForm">

									<div class="form-group">
										<label>Cliente</label>
										<select id="seqUsuario" name="seqUsuario" class="form-control" required>
											
										</select>
										
									</div>
									<!-- /.form-group -->

									<div class="form-group">
										<label>Data do pagamento</label>
										<input type="text" name="datPagamento" id="datPagamento" value="" class="form-control" placeholder="Data do Pagamento" required/>
										
									</div>

									<div class="form-group">
										<label>Valor</label>
										<input type="text" name="vlrPagamento" id="vlrPagamento" value="" class="form-control" placeholder="Valor do Pagamento" required/>
										
									</div>

									<div class="form-group ">

										<label>Repetir por quantos m&ecirc;ses?</label>

										<select id="qtdMeses" name="qtdMeses" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="24">24</option>
											<option value="36">36</option>
											<option value="48">48</option>
										</select>
									</div>
									
									
									<div class="form-group ">

										<label>Observa&ccedil;&otilde;es</label>

										<textarea class="form-control input-xlarge" id="dscObservacao" name="dscObservacao" rows="5" 
											placeholder="Observa&ccedil;&otilde;es" ></textarea>
										
									</div>
									
									<div class="form-group">
										
										<button type="submit" class="btn btn-default" style="display: none;" id="btnSubmit"></button>
										
										<button type="button" class="btn btn-default" id="btnSalvar">Salvar</button>

									</div>
									<!-- /.form-group -->

								</form>

							</div>
							<!-- /.widget-content -->

						</div>
						<!-- /.widget -->

					</div>
					<!-- /.col-md-12 -->

				</div>
				<!-- /.row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /main -->

		<? include ("includes/rodape.php"); ?>

		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="js/jquery.mask.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script src="js/msgGrowl.js"></script>
		<script src="js/jquery.lightbox.min.js"></script>
		<script src="js/jquery.msgbox.min.js"></script>

		<script src="js/novoPagamento.js"></script>
		<script src="js/notifications.js"></script>
		
	</body>
</html>
