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
                                <p>
                                    <?php echo $users['email'] ?>
                                </p>


                                <div id="dem" class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" onclick='message(<?= $users->id ?>)' class="btn btn-primary btn-sm btn-block" id = "message"><i class="fa fa-envelope ff"></i> Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"  onclick='add(<?= $users->id ?>)' id="addF"><i class="fa fa-user-plus"></i> Add Friend</button>
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
          alert("Message sent successfully");

            $.ajax({
                type: 'POST',
                data: message,
                url: url1,
                success:function(data) {

                 // window.location.href = url2;
              },
            });

        }
           var url2 = '<?= $this->Url->build([
"controller" => "Users",
"action" => "friend",
]);
?>';

        function add(receiver_id) {

          var message = {

            receiver_id: receiver_id
          }
          alert("Friend Request Sent Successfully!!");

            $.ajax({
                type: 'POST',
                data: message,
                url: url2,
                success:function(data) {
                  $('#addF').hide();
                 // window.location.href = url2;
              },
            });

        }

 var url3 = '<?= $this->Url->build([
"controller" => "Users",
"action" => "index",
]);
?>';

//     $("#addF").click(function(){
//     this.hide();
// });

</script>
<!-- <style type="text/css">
.gray-bg {
   background-image: url("http://localhost/facetube/img/123.png");
}
.addfriend{}
</style> -->


</html>
