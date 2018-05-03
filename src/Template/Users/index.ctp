
<div class="row animated fadeInRight">
  <div class="col-md-4">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Profile Detail</h5>
      </div>
      <div>
        <div class="ibox-content no-padding border-left-right">
          <img class="img-responsive" src=<?php echo $user['photo'];?>>
        </div>
        <div class="ibox-content profile-content">
          <h4><strong><?php echo $user['name'] ?> </strong></h4>
          <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
          <h5>
            About me
          </h5>
          <p>
            Spyke loves food.
          </p>
          <div id="dem" class="user-button">
            <div class="row">
              <div class="col-md-6">
                <input type="button" class="btn btn-w-m btn-success btn-sm btn-block" title="Click to Deactivate" value="Add Post " onClick="javascipt:window.location.href='<?php echo $this->Url->build(["controller"=>"Posts","action"=>"post",$user->id]); ?>'" >
              </div>
              <!--  <div class="col-md-6">
              <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
            </div> -->
            <div class="col-md-6">
              <input type="button" class="btn btn-w-m btn-danger btn-sm btn-block" title="Click to Deactivate" value="View Timeline" onClick="javascipt:window.location.href='<?php echo $this->Url->build(["controller"=>"Posts","action"=>"index",$user->id]); ?>'" >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-4">
  <div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5>Friends</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <!--<div class="ibox-content ibox-heading">
    <h3><i class="fa fa-envelope-o"></i> All Friends</h3>
    <small><i class="fa fa-tim"></i> </small>
  </div>-->

  <div class="widget style1 navy-bg" style="height:100px; margin:0 0 0 0;">
    <div class="row vertical-align">
      <div class="col-xs-3">
        <i class="fa fa-user fa-3x"></i>
      </div>
      <div class="col-xs-9 text-right">
        <h2 class="font-bold"><?php echo  sizeof($friends)?></h2>
      </div>
    </div>
  </div>
  <div class="ibox-content">
    <div class="feed-activity-list">
      <?php foreach($friends as $friend):?>
        <div class="feed-element">
          <div>

            <?php if($friend->sender_id == $user->id): ?>
              <?= $this->Html->image('/'.$friend->receiver['photo'], ['class'=>"img-circle"]) ?>
              <small class="pull-right text-navy"><?= $this->Html->link('View Profile', ['controller' => 'Users', 'action' => 'view', $friend->receiver_id]) ?></small>
              <strong><tr><?= $friend->receiver->name ?></tr></strong>
              <div><?= $friend->receiver->email?></div>

              <small class="text-muted"></small>
            <?php else: ?><?= $this->Html->image('/'.$friend->sender['photo'], ['class'=>"img-circle"]) ?>
              <small class="pull-right text-navy"><?= $this->Html->link('View Profile', ['controller' => 'Users', 'action' => 'view', $friend->sender_id]) ?></small>
              <strong><?= $friend->sender->name ?></strong>
              <div><?= $friend->sender->email?></div>

              <small class="text-muted"></small>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
</div>
<div class="col-md-4">
  <div class="ibox float-e-margins">
    <div class="ibox-title" style="margin:0 13px 0 0;">
      <h5>Messages</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <!--<div class="ibox-content ibox-heading" style="margin: 0 13px 0 0;">
    <h3><i class="fa fa-envelope-o"></i> New messages</h3>
    <small><i class="fa fa-tim"></i> </small>
  </div>-->

  <div class="widget style1 lazur-bg" style="margin: 0 13px 0 0;">
    <div class="row">
      <div class="col-xs-4">
        <i class="fa fa-envelope-o fa-5x"></i>
      </div>
      <div class="col-xs-8 text-right">
        <span> New messages </span>
        <h2 class="font-bold"><?php echo  sizeof($friends);?></h2>
      </div>
    </div>
  </div>


  <div class="ibox-content" style="margin: 0 13px 0 0;">
    <div class="feed-activity-list">
      <?php foreach($messages as $message):?>
        <div class="feed-element">
          <div>
            <small class="pull-right text-navy">1m ago</small>
            <strong><?= $message->sender->name ?></strong>
            <div><?= $message->message ?></div>
            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</div>
