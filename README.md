# Sistema de Agenda Eletrônica - XML

O Sistema de Agenda Eletrônica foi desenvolvido em PHP, <a href="https://code.google.com/archive/p/simpledom/">SimpleDOM</a>, JQuery, Bootstrap e muito mais. 

Os dados são gravados em um arquivo .xml; não utiliza banco de dados. 

A extensão <a href="http://php.net/manual/pt_BR/book.simplexml.php">SimpleXML</a> requer PHP 5.

<strong>Instalação</strong>

Simples e rápido. Descompactar o arquivo no diretório (www ou htdocs) do servidor web (apache).

<strong>Importante</strong>

Alguns usuários tem reclamado da Agenda Eletrônica só funcionar localmente. Acontece que algumas hospedagens deixam desabilitado a extensão XSL e ocorre o seguinte erro (PHP Fatal error:  Class 'XSLTProcessor'). Você pode ativar a extensão pelo cpanel ou removendo ';' na linha extension=php_xsl.dll.
