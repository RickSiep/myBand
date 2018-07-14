<h1 id="home">HOME</h1>
<div class="wrapper">
    <a href="index.php?page=contact" class="links contact_link"><i class="fas fa-phone"></i>Contact</a>
    <a href="index.php?page=login" class="links home_link"><i class="fas fa-user"></i>Login</a>
    <a href="index.php?page=events" class="links events_link"><i class="fas fa-calendar-alt"></i>Tour</a>
    <form method="get" id="zoek" action="index.php">
        <input type="hidden" name="page" value="news">
        <input name="searchterm"/>
        <input type="submit" name="submit" value="zoek"/>
    </form>

</div>
</div>


<p>
    {foreach from=$articles item=article}

    <div class="content">
        <img src="{$article[3]}" alt="banner" class="banner_image artikel_image">
        <div class="under_banner">
        <h2>{$article[1]}</h2>
        <p>{$article[2]}</p>
        </div>
        {*<img src="{$article[3]}" alt="ree" class="artikel_image hover_blur">*}
    </div>
{/foreach}
</p>

<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01" src="#" alt="modal content">
    <div id="caption"></div>
</div>

<h3>Current Page: {$current_page}</h3>
{if $current_page gt 1}
    <a href="index.php?page=news&pageno={$current_page - 1}">Previous</a>
{/if}
{if $current_page lt $number_of_pages}
    <a href="index.php?page=news&pageno={$current_page + 1}">Next</a>
{/if}

<br>
