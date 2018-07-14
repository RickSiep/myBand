<h1 id="home">Edit</h1>
<div class="wrapper">
    <a href="index.php?page=CMSpage" class="links home_link"><i class="fas fa-home">Beheren</i></a>



</div>
<div class="dropdown">
    <button class="dropbtn">Banner templates</button>
    <div class="dropdown-content">
        <button type="button" name="button1" value="https://i.redd.it/ttygwklnq57y.png" id="button1"></button>
        <button type="button" name="button1" value="https://i.redd.it/ttygwklnq57y.png" id="button2"></button>
        {*<img src="https://i.redd.it/ttygwklnq57y.png" alt="dropdown image" class="dropdown_image">*}
        {*<img src="https://static1.squarespace.com/static/5710064860b5e95e742fa5f2/t/5b36b18388251bb98f8ce199/1516311179950/EDEN_Vertigo-(iameden-web-banner).jpg" alt="dropdown image" class="dropdown_image">*}
    </div>
</div>

    <form method="post" action="index.php?page=verwerkedit&article_id={$edit[0]}&title={$edit[1]}&content={$edit[2]}&bannerlink={$edit[3]}&imagelink={$edit[4]}">
        <input type="hidden" name="article_id" value="{$edit[0]}">
        <p>Title</p><textarea rows="2" cols="20" name="title">{$edit[1]}</textarea>
        <br>
        <p>Content</p><textarea rows="4" cols="50" name="content">{$edit[2]}</textarea>
        <br>
        <p>Bannerlink</p><textarea rows="2" cols="20" id="text_banner" name="bannerlink">{$edit[3]}</textarea>
        <br>
        <p>Imagelink</p><textarea rows="2" cols="20" name="imagelink">{$edit[4]}</textarea>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>


{*//    echo '<form method="post" action="index.php?page=verwerkedit&article_id=' . $id . '&title=' . $title . '&content=' . $content . '&bannerlink=' . $bannerlink . '&imagelink=' . $imagelink . '">';*}
    {*//    echo  '<input type="hidden" name="id" value="' . $id . '">';*}
    {*//    echo '<label>Title:<input type="text" name="title" value="' . $title . '"</label><br>';*}
    {*//    echo '<label>Content: <input type="text" name="content" value="' . $content . '"</label><br>';*}
    {*//    echo '<label>Bannerlink: <input type="text" name="bannerlink" id="bannerlink_form" value="' . $bannerlink . '"</label><br>';*}
    {*//    echo '<label>Imagelink: <input type="text" name="imagelink" value="' . $imagelink . '"</label><br>';*}
    {*//    echo '<input type="submit" name="submit" value="go">';*}
    {*//    echo '</form>';*}