<html>
<head>
  <title>Login</title>
</head>
<body>

  <p><?php echo $this->session->flashdata('message') ?></p>
  <p><?php echo validation_errors(); ?></p>
  
  <?php echo form_open('login/auth') ?>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" name="login" value="Login">
  <?php echo form_close(); ?>

</body>
</html>





