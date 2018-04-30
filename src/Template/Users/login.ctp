<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">FB</h1>
            </div>
            <h3>Welcome to Facebook</h3>
            <?= $this->Form->create(null,['class' => 'm-t'])?>
                <div class="form-group">
                    <?= $this->Form->control('email',['type' => 'email', 'class' => ['form-control','label' => false, 'placeholder'=>"Username", 'required' => true]]); ?>    
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password',['type' => 'password', 'class' => ['form-control','label' => false, 'placeholder'=>"Password", 'required' => true]]); ?>
                </div>
                <?= $this->Form->button('Login',['type' => 'submit', 'class' => ['btn btn-primary block full-width m-b']]); ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="form-group">

             <?php echo $this->Html->link('Register', ['controller' => 'Users', 'action' => 'register'],array( 'class' => 'btn btn-primary block full-width m-b'))?>

    </div>

</body>

</html>
<style type="text/css">
.gray-bg {
   background-image: url("http://localhost/facetube/img/123.png");
}
</style>
