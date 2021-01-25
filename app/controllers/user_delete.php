<?php

use app\classes\Layout;
use app\classes\Validation;
use app\models\Query;
use app\classes\Uri;

if ($_POST) {

    $validation = new Validation;
    $validate   = $validation->validate($_POST);

    $user = new Query;
    $user->createDelete('usuario', ['id_matricula' => $validate->{'id_matricula'}]);
    $row = $user->delete();

    $id = $validate->{'id_matricula'};

} else {

    $id = Uri::make(Uri::load());
    $id = $id[2];
}

$query_user = "SELECT u.id_matricula, nm_usuario, nm_setor, nm_cargo, ds_login, ds_perfil, u.dt_create, u.dt_update, ds_status, s.id_setor, c.id_cargo, st.id_status
FROM usuario AS u
INNER JOIN login AS l ON u.id_matricula = l.id_matricula
INNER JOIN cargo AS c ON u.id_cargo = c.id_cargo
INNER JOIN setor AS s ON c.id_setor = s.id_setor
INNER JOIN perfil AS p ON c.id_perfil = p.id_perfil
INNER JOIN status AS st ON u.id_status = st.id_status
WHERE u.id_matricula = {$id};";

$user = new Query;
$user->createSelect($query_user);
$found = $user->all();

$select1 = new Query;
$select1->createSelect("SELECT id_setor, nm_setor FROM setor ORDER BY nm_setor;");
$sector = $select1->all();

$select2 = new Query;
$select2->createSelect("SELECT id_cargo, id_setor, nm_cargo FROM cargo ORDER BY nm_cargo;");
$position = $select2->all();

$select3 = new Query;
$select3->createSelect("SELECT id_status, ds_status FROM status ORDER BY ds_status;");
$status = $select3->all();

$layout->add('layout_content');

$content = new Layout;

$content->add('user_delete');