<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/account' => [[['_route' => 'account_index', '_controller' => 'App\\Controller\\AccountController::index'], null, ['GET' => 0], null, true, false, null]],
        '/account/new' => [[['_route' => 'account_new', '_controller' => 'App\\Controller\\AccountController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/carte/bancaire' => [[['_route' => 'carte_bancaire_index', '_controller' => 'App\\Controller\\CarteBancaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/carte/bancaire/new' => [[['_route' => 'carte_bancaire_new', '_controller' => 'App\\Controller\\CarteBancaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/category' => [[['_route' => 'category_index', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/category/new' => [[['_route' => 'category_new', '_controller' => 'App\\Controller\\CategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/diagrama' => [[['_route' => 'diagrama_index', '_controller' => 'App\\Controller\\HomeController::diagrama'], null, null, null, false, false, null]],
        '/person' => [[['_route' => 'person_index', '_controller' => 'App\\Controller\\PersonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/person/new' => [[['_route' => 'person_new', '_controller' => 'App\\Controller\\PersonController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/transaction/new' => [[['_route' => 'transaction_new', '_controller' => 'App\\Controller\\TransactionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/account/(?'
                    .'|([^/]++)(?'
                        .'|(*:192)'
                        .'|/edit(*:205)'
                        .'|(*:213)'
                    .')'
                    .'|addTransaction/([^/]++)(*:245)'
                .')'
                .'|/ca(?'
                    .'|rte/bancaire/([^/]++)(?'
                        .'|(*:284)'
                        .'|/edit(*:297)'
                        .'|(*:305)'
                    .')'
                    .'|tegory/([^/]++)(?'
                        .'|(*:332)'
                        .'|/edit(*:345)'
                        .'|(*:353)'
                    .')'
                .')'
                .'|/([^/]++)/stat(*:377)'
                .'|/person/(?'
                    .'|add/([^/]++)(*:408)'
                    .'|([^/]++)(*:424)'
                    .'|beneficiaire/([^/]++)(*:453)'
                    .'|([^/]++)(?'
                        .'|/edit(*:477)'
                        .'|(*:485)'
                    .')'
                .')'
                .'|/transaction/(?'
                    .'|indextransaction/([^/]++)(*:536)'
                    .'|([^/]++)(?'
                        .'|(*:555)'
                        .'|/edit(*:568)'
                        .'|(*:576)'
                    .')'
                .')'
                .'|/([^/]++)/([^/]++)/([^/]++)(*:613)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        192 => [[['_route' => 'account_show', '_controller' => 'App\\Controller\\AccountController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        205 => [[['_route' => 'account_edit', '_controller' => 'App\\Controller\\AccountController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        213 => [[['_route' => 'account_delete', '_controller' => 'App\\Controller\\AccountController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        245 => [[['_route' => 'new_transaction', '_controller' => 'App\\Controller\\AccountController::addTransaction'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        284 => [[['_route' => 'carte_bancaire_show', '_controller' => 'App\\Controller\\CarteBancaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        297 => [[['_route' => 'carte_bancaire_edit', '_controller' => 'App\\Controller\\CarteBancaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        305 => [[['_route' => 'carte_bancaire_delete', '_controller' => 'App\\Controller\\CarteBancaireController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        332 => [[['_route' => 'category_show', '_controller' => 'App\\Controller\\CategoryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        345 => [[['_route' => 'category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        353 => [[['_route' => 'category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        377 => [[['_route' => 'account_stat', '_controller' => 'App\\Controller\\HomeController::stat'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        408 => [[['_route' => 'beneficiaire_new', '_controller' => 'App\\Controller\\PersonController::addBeneficier'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        424 => [[['_route' => 'person_show', '_controller' => 'App\\Controller\\PersonController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        453 => [[['_route' => 'beneficiaire_show', '_controller' => 'App\\Controller\\PersonController::showBeneficiaire'], ['id'], ['GET' => 0], null, false, true, null]],
        477 => [[['_route' => 'person_edit', '_controller' => 'App\\Controller\\PersonController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        485 => [[['_route' => 'person_delete', '_controller' => 'App\\Controller\\PersonController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        536 => [[['_route' => 'transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], ['id'], ['GET' => 0], null, false, true, null]],
        555 => [[['_route' => 'transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        568 => [[['_route' => 'transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        576 => [[['_route' => 'transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        613 => [
            [['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], ['name', 'age', 'preference'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
