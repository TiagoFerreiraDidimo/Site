<html>
	<head>
            <script src="../bootstrap/js/jquery-3.1.0.min.js"></script>
		<title>Exemplo: Populando selects de cidades e estados com AJAX (PHP e jQuery) | DaviFerreira blog!</title>
		<style type="text/css">
			*, html {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				margin: 0px;
				padding: 0px;
				font-size: 12px;
			}

			a {
				color: #0099CC;
			}

			body {
				margin: 10px;
			}
			.carregando{
				color:#666;
				display:none;
			}
		</style>
	</head>
	<body>
		<?php
			include '../../_admin/conection_data_base.php';
		?>
		<label for="cod_estados">Estado:</label>
		<select name="cod_estados" id="cod_estados">
			<option value=""></option>
			<?php
				
                                $sql = "SELECT cod_estados, sigla FROM estados ORDER BY sigla ASC";
                                $pqs = $conn->prepare($sql);
                                $pqs->execute();
                                while ($row = $pqs->fetch()) {
                                    echo '<option value="' . $row['cod_estados'] . '">' . utf8_encode($row['sigla']) . '</option>';
                                }
			?>
		</select>

		<label for="cod_cidades">Cidade:</label>
		<span class="carregando">Aguarde, carregando...</span>
		<select name="cod_cidades" id="cod_cidades">
			<option value="">-- Escolha um estado --</option>
		</select>

		<script src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load('jquery', '1.3');
		</script>		

		<script type="text/javascript">
		$(function(){
			$('#cod_estados').change(function(){
                            alert($(this).val());
				if( $(this).val() ) {
					$('#cod_cidades').hide();
					$('.carregando').show();
					$.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
						}	
						$('#cod_cidades').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
				}
			});
		});
		</script>
	</body>
</htm>