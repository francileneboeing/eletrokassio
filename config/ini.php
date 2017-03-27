<?php
	//DEFINE BANCO DE DADOS
	define(HOST,'localhost');
	define(USER,'root');
	define(PASS,'');
	define(NAMEBD,'eletrokassio');

	//DEFINE BASE SITE
	define(BASE, 				  'http://localhost/eletrokassio');
	define(TITULO, 				  'Eletro Kassio');

	define(ADMIN,                 'http://localhost/eletrokassio/admin');
    define(CADASTRAR,             'http://localhost/eletrokassio/admin/cadastrar');    
    define(LISTAR,                'http://localhost/eletrokassio/admin/listar');
    define(BD,                    'http://localhost/eletrokassio/admin/bd');
    define(DAO,                   'http://localhost/eletrokassio/admin/dao');
    define(CONNECTION,            'http://localhost/eletrokassio/admin/connection');
    define(FOTOS_MARCA,           $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/marca');
    define(FOTOS_MARCA_ABSOLUTO, 'http://localhost/eletrokassio/admin/upload/marca');
    define(FOTOS_BANNER,           $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/banner');
    define(FOTOS_BANNER_ABSOLUTO, 'http://localhost/eletrokassio/admin/upload/banner');
    define(FOTOS_PRODUTO,         $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/produto');
?>