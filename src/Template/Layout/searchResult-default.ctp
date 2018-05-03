<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">  -->

  </title>


  <!-- Mainly scripts -->
  <!-- <script src=""></script> -->
  <?= $this->Html->script('inspinia.js'); ?>
  <?= $this->Html->script('jquery-2.1.1'); ?>
  <?= $this->Html->script('bootstrap.min.js'); ?>
  <?= $this->Html->script('plugins/metisMenu/jquery.metisMenu.js'); ?>
  <?= $this->Html->script('plugins/slimscroll/jquery.slimscroll.min.js'); ?>
  <!-- <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script> -->

  <!-- Custom and plugin javascript -->
  <?= $this->Html->script('plugins/pace/pace.min.js'); ?>
  <!-- <script src="js/plugins/pace/pace.min.js"></script> -->
  <!--Boostrap files  -->
  <!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet"> -->
  <?= $this->Html->css('animate.css'); ?>
  <?= $this->Html->css('style.css'); ?>
  <?= $this->Html->css('font-awesome.css'); ?>
  <?= $this->Html->css('bootstrap.min.css'); ?>
  <!-- <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet"> -->

</head>

<?= $this->Flash->render() ?>
<div class="container clearfix">
  <?=  $this->Html->css('style'); ?>
  <?=  $this->Html->css('animate'); ?>
  <?=  $this->Html->css('bootstrap.min'); ?>
  <?=  $this->Html->css('plugins/iCheck/custom'); ?>
  <?=  $this->Html->css('font-awesome/css/font-awesome'); ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
  <style>
  .fb {color: #aed6f1 ;}
  .test input {
      border: 0;
      background: transparent;
  }
  </style>
</head>
<body class="gray-bg">
  <div>
    <?= $this->Flash->render() ?>
    <div class="row">
      <div  style="margin:0 12px 0 12px;">
      <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <!-- <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a> -->

          <div>
            <div class="result" >
              <span class="test"><input type="text" placeholder="Search for something..." name="top-search" id="top"></span>

            </div>
          </div>

</div>
            <ul class="nav navbar-top-links navbar-right" style="display: inline-flex;">
                <li class="dropdown">

                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <span class="label label-warning"><?php echo sizeof($friendRequests) ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <?php foreach($friendRequests as $friendRequest):?>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src=<?php echo $friendRequest->sender->photo ?>>
                                </a>
                                <div class="media-body">

                                    <strong><?=$friendRequest->sender->name ?></strong><br>
                                    <button id="btn_id" onclick="friendR(<?php echo $friendRequest['id'] ?>, 1 )">Accept</button>
                                    <button onclick="friendR(<?php echo $friendRequest['id'] ?>, 0 )">Decline</button>

                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                    <?php endforeach;?>
                    </ul>
                </li>
                <li class="dropdown">
                  <div class="text-center link-block">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                  </div>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="text-center link-block">
                      <a href="notifications.html">
                        <strong>  <?php echo $this->Html->link('Logout','/Users/logout', array('class'=>'button'))?></strong>
                      </a>
                    </div>
                  </li>
                </ul>

          </nav>
        </div>
          <div style="margin:0 0 0 12px;">
            <h4 class="fb logo-namee"> <?php echo $this->Html->link('Facetube','/Users/index', array('class'=>'button'))?></h4>
          </div>
          <!-- top nav end -->
          <div class="wrapper wrapper-content">
            <?= $this->fetch('content') ?>
          </div>
        </div>
        <!-- top nav start -->
      </div>

<?=  $this->Html->script('jquery-2.1.1'); ?>
<?=  $this->Html->script('bootstrap.min'); ?>
<?=  $this->Html->script('plugins/metisMenu/jquery.metisMenu'); ?>
<?=  $this->Html->script('plugins/slimscroll/jquery.slimscroll.min'); ?>
<?=  $this->Html->script('inspinia'); ?>
<?=  $this->Html->script('plugins/pace/pace.min'); ?>
<?=  $this->Html->script('plugins/iCheck/icheck.min'); ?>
<!-- <?=  $this->Html->script('demo/peity-demo'); ?> -->
</body>

<script>
var url = '<?= $this->Url->build([
  "controller" => "Users",
  "action" => "ajaxSearch",
]);
?>';

        function myFunction() {
          // data = {
          //   description: $('#top').val()
          // }


          //   $.ajax({
          //       type: 'POST',
          //       data: data,
          //       beforeSend: function(){
          //       $("#result").text("loading...");
          //     },
          //       url: url,
          //       success:function(data) {
          //         alert(data);
          //        $("#result").text(data);
          //     },
          //   });

          var searchText = $('#top').val();
          url = url+'/'+searchText;
          window.location.href = url;
        }

          var url3 = '<?= $this->Url->build([
            "controller" => "Users",
            "action" => "handleRequest",
            ]);
            ?>';
        function friendR(sender_id, status) {

          url3 = url3+'/'+sender_id+'/'+status;

          $.ajax({
                type: 'GET',
                url: url3,
                headers: { 'Accept': 'application/json', 'content-type': 'application/json' },
                beforeSend: function(){
                  $("#result").text("loading...");
                },
                success:function() {
                  if(status){
                    alert('Friend Request Sent');
                  }else{
                    alert('Friend Request Declined');
                  }
                 location.reload();
              },
            });

        }
</script>
<style type="text/css">
.gray-bg {
  background-image: url("http://localhost/facetube/img/9.jpg"); no-repeat;
  background-size: cover;

}
.logo-namee {
  color: black;
  font-size: 100px;
  font-weight: 800;
  letter-spacing: -10px;
  margin-bottom: 0;
}
</style>
</html>
