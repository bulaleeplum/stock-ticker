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
     <div class="row blue-grey-text" id="login-header">
       <h4>Login</h4>
      </div>
      <form method="POST" action="/login" role="login">
      <div class="form-group login-input">

            <div class="modal-row margin">
              <div class="input-field col s6">
                <i class="mdi-social-person-outline prefix"></i>
                <input name="playername" type="text">
                <label for="playername" class="center-align">Username</label>
              </div>
            </div>
            <div class="modal-row margin">
              <div class="input-field col s6">
                <i class="mdi-action-lock-outline prefix"></i>
                <input id="password" type="password">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="modal-row">
              <div class="input-field col s6 m6 l6  login-text">
                  <input type="checkbox" id="remember-me" />
                  <label for="remember-me">Remember me</label>
              </div>
            </div>
            <div class="modal-row">
              <div class="input-field center col s12">
                <input type="submit" value="Login" class="waves-effect waves-light btn">
              </div>
            </div>
        </div>
      </form>
    </div>
</div>