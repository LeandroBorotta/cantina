<?php

/**
 * This file contains all the routes for the project
 */

use Pecee\SimpleRouter\SimpleRouter;



\Pecee\SimpleRouter\SimpleRouter::setDefaultNamespace('Demo\\Controllers');


    SimpleRouter::get('/exercíciosIndividuais/cantina/public/', 'DefaultController@home')->name('home');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/login', 'LoginController@login')->name('login');
    SimpleRouter::post('/exercíciosIndividuais/cantina/public/login', 'LoginController@loginAction')->name('login');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/cadastro', 'LoginController@cadastro')->name('cadastro');
    SimpleRouter::post('/exercíciosIndividuais/cantina/public/cadastro', 'LoginController@cadastroAction')->name('cadastro');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/sair', 'DefaultController@sair')->name('sair');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/pagamento', 'PagamentoController@pagamento')->name('pagamento');
    SimpleRouter::post('/exercíciosIndividuais/cantina/public/pagamento', 'PagamentoController@pagamento')->name('pagamento');

    SimpleRouter::post('/exercíciosIndividuais/cantina/public/pagamentoFinal', 'PagamentoController@pagamentoFinal')->name('pagamento');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/config/{id}', 'ConfigController@user')->name('config');
    SimpleRouter::post('/exercíciosIndividuais/cantina/public/config/{id}', 'ConfigController@userAction')->name('config');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/meusPedidos/{id}', 'PedidosController@index')->name('config');

    SimpleRouter::get('/exercíciosIndividuais/cantina/public/adm', 'AdmController@adm')->name('adm');
    SimpleRouter::get('/exercíciosIndividuais/cantina/public/adm/pedidos', 'AdmController@pedidos')->name('adm');
    SimpleRouter::get('/exercíciosIndividuais/cantina/public/adm/pedidos/apagar/{id}', 'AdmController@finalizarPedido')->name('adm');

    SimpleRouter::post('/exercíciosIndividuais/cantina/public/adm/estoque', 'AdmController@estoque')->name('adm');
    
    SimpleRouter::basic('/exercíciosIndividuais/cantina/public/companies/{id?}', 'DefaultController@companies')->name('companies');
