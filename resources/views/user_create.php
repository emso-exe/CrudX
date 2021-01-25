<div class="d-flex flex-column w-100 h-75">

	<div class="container-fluid h-25 bg-secondary text-center">
		<h1 class="m-3 text-light"><span class="mr-4 opens-regular-italic">Cadastro de funcionário</span><i class="fas fa-user-tie"></i></h1>
	</div>
	<div class="d-block">

		<form class="m-4" id="form-user-create" name="form-user-create" action="user_create" method="POST" onSubmit="">

        	<div class="form-group">
				<label for="nm_nome" class="col-md-2 col-form-label col-form-label-lg">Nome</label>
				<input class="col-md-11 ml-3 form-control form-control-lg validation" id="Nome" type="text" name="nm_usuario" placeholder="Nome completo" onkeypress="" required>
			</div>

			<div class="form-row mt-5">
    			<div class="form-group col-md-6">
					<label for="cd_setor" class="col-md-2 col-form-label col-form-label-lg">Setor</label>
      				<select class="col-md-10 ml-3 form-control form-control-lg validation" id="Setor" type="text" name="id_setor" placeholder="Setor" onchange="" required>
						<option value="0">Selecione um setor</option>
						<?php foreach ($sector as $option): ?>
							<option value="<?=$option->id_setor?>"><?=$option->nm_setor?></option>
						<?php endforeach?>
					</select>
				</div>

    			<div class="form-group col-md-6" >
					<label for="cd_cargo" class="col-md-2 col-form-label col-form-label-lg">Cargo</label>
      				<select class="col-md-10 ml-3 form-control form-control-lg validation" id="Cargo" type="text" name="id_cargo" placeholder="Cargo" onchange="" required>
						<option data-position="0" value="0">Selecione um cargo</option>
						<?php foreach ($position as $option): ?>
							<option data-position="<?=$option->id_setor?>" value="<?=$option->id_cargo?>"><?=$option->nm_cargo?></option>
						<?php endforeach?>
					</select>
				</div>
			</div>

			<div class="form-row col-md-12 justify-content-center mt-5">
				<button class="btn btn-lg btn-success m-4 col-md-4" type="submit" name="cadastrar" value="cadastrar"><i class="fas fa-save"></i><span class="ml-4">CADASTRAR</span></button>
				<button class="btn btn-lg btn-warning m-4 col-md-4" type="reset" name="limpar" value="limpar"><i class="fas fa-eraser"></i><span class="ml-4">LIMPAR</span></button>
			</div>

		</form>
	</div>

	<div id="modal-message"></div>

<?php

if (isset($newuser)) {
    echo '<div class="modal fade" id="my-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title text-white" id=" modalLabel">Usuário cadastrado</h5>
				</div>
				<div class="modal-body">
					<label>Matrícula:</label><span class="text-primary"> ' . $newuser[0]->id_matricula . '</span><br>
					<label>Nome:</label><span class="text-primary"> ' . $newuser[0]->nm_usuario . '</span><br>
					<label>Login:</label><span class="text-primary"> ' . $newuser[0]->ds_login . '</span><br>
					<label>Setor:</label><span class="text-primary"> ' . $newuser[0]->nm_setor . '</span><br>
					<label>Cargo:</label><span class="text-primary"> ' . $newuser[0]->nm_cargo . '</span><br>
					<label>Data de criação:</label><span class="text-primary"> ' . $newuser[0]->dt_create . '</span>
				</div>
				<div class="modal-footer">
					<a class="btn btn-primary px-5" href="user_create">OK</a>
					<a class="btn btn-success px-5" href="" data-dismiss="modal">Novo</a>
				</div>
			</div>
		</div>
	</div>';
}
?>

</div>
