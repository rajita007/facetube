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
<body>
    <!-- <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul> -->
        </div>
    </nav> -->
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
</head>
<body>
        <div id="wrapper">
    <?= $this->Flash->render() ?>
    <!-- side navigation start -->

    <!-- side navigation ends -->


        <div id="page-wrapper" class="gray-bg">

            <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                      <div class="form-group" >
                    <div class="result">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top"><button onclick="myFunction()"></button>
                </div></div>
            
        </div>
            <ul class="nav navbar-top-links navbar-right" style="display: inline-flex;">



                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <?php echo $this->Html->link('Logout','/Users/logout', array('class'=>'button'))?>
                </li>
            </ul>

        </nav>
        </div>
        <!-- top nav start -->
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="gray-bg">
                    <h2>FaceTube</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <!-- top nav end -->
        <div class="wrapper wrapper-content">

        <?= $this->fetch('content') ?>


        </div>
    </div>
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
</script>
<style type="text/css">
.gray-bg {
   background-image: url("http://localhost/facetube/img/123.png");
}
</style>
</html>
