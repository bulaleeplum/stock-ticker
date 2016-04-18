<ul class="right hide-on-med-and-down">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a href="/player-portfolio/{username}">{username}'s Portfolio</a></li>
    <?php
    if ($this->session->userdata('role') == 'admin') { ?>
    <li><a href="/administration">Admin</a></li>
    <?php } ?>
    <li><a href="/logout">Logout</a></li>
</ul>
<ul id="nav-mobile" class="side-nav">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a href="/player-portfolio/{username}">{username}'s Portfolio</a></li>
    <?php
    if ($this->session->userdata('role') == 'admin') { ?>
    <li><a href="/administration">Admin</a></li>
    <?php } ?>
    <li><a href="/logout">Logout</a></li>
</ul>
