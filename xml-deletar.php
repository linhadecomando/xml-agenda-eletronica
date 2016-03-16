	<?php
	// atribuindo o valor passado na url
	$id_xml = intval($_GET['id']);
	
	// comparando os dados
	foreach ($xml as $dados)
	{
		if ($dados['id'] == $id_xml)
		{
			unset ($dados[0]);
			break;
		}
	}
	
	// atualizando arquivo xml
	file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
	?>
	<div class="alert alert-success"><strong>Sucesso!</strong> Registro removido corretamente.</div>
	<!--// refresh para retornar a página principal -->
	<meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index.php'>