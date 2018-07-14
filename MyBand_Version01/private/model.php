<?php

function make_connection() {
    $mysqli = new mysqli('localhost','root','','24585_db');
    if ($mysqli->connect_errno){
        die('connection error: ' . $mysqli->connect_errno . '<br>');
    }
    return $mysqli;
}

function get_articles() {
    $mysqli = make_connection();
    $query = "SELECT title FROM articles";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_result($title) or die ('Error binding results 1.');
    $stmt->execute() or die ('Error executing 1.');
    $results = array();
    while ($result = $stmt->fetch()){
        $results[] = $title;
    }
    return $results;
}

function get_some_articles(){
    global $pageno, $searchterm;
    $mysqli = make_connection();
    $firstrow = ($pageno - 1) * ARTICLES_PER_PAGE;
    $per_page = ARTICLES_PER_PAGE;

    $query =    "SELECT article_id,title, content, bannerlink, imagelink ";
    $query .=   "FROM articles ";
    $query .=   "WHERE title LIKE ? OR ";
    $query .=   "content LIKE ? ";
    $query .=   "ORDER BY article_id ";
    $query .=   "DESC LIMIT $firstrow,$per_page";

    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_param('ss', $searchterm, $searchterm) or die ('Error binding searchterm.');
    $stmt->bind_result($article_id,$title,$content,$bannerlink,$imagelink) or die ('Error binding results 1.');
    $stmt->execute() or die ('Error executing 1.');

    $results = array();
    while ($stmt->fetch()){
        $article = array();
        $article[] = $article_id;
        $article[] = substr($title,0,7);
        $article[] = substr($content,0,7);
        $article[] = substr($bannerlink,0,7);
        $article[] = substr($imagelink,0,7);
        $results[] = $article;
    }
    return $results;
}

function get_some_articles_events(){
    global $pageno, $searchterm;
    $mysqli = make_connection();
    $firstrow = ($pageno - 1) * ARTICLES_PER_PAGE;
    $per_page = ARTICLES_PER_PAGE;

    $query =    "SELECT event_id,event_title, event_content, event_country, event_month, event_day ";
    $query .=   "FROM events ";
    $query .=   "WHERE event_title LIKE ? OR ";
    $query .=   "event_content LIKE ? ";
    $query .=   "ORDER BY event_id ";
    $query .=   "DESC LIMIT $firstrow,$per_page";

    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_param('ss', $searchterm, $searchterm) or die ('Error binding searchterm.');
    $stmt->bind_result($event_id,$event_title,$event_content,$event_country,$event_month,$event_day) or die ('Error binding results 1.');
    $stmt->execute() or die ('Error executing 1.');
    $results_event = array();
    while ($stmt->fetch()){
        $event = array();
        $event[] = $event_id;
        $event[] = $event_title;
        $event[] = $event_content;
        $event[] = $event_country;
        $event[] = $event_month;
        $event[] = $event_day;
        $results_event[] = $event;
    }
    return $results_event;
}

function calculate_pages(){
    global $pageno, $searchterm;
    $mysqli = make_connection();
    $query = "SELECT * FROM articles";
    $result = $mysqli->query($query) or die ('Error querying.');
    $rows = $result->num_rows;
    $number_of_pages = ceil($rows / ARTICLES_PER_PAGE);
    return $number_of_pages;
}

function get_number_of_pages(){
    $number_of_pages = calculate_pages() or die ('error calculating.');
    return $number_of_pages;
}

function edit($article_id){

    $mysqli = make_connection();
    $stmt = $mysqli->prepare("SELECT title, content, bannerlink, imagelink FROM articles WHERE article_id = ?") or die("stmt fuckt");
    $stmt->bind_param('i', $article_id) or die ('Error binding searchterm.');
    $stmt->execute() or die('Error execute');
    $stmt->bind_result($title,$content,$bannerlink,$imagelink) or die ('Bind result yeet');
    $stmt->store_result() or die ("geen store");
    $stmt->fetch();
        $data[] = $article_id;
        $data[] = $title;
        $data[] = $content;
        $data[] = $bannerlink;
        $data[] = $imagelink;

   return $data;



}
function verwerkedit(){
    $article_id = $_POST['article_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $bannerlink = $_POST['bannerlink'];
    $imagelink = $_POST['imagelink'];

    $mysqli = make_connection();
    $query = "UPDATE articles SET title = '$title', content = '$content', bannerlink = '$bannerlink', imagelink = '$imagelink' WHERE article_id = '$article_id'";
    $result = mysqli_query($mysqli,$query) or die ('Error updating fam');
    header("Location: index.php?page=CMSpage");
}
function delete($article_id){
    $mysqli = make_connection();
    $query = "DELETE FROM articles WHERE article_id=".$article_id;
    $result = mysqli_query($mysqli,$query) or die ('Error deleting');
    header("Location: index.php?page=CMSpage");
}

function toevoegen(){
    $mysqli = make_connection() or die ('WHEEE');
    $title = $_POST['title'];
    $content = $_POST['content'];
    $bannerlink = $_POST['bannerlink'];
    $imagelink = $_POST['imagelink'];



    $query = "INSERT INTO articles VALUES (0,'$title','$content','$bannerlink', '$imagelink')" or die ('Eerste fout toevoegen');
 $result = mysqli_query($mysqli, $query) or die ('De query is mislukt.');
    $mysqli_closed = mysqli_close($mysqli);
  header("Location: index.php?page=CMSpage");

}
function event_toevoegen(){
    $mysqli = make_connection() or die ('WHEEE2');
    $title = $_POST['event_title'];
    $content = $_POST['event_content'];
    $country = $_POST['event_country'];
    $month = $_POST['event_month'];
    $day = $_POST['event_day'];

    $query = "INSERT INTO events VALUES (0,'$title','$content','$country', '$month', '$day')" or die ('Eerste fout toevoegen');
    $result = mysqli_query($mysqli, $query) or die ('De query is mislukt.');
    $mysqli_closed = mysqli_close($mysqli);
    header("Location: index.php?page=CMSpage");
}

function verify_login(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'admin'){
        $_SESSION['loggedin'] = 'loggedin';
    }
}
function execute_logout(){
    $_SESSION = array();
    header("Location: index.php?page=home");
}

function events(){

}