<?php
get_header();
?>
<div id="login">
    <h2>Login</h2>
    <form action="<?php echo site_url('wp-login.php'); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="user_login" name="log" value="<?php echo esc_attr($user_login); ?>">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="user_pass" name="pwd" value="<?php echo esc_attr($user_pass); ?>">
        <br>
        <input type="submit" name="wp-submit" value="<?php _e('Log in'); ?>">
    </form>
</div>
<?php
get_footer();
?>