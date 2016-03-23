    <?php
    $id_xml = intval($_GET['id']);
	$result = $xml->xpath("dados[@id=$id_xml]");
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3><span class="glyphicon glyphicon-edit"></span> EDITAR CONTATO</h3>
        </div>
        <div class="panel-body">
            <form name='frmEditar' class="form-horizontal" method='post' action='index.php?action=edt&id=<?=$id_xml?>'>
                <input type="hidden" name="submit" value="1">
                <?php
                foreach ($result as $indice => $dados)
                {
                    ?>
                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label">Nome:*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNome" name='inputNome' placeholder="nome completo" value="<?=$dados['nome']?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTel" class="col-sm-2 control-label">Tel:*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mask-phone" id="inputTel" name='inputTel' placeholder="telefone" value="<?=$dados['tel']?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCel" class="col-sm-2 control-label">Cel:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mask-phone" id="inputCel" name='inputCel' placeholder="celular" value="<?=$dados['cel']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNome" class="col-sm-2 control-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name='inputEmail' placeholder="e-mail" value="<?=$dados['email']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type='submit' value='ATUALIZAR' class='btn btn-primary' id='btnAtualizar'>
                            <button type="button" class='btn btn-default' id='btnCancelar'>CANCELAR</button>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submit']) && $_POST['submit'] == 1)
    {
        $nome	= $_POST["inputNome"];
        $tel	= $_POST["inputTel"];
        $cel	= $_POST["inputCel"];
        $email	= $_POST["inputEmail"];

        foreach ($result as $indice => $dados)
        {
            $dados['nome'] 	= $nome;
            $dados['tel'] 	= $tel;
            $dados['cel'] 	= $cel;
            $dados['email'] = $email;
        }

        // inserindo os novos dados no arquivo xml
        file_put_contents( 'agenda.xml', $xml->asPrettyXML() );
        ?>
        <div class="alert alert-success"><strong>Sucesso!</strong> Registro atualizado corretamente.</div>
        <!-- // refresh para retornar a página principal -->
        <meta HTTP-EQUIV='refresh' CONTENT='<?=$tempo?>;URL=index.php'>
        <?php
    }
    ?>