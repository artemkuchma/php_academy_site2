<?php
$url_patterns = array(

    'edit_page' => array(
        'pattern_uk' => 'redaguvati/.*',
        'pattern_en' => 'edit/.*',
        'action' => 'edit',
        'elements_before_alias' => 1
    ),

    'edd_to_cart' => array(
        'pattern_uk' => 'koshik/dodatu/.*',
        'pattern_en' => 'cart/add/.*',
        'action' => 'addToCart',
        'elements_before_alias' => 2
    ),

    'show_cart' => array(
        'pattern_uk' => 'koshik/.*',
        'pattern_en' => 'cart/.*',
        'action' => 'showCart',
        'elements_before_alias' => 1
    ),

    'remove_from_cart' => array(
        'pattern_uk' => 'koshik/vudalutu/.*',
        'pattern_en' => 'cart/remove/.*',
        'action' => 'removeFromCart',
        'elements_before_alias' => 2
    ),

    'register' => array(
        'pattern_uk' => 'registrachiya',
        'pattern_en' => 'register',
        'controller' => 'Security',
        'action' => 'register',
        'elements_before_alias' => 1
    ),

    'login' => array(
        'pattern_uk' => 'uviiti',
        'pattern_en' => 'login',
        'controller' => 'Security',
        'action' => 'login',
        'elements_before_alias' => 1
    ),
    'logout' => array(
        'pattern_uk' => 'vuhid',
        'pattern_en' => 'logout',
        'controller' => 'Security',
        'action' => 'logout',
        'elements_before_alias' => 1
    ),
    'delete' => array(
        'pattern_uk' => 'admin/delete/.*',
        'pattern_en' => 'admin/delete/.*',
        'controller' => 'Admin',
        'action' => 'delete',
        'elements_before_alias' => 2
    ),
    'edit_basic_page' => array(
        'pattern_uk' => 'admin/edit_basic_page/.*',
        'pattern_en' => 'admin/edit_basic_page/.*',
        'controller' => 'Admin',
        'action' => 'editBasicPage',
        'elements_before_alias' => 2
    ),
    'edit_news' => array(
        'pattern_uk' => 'admin/edit_news/.*',
        'pattern_en' => 'admin/edit_news/.*',
        'controller' => 'Admin',
        'action' => 'editNews',
        'elements_before_alias' => 2
    ),
    'translate_basic_page' => array(
        'pattern_uk' => 'admin/translate_basic_page/.*',
        'pattern_en' => 'admin/translate_basic_page/.*',
        'controller' => 'Admin',
        'action' => 'translateBasicPage',
        'elements_before_alias' => 2
    ),
    'translate_news' => array(
        'pattern_uk' => 'admin/translate_news/.*',
        'pattern_en' => 'admin/translate_news/.*',
        'controller' => 'Admin',
        'action' => 'translateNews',
        'elements_before_alias' => 2
    ),
    'delete_message' => array(
        'pattern_uk' => 'admin/delete_message',
        'pattern_en' => 'admin/delete_message',
        'controller' => 'Admin',
        'action' => 'deleteMessage',
        'elements_before_alias' => 2
    ),


    /**
     * также можно добавлять сюда и контроллеры. Контроллеры и экшены прописанные в шаблонах перепишут
     * контроллеры и экшены из массивов с алиасами.
     */
    /**
    'error_log' => array(
    'pattern' => 'error_log',
    'action' => 'error',
    'elements_before_alias' => 1

    )
     **/
);
