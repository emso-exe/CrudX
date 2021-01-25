<div class="d-flex flex-column w-100 h-75">

	<div class="container-fluid h-25 bg-secondary text-center">
		<h1 class="m-3 text-light"><span class="mr-4 opens-regular-italic">Edição de funcionário</span><i class="fas fa-user-edit"></i></h1>
	</div>
	<div class="d-block">

		<form class="m-4" id="form-user-edit" name="form-user-edit" action="user_edit" method="POST" onSubmit="">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="id_matricula" class="col-md-2 col-form-label col-form-label-lg">Matrícula</label>
					<input value="<?=$found[0]->id_matricula?>" class="col-md-10 ml-3 form-control form-control-lg" id="Matrícula" type="text" name="id_matricula" placeholder="Matrícula" onkeypress="" readonly>
				</div>
				<div class="form-group col-md-6">
						<label for="id_status" class="col-md-2 col-form-label col-form-label-lg">Status</label>
						<select class="col-md-10 ml-3 form-control form-control-lg" id="Status" type="text" name="id_status" placeholder="Status" onchange="" required>
						<option value="0">Selecione um status</option>
						<?php foreach ($status as $option): 
							($option->id_status==$found[0]->id_status) ? $selection="selected" : $selection=null;
						?>
							<option value="<?=$option->id_status?>" <?=$selection?>><?=$option->ds_status?></option>
						<?php endforeach?>
						</select>
				</div>
			</div>

        	<div class="form-group">
				<label for="nm_usuario" class="col-md-2 col-form-label col-form-label-lg">Nome</label>
				<input value="<?=$found[0]->nm_usuario?>" class="col-md-11 ml-3 form-control form-control-lg" id="Nome" type="text" name="nm_usuario" placeholder="Nome completo" onkeypress="" required>
			</div>

        	<div class="form-group">
        		<div class="form-row justify-content-between mr-5">
					<label for="ds_login" class="col-md-2 col-form-label col-form-label-lg ml-3">Login</label>
				</div>
				<input value="<?=$found[0]->ds_login?>" class="col-md-11 ml-3 form-control form-control-lg" id="Login" type="text" name="ds_login" placeholder="Login" onkeypress="" readonly>
			</div>

			<div class="form-row mt-4">
    			<div class="form-group col-md-6">
					<label for="id_setor" class="col-md-2 col-form-label col-form-label-lg">Setor</label>
      				<select class="col-md-10 ml-3 form-control form-control-lg validation" id="Setor" type="text" name="id_setor" placeholder="Setor" onchange="" required>
						<option value="0">Selecione um setor</option>
						<?php foreach ($sector as $option): 
							($option->id_setor==$found[0]->id_setor) ? $selection="selected" : $selection=null;
						?>
							<option value="<?=$option->id_setor?>" <?=$selection?>><?=$option->nm_setor?></option>
						<?php endforeach?>
					</select>
				</div>

    			<div class="form-group col-md-6" >
					<label for="id_cargo" class="col-md-2 col-form-label col-form-label-lg">Cargo</label>
      				<select class="col-md-10 ml-3 form-control form-control-lg validation" id="Cargo" type="text" name="id_cargo" placeholder="Cargo" onchange="" required>
						<option data-position="0" value="0">Selecione um cargo</option>
						<?php foreach ($position as $option):
							($option->id_cargo==$found[0]->id_cargo) ? $selection="selected" : $selection=null;
						?>
							<option data-position="<?=$option->id_setor?>" value="<?=$option->id_cargo?>" <?=$selection?>><?=$option->nm_cargo?></option>
						<?php endforeach?>
					</select>
				</div>
			</div>

			<div class="form-row col-md-12 justify-content-center">
				<button class="btn btn-lg btn-success m-4 col-md-4" type="submit" name="salvar" value="salvar"><i class="fas fa-save"></i><span class="ml-4">SALVAR</span></button>
				<button class="btn btn-lg btn-warning m-4 col-md-4" type="reset" name="cancelar" value="cancelar"><i class="fas fa-window-close"></i><span class="ml-4">CANCELAR</span></button>
			</div>

		</form>

	</div>

	<div id="modal-message"></div>

<?php
if ($_POST) {
    echo '<div class="modal fade" id="my-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-white" id=" modalLabel">Usuário alterado</h5>
				</div>
				<div class="modal-body">
					<label>Matrícula:</label><span class="text-success"> ' . $found[0]->id_matricula . '</span><br>
					<label>Nome:</label><span class="text-success"> ' . $found[0]->nm_usuario . '</span><br>
					<label>Login:</label><span class="text-success"> ' . $found[0]->ds_login . '</span><br>
					<label>Setor:</label><span class="text-success"> ' . $found[0]->nm_setor . '</span><br>
					<label>Cargo:</label><span class="text-success"> ' . $found[0]->nm_cargo . '</span><br>
					<label>Status:</label><span class="text-success"> ' . $found[0]->ds_status . '</span><br>
					<label>Data de atualização:</label><span class="text-success"> ' . $found[0]->dt_update . '</span>
				</div>
				<div class="modal-footer">
					<a class="btn btn-success px-5" href="/user_search/edit">OK</a>
					<a class="btn btn-primary px-5" href="/user_edit/' . $found[0]->id_matricula . '" data-dismiss="modal">Editar</a>
				</div>
			</div>
		</div>
	</div>';
}
?>

</div>
