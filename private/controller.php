<?php

// Data ophalen en een view in beeld

function homepage_action(){
    //MODEL
    global $smarty;
    global $pageno;
    global $searchterm;
    // model
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page',$pageno);
    $smarty->assign('number_of_pages',$number_of_pages);
    $smarty->assign('articles',$articles);
    // views
    $smarty->display('header.tpl');
    $smarty->display('home.tpl');

    $smarty->display('footer.tpl');
}

function page_not_found_action(){
    global $smarty;
    $smarty->display('notfound.tpl');
}
function contact_action(){
    global $smarty;
    // MODEL

    // VIEWS
    $smarty->display('header.tpl');
    $smarty->display('contact.tpl');
    $smarty->display('footer.tpl');
}

function vullen_action(){
    global $smarty;
    // Model

    //Views
    $smarty->display('header.tpl');
    $smarty->display('vullen.tpl');
    $smarty->display('footer.tpl');
}

function news_action() {
    global $smarty;
    global $pageno;
    global $searchterm;
    // model
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page',$pageno);
    $smarty->assign('number_of_pages',$number_of_pages);
    $smarty->assign('articles',$articles);
    // views
    $smarty->display('header.tpl');
    $smarty->display('news.tpl');

    $smarty->display('footer.tpl');
}

function login_action(){
    global $smarty;

    $smarty->display('header.tpl');
    $smarty->display('login.tpl');

    $smarty->display('footer.tpl');
}
function beheren_action(){
    global $smarty;


    $smarty->display('header.tpl');
    $smarty->display('beheren.tpl');
    $beheren = beheren();

    $smarty->assign('beheren',$beheren);
    $smarty->display('footer.tpl');
}
function edit_action($id,$title,$content,$imagelink){
    global $smarty;
    global $id;
    global $title;
    global $content;
    global $imagelink;

    $smarty->display('header.tpl');
    $smarty->display('edit.tpl');
    $edit = edit($id,$title,$content,$imagelink);
    $smarty->assign('edit',$edit);
    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}
function delete_action($id){
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('delete.tpl');
    $delete = delete($id);
    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}
function add_action(){
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('add.tpl');
    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}
function toevoegen_action(){
    global $smarty;

    $smarty->display('header.tpl');
    $smarty->display('toevoegen.tpl');
    $toevoegen = toevoegen();
    $smarty->assign('toevoegen',$toevoegen);
    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}
function verwerkedit_action(){
    global $smarty;

    $smarty->display('header.tpl');
    $smarty->display('verwerkedit.tpl');
    $verwerkedit = verwerkedit();
    $smarty->assign('verwerkedit',$verwerkedit);
    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}
function verify_login_action(){
    verify_login();
}
function logout_action(){
    execute_logout();
}
function CMSpage_action(){
    global $smarty;

    $smarty->display('CMSheader.tpl');
    $smarty->display('CMSpage.tpl');
    $beheren = beheren();
    $smarty->assign('beheren',$beheren);
    $smarty->display('footer.tpl');
}