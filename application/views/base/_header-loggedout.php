<ul class="right hide-on-med-and-down">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a class="modal-trigger" href="#modal1">Login</a></li>
</ul>
<ul id="nav-mobile" class="side-nav">
    <li><a href="/stock-history">Stock History</a></li>
    <li><a class="modal-trigger" href="#modal1">Login</a></li>
</ul>
<!-- Modal Structure For Login -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row blue-grey-text">
        <h4>Login</h4>
            <form method="POST" action="/login" role="login">
                <div class="form-group login-input">
                    <select name="playername" class="form-control">
                        <option value="" disabled selected>Choose Your Player</option>
                        {playerList}
                        <option value="{Player}">{Player}</option>
                        {/playerList}
                    </select>
                </div>
                <br><br><br><br>
                <input type="submit" value="Login" class="waves-effect waves-light btn">
            </form>
        </div>
    </div>
    <div class="modal-footer">
    </div>
</div>