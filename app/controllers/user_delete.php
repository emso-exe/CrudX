<?php

use app\classes\Layout;
use app\classes\Uri;
use app\classes\Validation;
use app\models\Query;

function query($id)
{
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

    return $found;
}

if ($_POST) {

    $validation = new Validation;
    $validate   = $validation->validate($_POST);

    $date = query($validate->{'id_matricula'});

    $user = new Query;
    $user->createDelete('usuario', ['id_matricula' => $validate->{'id_matricula'}]);
    $row = $user->delete();

    $found = $date;

} else {

    $id    = Uri::make(Uri::load());
    $found = query($id[2]);
}

$layout->add('layout_content');

$content = new Layout;

$content->add('user_delete');
