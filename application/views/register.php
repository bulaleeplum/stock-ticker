<div class="row blue-grey-text" id="login-header">
   <h4>Register</h4>
</div>
<div class="row teal-text accent-1">
    <p>Please enter your account details below.</p>
    <?php
    if (isset ($errorMsg)) {
    <p>{errorMsg}</p>
    <?php
    }
    >?
</div>
<div>
    <form method ="POST" action="/register" enctype="multipart/form-data">
        <div class="form-group login-input">
            <div class="row margin">
                <div class="input-field col s6">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input name="playername" id="playername" type="text">
                    <label for="playername" class="center-align">Username</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s6">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input name="password" id="password" type="password">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s6">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input name="passwordConfirm" id="passwordConfirm" type="password">
                    <label for="passwordConfirm">Confirm password</label>
                </div>
            </div>
            <div class="row center-align" style="display: inline-block;">
                <form action="#">
                    <div class="file-field input-field col s6">
                      <div class="btn">
                        <span>File</span>
                        <input name="avatarUpload" id="avatarUpload" type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                </form>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light center" type="submit" name="action">Register
                </button>
            </div>
        </div>
    </form>
</div>
