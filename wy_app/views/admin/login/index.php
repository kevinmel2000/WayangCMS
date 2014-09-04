<?php $router = WY_Registry::get('router'); ?>
<div class="login-panel panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sign In</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('admin-login-process') ?>" enctype="multipart/form-data" >
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-primary btn-block">Login Now</button>
                <h5><a href="<?php echo $router->generate('admin-reset-password'); ?>" >Forgot Password ?</a></h5>
                <h5><a href="<?php echo $router->generate('home'); ?>" >Back to Website</a></h5>
            </fieldset>
        </form>
        <?php
        if(WY_Session::has_flash('error'))
        {
            ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo WY_Session::get_flash('error');?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
