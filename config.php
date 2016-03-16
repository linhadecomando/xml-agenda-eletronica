<?php
	// nome do arquivo xml
	$arquivoXML = "agenda.xml";
	// php simplexml - lendo os dados do arquivo xml
	$xml = simpledom_load_file($arquivoXML);

	// definindo o tempo EM SEGUNDOS para recarregamento da página index.php
	$tempo = 4;
?>