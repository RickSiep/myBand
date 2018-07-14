<?php

session_start();
require ('../private/smarty/Smarty.class.php');
require ('../private/model.php');
require ('../private/controller.php');


$smarty = new Smarty();
$smarty->setCompileDir('../private/tmp');
$smarty->setTemplateDir('../private/views');

define('ARTICLES_PER_PAGE',5);


// TERNARY Operator
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : '1';
$searchterm = isset($_GET['searchterm']) ? '%' . $_GET['searchterm'] . '%' : '%';
$article_id = isset($_GET['article_id']) ? $_GET['article_id'] : null;
$title = isset($_GET['title']) ? $_GET['title'] : null;
$content = isset($_GET['content']) ? $_GET['content'] : null;
$bannerlink = isset($_GET['bannerlink']) ? $_GET['bannerlink'] : null;
$imagelink = isset($_GET['imagelink']) ? $_GET['imagelink'] : null;

if (isset($_POST['submit_login'])){
    verify_login_action();
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'loggedin'){
    switch ($page){
        case 'logout': logout_action();
        case 'edit': edit_action($article_id); break;
        case 'verwerkedit': verwerkedit_action(); break;
        case 'beheren': beheren_action(); break;
        case 'delete': delete_action($article_id); break;
        case 'add': add_action(); break;
        case 'artikel_toevoegen': toevoegen_action(); break;
        case 'event_toevoegen': event_toevoegen_action(); break;

        default: CMSpage_action(); break;
    }
    exit();
}

    switch ($page) {
        case 'home':
            homepage_action();
            break;
        case 'news':
            news_action();
            break;
        case 'contact':
            contact_action();
            break;
        case 'vullen':
            vullen_action();
            break;
        case 'login':
            login_action();
            break;
        case 'events':
            events_action();
            break;


        default:
            page_not_found_action();
            break;
    }

