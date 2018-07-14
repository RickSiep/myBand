<h1 id="home">CMS</h1>
<div class="wrapper">
    <a href="index.php?page=add" class="links news_link"><i class="fas fa-plus-square">Add</i></a>
    <a href="index.php?page=logout" class="links logout_link"><i class="fas fa-sign-out-alt">Logout</i></a>

</div>


{*<tr>*}
{*<td>{$id}</td><td>{$title_crop}</td><td>{$content_crop}</td><td>{$bannerlink_crop}</td><td>{$imagelink_crop}</td>*}
{*<td>*}
    {*<p>ree</p>*}
{*</td>*}
{*<td>*}
{*</tr>*}
<table class="edit_table">
 <tr>
 <th>Id</th>
<th>Title</th>
<th>Content</th>
<th>Bannerlink</th>
<th>Imagelink</th>
 <th>Delete</th>
<th>Edit</th>
</tr>
{foreach from=$articles item=article}
        <tr>
            <td>{$article[0]}</td><td>{$article[1]}</td><td>{$article[2]}</td><td>{$article[3]}</td><td>{$article[4]}</td>
            <td>
                <a href="index.php?page=delete&article_id={$article[0]}">Delete</a>
            </td>
            <td>
                <a href="index.php?page=edit&article_id={$article[0]}{*&title={$article[1]}&content={$article[2]}&bannerlink={$article[3]}&imagelink={$article[4]}*}">Edit</a>
        </tr>
    {/foreach}

    </table>
<br>
<table class="events_table">
    {foreach from=$events item=event}
        <tr>
            <td>{$event[0]}</td><td>{$event[1]}</td><td>{$event[2]}</td><td>{$event[3]}</td><td>{$event[4]}</td><td>{$event[5]}</td>
        </tr>
    {/foreach}
</table>
{*{foreach from=$articles item=article}*}

    {*<div class="content">*}
        {*<img src="{$article[2]}" alt="banner" class="banner_image">*}
        {*<div class="under_banner">*}
            {*<h2>{$article[0]}</h2>*}
            {*<p>{$article[1]}</p>*}
        {*</div>*}
        {*<img src="{$article[3]}" alt="ree" class="artikel_image hover_blur">*}
    {*</div>*}
{*{/foreach}*}