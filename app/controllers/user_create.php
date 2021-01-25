<?php

use app\classes\Layout;
use app\classes\Validation;
use app\models\Login;
use app\models\Query;

if (!empty($_POST)) {

    $validation = new Validation;
    $validate   = $validation->validate($_POST);

    $selectmax = new Query;
    $selectmax->createSelect("SELECT MAX(id_matricula) + 1 as newid FROM usuario;");
    $idmatricula = $selectmax->all();

    foreach ($idmatricula as $key => $value) {
        $newmatricula = $value->newid;
    }

    if (empty($newmatricula)) {$newmatricula = 100;}

    $login    = new Login;
    $newlogin = $login->createLogin($newmatricula, $validate->{'nm_usuario'});

    $attributes1 = [
        'id_matricula' => $newmatricula,
        'nm_usuario'   => strtoupper($validate->{'nm_usuario'}),
        'id_cargo'     => $validate->{'id_cargo'},
        'id_status'    => 1,
    ];

    $attributes2 = [
        'id_matricula' => $newmatricula,
        'ds_login'     => $newlogin,
        'ps_senha'     => 0,
    ];

    $user = new Query;
    $user->createInsert('usuario', $attributes1);
    $user->insert();
    $user->createInsert('login', $attributes2);
    $user->insert();

    $selectuser = new Query;
    $selectuser->createSelect("SELECT u.id_matricula, u.nm_usuario, l.ds_login, s.nm_setor, c.nm_cargo, u.dt_create
    FROM usuario AS u
    INNER JOIN login AS l ON l.id_matricula = u.id_matricula
    INNER JOIN cargo AS c ON c.id_cargo = u.id_cargo
    INNER JOIN setor AS s ON s.id_setor = c.id_setor
    WHERE u.id_matricula={$newmatricula};");
    $newuser = $selectuser->all();
}

$select1 = new Query;
$select1->createSelect("SELECT id_setor, nm_setor FROM setor ORDER BY nm_setor;");
$sector = $select1->all();

$select2 = new Query;
$select2->createSelect("SELECT id_cargo, id_setor, nm_cargo FROM cargo ORDER BY nm_cargo;");
$position = $select2->all();

$layout->add('layout_content');

$content = new Layout;

$content->add('user_create');
