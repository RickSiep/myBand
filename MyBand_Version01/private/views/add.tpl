<h1 id="home">Add</h1>
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
<br>
<h2>Nieuws bericht toevoegen</h2>
<form action="index.php?page=artikel_toevoegen" method="post">
    <label>Title:
        <br>
        <input type="text" name="title" /></label><br>
    <p>Content</p>
    <textarea rows="4" cols="50" name="content"></textarea>
    <br>
    {*<label>content:*}
        {*<input type="text" name="content" /></label><br>*}
    <label>bannerlink:
        <br>
        <input type="text" id="text_banner" name="bannerlink" /></label><br>
    <label>imagelink:
        <br>
        <input type="text" name="imagelink" /></label><br>
    <input type="submit" name="submit" value="VOEG TOE!" />
</form>

<br>
<br>

<h2>Event toevoegen</h2>
<form action="index.php?page=event_toevoegen" method="post">
    <label>Title:
        <br>
        <input type="text" name="event_title" /></label><br>
    <label>content:
        <br>
        <input type="text" name="event_content" /></label><br>
    <label>Country:
        <br>
        <input type="text" name="event_country" /></label><br>
    <label>Month:
        <br>
        <input type="text" name="event_month" /></label><br>
    <label>Day:
        <br>
        <input type="text" name="event_day" /></label><br>
    <input type="submit" name="submit" value="VOEG TOE!" />
</form>