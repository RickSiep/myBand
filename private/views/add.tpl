<h1 id="home">Add</h1>
<div class="wrapper">
    <a href="index.php?page=CMSpage" class="links home"><i class="fas fa-home">Beheren</i></a>

</div>
{*index.php?page=edit&article_id=' . $id . '&title=' . $title . '&content=' . $content . '&imagelink=' . $imagelink . '">Edit</a>';*}
<form action="index.php?page=toevoegen" method="post">
    <label>Title:
        <input type="text" name="title" /></label><br>
    <label>content:
        <input type="text" name="content" /></label><br>
    <label>imagelink:
        <input type="text" name="imagelink" /></label><br>
    <input type="submit" name="submit" value="VOEG TOE!" />
</form>
