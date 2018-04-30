<?php echo "Hi"; die; if($user):?>
<?php foreach($user as $users): ?>
<div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>

                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img class="img-responsive" src=<?php echo $users['photo'];?>>
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $users['name'] ?> </strong></h4>
                                <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                                <h5>
                                    About me
                                </h5>
                                <p>
                                    <?php echo $users['email'] ?>
                                </p>
                              
                                
                                <div id="dem" class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope" onclick='document.getElementById("dem").style.display = "none"'></i> Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                    </div>
                  <?php endforeach;?>
                  <?php endif;?> 
<!--   <table class="table table-striped table-bordered table-hover">
          <thead>
             <th>Field 1</th>

          </thead>
          <tbody>
         <?php foreach($result as $applicant){?>
              <tr>
                 <td><?php echo $result['Users']['field1'];?></td>

              </tr>
          <?php }?>
          </tbody>
      </table>
   <?php else:?>
      No results.
  <?php endif;?> -->
