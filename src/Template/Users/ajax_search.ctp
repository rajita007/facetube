<html><?php if($user):?>
<?php foreach($user as $users): ?>
<div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>

                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img class="img-responsive" src=<?php  echo $users['photo'];?>
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
                                            <button type="button" onclick='message(<?= $users->id ?>)' class="btn btn-primary btn-sm btn-block" id = "message"><i class="fa fa-envelope"></i> Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"  onclick='add()' id="addF"><i class="fa fa-coffee"></i> Add Friend</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    </div>
                    </div>
                  </div>
                  <?php endforeach;?>
                  <?php endif;?> 
 <script> 
var url1 = '<?= $this->Url->build([
"controller" => "Users",
"action" => "message",
]);
?>';
          
        function message(receiver_id) {
            var message= prompt("Write your message here");
                    
             console.log(message);

          message = {
            message: message,
            receiver_id: receiver_id
          }
          alert(message);
           
            $.ajax({
                type: 'POST',
                data: message,
                url: url1,
                success:function(data) {
                  alert(data);
                 $("p").text(data);
                 // window.location.href = url2;
              },
            });

        }
           function add(){
            alert('hi');
            $("#addF").hide();
           }
        
        
</script>
<style type="text/css">
.gray-bg {
   background-image: url("http://localhost/facetube/img/123.png");
}
.addfriend
</style>


</html>
