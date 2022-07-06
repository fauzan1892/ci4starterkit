<div class="login-box panel-rounded">
    <form class="login-form" method="POST" action="<?= base_url('login/auth');?>">
        <!-- <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" /> -->
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-circle mr-1"></i>SIGN IN</h3>
        <div class="form-group">
            <label class="control-label">USERNAME / E-MAIL</label>
            <input class="form-control" type="text" name="username" placeholder="Username / E-mail" autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <div class="utility">
                <div class="animated-checkbox">
                    <label>
                        <input type="checkbox"><span class="label-text">Stay Signed in</span>
                    </label>
                </div>
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
        </div>
        <div class="form-group btn-container">
            <button type="submit" 
                class="btn btn-primary btn-block">
                <i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN
            </button>
        </div>
    </form>
    <form class="forget-form" action="<?= base_url('login/reset');?>">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
            <p class="semibold-text mb-0">
                <a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to
                    Login
                </a>
            </p>
        </div>
    </form>
</div>