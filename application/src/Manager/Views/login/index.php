
<h1>Login:</h1>
<form action="<?php echo Manager\Libs\Manager::app()->baseUrl(); ?>/login/authenticate" method="post">
    User: <input type="text" name="username" placeholder="Type username" value="" /><br />
    Pass: <input type="password" name="userpass" placeholder="Type password" value="" /><br />
    <input type="submit" value="Login">
</form>

