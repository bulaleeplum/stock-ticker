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
                <input name="playername" id="playername" type="text">
                <label for="playername" class="center-align">Username</label>
              </div>
            </div>
            <div class="modal-row margin">
              <div class="input-field col s6">
                <i class="mdi-action-lock-outline prefix"></i>
                <input name="password" id="password" type="password">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="modal-row center-align">
                <button class="btn waves-effect waves-light center" type="submit" name="action">Login
                </button>
            </div>
            </div>
            <div class="input-field col s6 m6 l6 div-register-now">
                <p class="margin medium-small"><a class="modal-trigger" href="#modal2">No account? Register now!</a></p>
            </div>
        </div>
      </form>
    </div>
</div>

<!-- Register modal -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <div class="row blue-grey-text" id="login-header">
           <h4>Register</h4>
        </div>
        <div class="modal-row teal-text accent-1">
            <p>Please enter your account details below.</p>
        </div>
        <div>
            <form method ="POST" action="/Register">
                <div class="form-group login-input">
                    <div class="modal-row margin">
                        <div class="input-field col s6">
                            <i class="mdi-social-person-outline prefix"></i>
                            <input name="playername" id="playername" type="text">
                            <label for="playername" class="center-align">Username</label>
                        </div>
                    </div>
                    <div class="modal-row margin">
                        <div class="input-field col s6">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input name="password" id="password" type="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="modal-row margin">
                        <div class="input-field col s6">
                            <i class="mdi-action-lock-outline prefix"></i>
                            <input name="passwordConfirm" id="passwordConfirm" type="password">
                            <label for="passwordConfirm">Confirm password</label>
                        </div>
                    </div>
                    <div class="modal-row center-align">
                        <form action="#">
                            <div class="file-field input-field center-align">
                                <button class="btn waves-effect waves-light center">Upload an avatar
                                <input type="file">
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-row center-align">
                        <button class="btn waves-effect waves-light center" type="submit" name="action">Register
                        </button>
                    </div>
                    <div class="modal-row">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
