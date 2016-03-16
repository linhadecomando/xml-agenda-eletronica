<?php
########################## FUNÇÕES ##########################
function busca_xml($xml,$node,$busca,$atributo,$order="@nome",$by="d"){
	$result	= array();		
	//retira espaços em branco e arruma a codificação
	$by = ($by == "d") ? (SORT_DESC) : (SORT_ASC);				
	$busca = trim(retira_acento(utf8_decode($busca)));
	foreach($xml->sortedXPath($node,$order,$by) as $linha){
		//retira acento do arquivo XML
		$str = trim(retira_acento(utf8_decode($linha[$atributo])));
		//faz a comparação para a busca. Não diferencia maiúscula ou minúscula
		if(preg_match(strtolower("[$busca]"),strtolower($str))){
			//armazena os resultados encontrados em um array 
			$result[]	= $linha[0];
		}
	}
	//retorna os valores da busca
	return $result;
}
function retira_acento($string){
	
	$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
	$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	//$string = utf8_decode($string);
	$string = strtr($string, utf8_decode($a), $b);
	str_replace(" ","",$string);
	return utf8_decode($string);
}
?>