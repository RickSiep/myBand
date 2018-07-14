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

function edit_action($article_id){
    global $smarty;
    $smarty->assign('smarty',$smarty);

    $smarty->display('header.tpl');
    $edit = edit($article_id);

    $smarty->assign('edit',$edit);

    $smarty->display('edit.tpl');
    $smarty->assign('article_id',$article_id);
    $smarty->display('CMSfooter.tpl');




}
function delete_action($article_id){
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('delete.tpl');
    $delete = delete($article_id);
    $smarty->assign('smarty',$smarty);
    $smarty->display('CMSfooter.tpl');
}
function add_action(){
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('add.tpl');
    $smarty->assign('smarty',$smarty);
    $smarty->display('CMSfooter.tpl');
}
function toevoegen_action(){
    global $smarty;
//    $event_toevoegen = event_toevoegen();
//    $smarty->assign('event_toevoegen',$event_toevoegen);

    $toevoegen = toevoegen();
    $smarty->assign('toevoegen',$toevoegen);

    $smarty->display('header.tpl');
    $smarty->display('artikel_toevoegen.tpl');

    $smarty->assign('smarty',$smarty);
    $smarty->display('CMSfooter.tpl');
}
function event_toevoegen_action(){
    global $smarty;
        $event_toevoegen = event_toevoegen();
        $smarty->assign('event_toevoegen',$event_toevoegen);
}
function verwerkedit_action(){
    global $smarty;

    $smarty->display('header.tpl');
    $verwerkedit = verwerkedit();
    $smarty->assign('verwerkedit',$verwerkedit);
    $smarty->display('verwerkedit.tpl');

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
    global $id;

    $articles = get_some_articles();
    $smarty->assign('articles',$articles);

    $events = get_some_articles_events();
    $smarty->assign('events',$events);

    $smarty->display('CMSheader.tpl');
    $smarty->display('CMSpage.tpl');



    $smarty->display('CMSfooter.tpl');

    $smarty->assign('id',$id);
}
function events_action(){
    global $smarty;
    global $pageno;
    global $searchterm;
    // model
    $events = get_some_articles_events();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page',$pageno);
    $smarty->assign('number_of_pages',$number_of_pages);
    $smarty->assign('events',$events);

    $smarty->display('header.tpl');
    $smarty->display('events.tpl');

    $smarty->assign('smarty',$smarty);
    $smarty->display('footer.tpl');
}