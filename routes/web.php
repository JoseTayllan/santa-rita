<?php
return [
    '/' => 'HomeController@index',
    '/noticias' => 'NoticiaController@index',
    '/avisos' => 'AvisoController@index',
    '/eventos' => 'EventoPublicController@index',

    // Auth
    '/login' => 'AuthController@login',
    '/autenticar' => 'AuthController@autenticar',
    '/logout' => 'AuthController@logout',
    '/cadastro' => 'CadastroController@form',
    '/cadastro/store' => 'CadastroController@store',

    // Painéis
    '/dashboard' => 'DashboardController@index',
    '/devdashboard' => 'DevDashboardController@index',

    // Admin Eventos
    '/eventos/create' => 'EventoController@create',
    '/eventos/store' => 'EventoController@store',
    '/eventos/edit' => 'EventoController@edit',
    '/eventos/update' => 'EventoController@update',
    '/eventos/delete' => 'EventoController@delete',

    // Admin Avisos
    '/avisos/create' => 'AvisoController@create',
    '/avisos/store' => 'AvisoController@store',
    '/avisos/edit' => 'AvisoController@edit',
    '/avisos/update' => 'AvisoController@update',
    '/avisos/delete' => 'AvisoController@delete',

    // 🔒 Somente DevAdmin
    '/usuarios' => 'UsuarioController@index',
    '/usuarios/create' => 'UsuarioController@create',
    '/usuarios/store' => 'UsuarioController@store',
    '/usuarios/edit' => 'UsuarioController@edit',
    '/usuarios/update' => 'UsuarioController@update',
    '/usuarios/delete' => 'UsuarioController@delete',
];
