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

    $query =    "SELECT title, content, imagelink ";
    $query .=   "FROM articles ";
    $query .=   "WHERE title LIKE ? OR ";
    $query .=   "content LIKE ? ";
    $query .=   "ORDER BY article_id ";
    $query .=   "DESC LIMIT $firstrow,$per_page";

    $stmt = $mysqli->prepare($query) or die ('Error preparing 1.');
    $stmt->bind_param('ss', $searchterm, $searchterm) or die ('Error binding searchterm.');
    $stmt->bind_result($title,$content,$imagelink) or die ('Error binding results 1.');
    $stmt->execute() or die ('Error executing 1.');
    $results = array();
    while ($stmt->fetch()){
        $article = array();
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $results[] = $article;
    }
    return $results;
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

function beheren(){
    $mysqli = make_connection();
    $query = "SELECT * FROM articles";
    $result = mysqli_query($mysqli,$query) or die ('Error querying');
    echo '<table class="edit_table">';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Title</th>';
    echo '<th>Content</th>';
    echo '<th>Imagelink</th>';
    echo '<th>Delete</th>';
    echo '<th>Edit</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['article_id'];
        $title = $row['title'];
        $content = $row['content'];
        $imagelink = $row['imagelink'];

        $title_crop = substr($title,0,10);
        $content_crop = substr($content,0,10);
        $imagelink_crop = substr($imagelink,0,10);

        echo '<tr>';
        echo "<td>$id</td><td>$title_crop</td><td>$content_crop</td><td>$imagelink_crop</td>";
        echo '<td>';
        echo '<a href="index.php?page=delete&article_id=' . $id . '">Delete</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="index.php?page=edit&article_id=' . $id . '&title=' . $title . '&content=' . $content . '&imagelink=' . $imagelink . '">Edit</a>';
        echo '</tr>';
    }
    echo '</table>';
}
function edit($id,$title,$content,$imagelink){
    $mysqli = make_connection();
    $query = "SELECT * FROM articles WHERE id=".$id;
    echo '<form method="post" action="index.php?page=verwerkedit&article_id=' . $id . '&title=' . $title . '&content=' . $content . '&imagelink=' . $imagelink . '">';
    echo  '<input type="hidden" name="id" value="' . $id . '">';
    echo '<label>Title:<input type="text" name="title" value="' . $title . '"</label><br>';
    echo '<label>Content: <input type="text" name="content" value="' . $content . '"</label><br>';
    echo '<label>Imagelink: <input type="text" name="imagelink" value="' . $imagelink . '"</label><br>';
    echo '<input type="submit" name="submit" value="go">';
    echo '</form>';

}
function verwerkedit(){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagelink = $_POST['imagelink'];

    $mysqli = make_connection();
    $query = "UPDATE articles SET title = '$title', content = '$content', imagelink = '$imagelink' WHERE article_id = '$id'";
    $result = mysqli_query($mysqli,$query) or die ('Error updating fam');
    header("Location: index.php?page=CMSpage");
}
function delete($id){
    $mysqli = make_connection();
    $query = "DELETE FROM articles WHERE article_id=".$id;
    $result = mysqli_query($mysqli,$query) or die ('Error deleting');
    header("Location: index.php?page=CMSpage");
}

function toevoegen(){
    $mysqli = make_connection() or die ('WHEEE');
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagelink = $_POST['imagelink'];



    $query = "INSERT INTO articles VALUES (0,'$title','$content','$imagelink')" or die ('JE MOEDER');
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