<?php

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
$id = isset($_GET['article_id']) ? $_GET['article_id'] : null;
$title = isset($_GET['title']) ? $_GET['title'] : null;
$content = isset($_GET['content']) ? $_GET['content'] : null;
$imagelink = isset($_GET['imagelink']) ? $_GET['imagelink'] : null;

switch ($page){
    case 'home': homepage_action(); break;
    case 'news': news_action(); break;
    case 'contact': contact_action(); break;
    case 'vullen': vullen_action(); break;
    case 'login': login_action(); break;
    case 'beheren': beheren_action(); break;
    case 'edit': edit_action($id,$title,$content,$imagelink); break;
    case 'delete': delete_action($id); break;
    case 'add': add_action(); break;
    default: page_not_found_action(); break;
}
