<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">FB</h1>

            </div>
            <h3>Welcome to FaceBOOK</h3>
            <p>Create account to see it in action.</p>
           <?= $this->Form->create(null,['class' => 'm-t','enctype' => 'multipart/form-data'])?>
           <div class="form-group">
                    <?= $this->Form->control('name',['type' => 'Username', 'class' => ['form-control','label' => false, 'placeholder'=>"Username", 'required' => true]]); ?>    
                </div>
                <div class="form-group">
                    <?= $this->Form->control('email',['type' => 'email', 'class' => ['form-control','label' => false, 'placeholder'=>"Username", 'required' => true]]); ?>    
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password',['type' => 'password', 'class' => ['form-control','label' => false, 'placeholder'=>"Password", 'required' => true]]); ?>
                </div>
                <div class="form-group">
                    <?php //echo $this->Form->control('upload', array('type' => 'file')); ?>
                    <input type="file" name="photo"/>

                </div>
                <div 
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <!-- <p class="text-muted text-center"><small>Already have an account?</small></p> -->
                <!-- <a class="btn btn-sm btn-white btn-block" href="login.html">Login</a> -->
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
