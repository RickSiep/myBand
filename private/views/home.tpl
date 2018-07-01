<h1 id="home">HOME</h1>
<div class="wrapper">
    <a href="index.php?page=contact" class="links contact"><i class="fas fa-phone">Contact</i></a>
    <a href="index.php?page=login" class="links home"><i class="fas fa-user">Login</i></a>
    <a href="index.php?page=news" class="links news"><i class="fas fa-newspaper">News</i></a>

</div>
</div>


<p >
    {foreach from=$articles item=article}
    <div class="content">
        <h2>{$article[0]}</h2>
        <p>{$article[1]}</p>
        <img src="{$article[2]}" alt="artikel_image">
    </div>
{/foreach}
</p>

<h3>Current Page: {$current_page}</h3>
{if $current_page gt 1}
    <a href="index.php?page=news&pageno={$current_page - 1}">Previous</a>
{/if}
{if $current_page lt $number_of_pages}
    <a href="index.php?page=news&pageno={$current_page + 1}">Next</a>
{/if}

<br>
<form method="get" id="zoek" action="index.php">
    <input type="hidden" name="page" value="news">
    <input name="searchterm"/>
    <input type="submit" name="submit" value="zoek"/>
</form>