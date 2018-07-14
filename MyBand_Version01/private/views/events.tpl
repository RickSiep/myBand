<h1 id="home">Tour</h1>
<div class="wrapper">
    <a href="index.php?page=contact" class="links contact_link"><i class="fas fa-phone"></i>Contact</a>
    <a href="index.php?page=login" class="links home_link"><i class="fas fa-user"></i>Login</a>
    <a href="index.php?page=home" class="links home_link"><i class="fas fa-home"></i>Home</a>
</div>


<table class="events_table">
    {foreach from=$events item=event}
        <tr>
            <td>{$event[4]}</td><td>{$event[5]}</td><td>{$event[2]}</td><td>{$event[3]}</td><td>{$event[1]}</td><td>{$event[0]}</td>
        </tr>
    {/foreach}
</table>


