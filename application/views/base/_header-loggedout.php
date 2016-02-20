<ul class="right hide-on-med-and-down">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a href="/player-portfolio">Player Portfolio</a></li>
    <li><a class="modal-trigger" href="#modal1">Login</a></li>
</ul>
<ul id="nav-mobile" class="side-nav">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a href="/player-portfolio">Player Portfolio</a></li>
    <li><a class="modal-trigger" href="#modal1">Login</a></li>
</ul>
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Login</h4>
        <div class="row">
            <form method="POST" action="/login" class="navbar-form navbar-right" role="login">
                <div class="form-group login-input">
                    <select name="playername" class="form-control pull-right">
                        {playerList}
                        <option value="{Player}">{Player}</option>
                        {/playerList}
                    </select>
                </div>
                <input type="submit" value="Login" class="btn btn-default col-xs-2 col-sm-5 col-md-5 pull-right">
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>