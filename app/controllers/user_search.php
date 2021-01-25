<?php

use app\classes\Layout;
use app\classes\Validation;
use app\models\Query;
use app\classes\Uri;

$validation = new Validation;
$validate   = $validation->validate($_POST);

$query_user = "SELECT u.id_matricula, nm_usuario, nm_setor, nm_cargo, ds_login, ds_perfil, u.dt_create, u.dt_update, ds_status
FROM usuario AS u
INNER JOIN login AS l ON u.id_matricula = l.id_matricula
INNER JOIN cargo AS c ON u.id_cargo = c.id_cargo
INNER JOIN setor AS s ON c.id_setor = s.id_setor
INNER JOIN perfil AS p ON c.id_perfil = p.id_perfil
INNER JOIN status AS st ON u.id_status = st.id_status";

$user = new Query;

switch (true) {
    case (!empty($validate->{'ds_search'})):
        $user->createSelect($query_user . " WHERE u.id_matricula LIKE '%{$validate->{'ds_search'}}%'
        OR nm_usuario LIKE '%{$validate->{'ds_search'}}%'
        OR nm_setor LIKE '%{$validate->{'ds_search'}}%'
        OR nm_cargo LIKE '%{$validate->{'ds_search'}}%'
        OR ds_login LIKE '%{$validate->{'ds_search'}}%'
        OR ds_perfil LIKE '%{$validate->{'ds_search'}}%'
        OR ds_status LIKE '%{$validate->{'ds_search'}}%'
        ;"
        );
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_matricula'})):
        $user->createSelect($query_user . " WHERE u.id_matricula LIKE '%{$validate->{'ds_search_matricula'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_nome'})):
        $user->createSelect($query_user . " WHERE nm_usuario LIKE '%{$validate->{'ds_search_nome'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_setor'})):
        $user->createSelect($query_user . " WHERE nm_setor LIKE '%{$validate->{'ds_search_setor'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_cargo'})):
        $user->createSelect($query_user . " WHERE nm_cargo LIKE '%{$validate->{'ds_search_cargo'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_login'})):
        $user->createSelect($query_user . " WHERE ds_login LIKE '%{$validate->{'ds_search_login'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_perfil'})):
        $user->createSelect($query_user . " WHERE ds_perfil LIKE '%{$validate->{'ds_search_perfil'}}%';");
        $users = $user->all();
        break;
    case (!empty($validate->{'ds_search_criacao'})):
        $user->createSelect($query_user . " WHERE u.dt_create LIKE '%{$validate->{'ds_search_criacao'}}%';");
        $users = $user->all();
        break;  
    case (!empty($validate->{'ds_search_atualizacao'})):
        $user->createSelect($query_user . " WHERE u.dt_update LIKE '%{$validate->{'ds_search_atualizacao'}}%';");
        $users = $user->all();
        break;               
    case (!empty($validate->{'ds_search_status'})):
        $user->createSelect($query_user . " WHERE ds_status LIKE '{$validate->{'ds_search_status'}}';");
        $users = $user->all();
        break;
    default:
        $user->createSelect($query_user . " ORDER BY u.id_matricula;");
        $users = $user->all();
        break;
}

$layout->add('layout_content');

$content = new Layout;

$code = Uri::make(Uri::load());

$code[2] == 'search' ? $content->add('user_search') : $content->add('user_search_edit');
