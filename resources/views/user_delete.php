<div class="d-flex flex-column w-100 h-75">

	<div class="container-fluid h-25 bg-secondary text-center">
		<h1 class="m-3 text-light"><span class="mr-4 opens-regular-italic">Exclusão de funcionário</span><i class="fas fa-user-slash"></i></h1>
	</div>
	<div class="d-block">

		<form class="m-4" id="form-user-delete" name="form-user-delete" action="" method="POST" onSubmit="">

		<div class="form-row">
				<div class="form-group col-md-4">
					<label for="id_matricula" class="col-md-2 col-form-label col-form-label-lg">Matrícula</label>
					<p class="col-md-10 ml-3 text-danger alert alert-danger" id="id_matricula" name="id_matricula"><?=$found[0]->id_matricula?></p>
					<input value="<?=$found[0]->id_matricula?>" id="id_matricula" type="text" name="id_matricula" placeholder="id_matricula" onkeypress="" readonly hidden>
				</div>
				<div class="form-group col-md-4">
					<label for="ds_login" class="col-md-2 col-form-label col-form-label-lg">Login</label>
					<p class="col-md-11 ml-3 text-danger alert alert-danger" id="ds_login" name="ds_login"><?=$found[0]->ds_login?></p>
				</div>
				<div class="form-group col-md-4">
					<label for="cd_status" class="col-md-2 col-form-label col-form-label-lg">Status</label>
					<p class="col-md-10 ml-3 text-danger alert alert-danger" id="ds_status" name="ds_status"><?=$found[0]->ds_status?></p>
				</div>
			</div>

        	<div class="form-group">
				<label for="nm_usuario" class="col-md-2 col-form-label col-form-label-lg">Nome</label>
				<p class="col-md-11 ml-3 text-danger alert alert-danger" id="nm_usuario" name="nm_usuario"><?=$found[0]->nm_usuario?></p>
			</div>

			<div class="form-row">
    			<div class="form-group col-md-6">
					<label for="cd_setor" class="col-md-2 col-form-label col-form-label-lg">Setor</label>
      				<p class="col-md-10 ml-3 text-danger alert alert-danger" id="nm_setor" name="nm_setor"><?=$found[0]->nm_setor?></p>
				</div>
    			<div class="form-group col-md-6" >
					<label for="cd_cargo" class="col-md-2 col-form-label col-form-label-lg">Cargo</label>
      				<p class="col-md-10 ml-3 text-danger alert alert-danger" id="nm_cargo" name="nm_cargo"><?=$found[0]->nm_cargo?></p>
				</div>
			</div>

			<div class="col-md-11 ml-3 mr-3 mt-3 alert alert-danger" role="alert">
				<p class="mt-1 mb-1 text-center">
					<small><strong>ATENÇÃO!</strong> Ao clicar no botão <strong>EXCLUIR</strong> esta ação será irreversível, se existem dúvidas referente a continuidade da operação clique em <strong>CANCELAR</strong>.</small>
				</p>
  				<hr>
  				<div class="form-row col-md-12 justify-content-center mb-3 mt-4">
					<button class="btn btn-lg btn-danger mr-2 col-md-4" type="submit" name="excluir" value="1"><i class="fas fa-trash-alt"></i><span class="ml-4">EXCLUIR</span></button>
					<button class="btn btn-lg btn-warning ml-2 col-md-4" type="reset" name="cancelar" value="0"><i class="fas fa-window-close"></i><span class="ml-4">CANCELAR</span></button>
				</div>
			</div>

		</form>

        </div>

<div id="modal-message"></div>

<?php
if ($_POST) {
echo '<div class="modal fade" id="my-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id=" modalLabel">Usuário excluído</h5>
            </div>
            <div class="modal-body">
                <label>Matrícula:</label><span class="text-danger"> ' . $found[0]->id_matricula . '</span><br>
                <label>Nome:</label><span class="text-danger"> ' . $found[0]->nm_usuario . '</span><br>
                <label>Login:</label><span class="text-danger"> ' . $found[0]->ds_login . '</span><br>
                <label>Setor:</label><span class="text-danger"> ' . $found[0]->nm_setor . '</span><br>
                <label>Cargo:</label><span class="text-danger"> ' . $found[0]->nm_cargo . '</span><br>
                <label>Status:</label><span class="text-danger"> ' . $found[0]->ds_status . '</span><br>
                
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger px-5" href="/user_search/edit">OK</a>
                <!--<a class="btn btn-primary px-5" href="/user_edit/' . $found[0]->id_matricula . '" data-dismiss="modal">Copiar dados</a>-->
            </div>
        </div>
    </div>
</div>';
}
?>

</div>