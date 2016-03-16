	<?php
	$result = busca_xml($xml,"dados",$buscar,$opc,$order,$by);
	$conta_result = count($result);
	?>
    <h2><span class="glyphicon glyphicon-phone"></span> CONTATOS CADASTRADOS</h2>
    <hr />
    <form class="form-inline" action="index.php" name="frmBuscar" method="get">
        <div class="form-group">
            <select name="opc" class="form-control">
                <option value="nome"<?=$opc == "nome" ? " selected=\"selected\"" : ""?>>Nome</option>
                <option value="tel"<?=$opc == "tel" ? " selected=\"selected\"" : ""?>>Telefone</option>
                <option value="cel"<?=$opc == "cel" ? " selected=\"selected\"" : ""?>>Celular</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="buscar" value="<?=$buscar?>" id="idBuscar" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">BUSCAR</button>
        <input type="reset" name="limpar" class="btn" id="btnLimpar" value="LIMPAR">
    </form>
    <br>
	<?php
	// verifica se o array possui dados
	if ($conta_result > 0){
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@nome&by=<?=$byC?>">Nome</a></th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th><a href="index.php?opc=<?=$opc?>&buscar=<?=$buscar?>&id=<?=$id?>&action=buscar&order=@email&by=<?=$byC?>">E-mail</a></th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
	        <?php
		    // montando a tabela com os dados do arquivo xml
		    foreach ($result as $dados)
            {
	        ?>
            <tbody>
                <tr>
                    <td><?=$dados["id"]?></td>
                    <td><?=$dados["nome"]?></td>
                    <td><?=$dados["tel"]?></td>
                    <td><?=$dados["cel"]?></td>
                    <td><?=$dados["email"]?></td>
                    <td align="center">
                        <a href="index.php?action=edt&id=<?=$dados["id"]?>" id="btnEditar">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td align="center">
                        <a href="index.php?action=del&id=<?=$dados["id"]?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
	        <?
            }
            ?>
	    </table>
	<?php
	}
    else
    {
	?>
		<div class="alert alert-info"><strong>Aviso!</strong> Contato não cadastrado.</div>
	<?
    }
    ?>