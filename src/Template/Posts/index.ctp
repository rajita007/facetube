            <div >
                <div class="row">

                    <!--<div class="col-lg-6">-->
                      <?php foreach ($data as $post): ?>
                        <div class="col-lg-6">
                        <div class="social-feed-box">

                            <div class="pull-right social-action dropdown">
                                <!-- <button data-toggle="dropdown" class="dropdown-toggle bt n-white"> -->

                                  <?=  $this->Form->postButton('<i class="fa fa-minus"></i>', ['controller'=>'Posts','action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                                    <i ></i>
                                </button>
                            </div>
                            <div class="social-avatar">
                                <div class="media-body">
                                    <a href="#">
                                      <td><?php echo $post->sender->name ; ?></td>
                                    </a>
                                </div>
                            </div>
                            <div class="social-body">
                              <p>

                                <td class="img"> <?= $this->Html->image('/'.$post['attach'], ['alt' => 'IMAGE']) ?></td>
                              </p>
                                <p>

                                  <td><?= h($post->description) ?></td>
                                </p>

                                <div class="btn-group">
                                    <button class="btn btn-white btn-xs" onclick="like(<?= $post->id ?>, <?= $post->receiver_id ?>, <?= count($post->likes)?>)"><i class="fa fa-thumbs-up"></i> <span id ="<?= 'like'.$post->id ?>"><?= count($post->likes)?></span></button>
                                    <!-- <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button> -->
                                    <!-- <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button> -->
                                </div>
                            </div>


                        </div>
                      </div>

                        <?php endforeach; ?>
                    <!--</div>-->
                </div>
            </div>


<script>
var url7 = '<?= $this->Url->build([
"controller" => "Posts",
"action" => "like",
]);
?>';
// $(document).ready(function(){
function like(post_id, user_id, postCount) {
  data = {
    user_id:user_id,
    post_id:post_id
  };
  console.log('here');
    $.ajax({
        type: 'POST',
        data: data,
        url: url7,
        dataType:"json",
        // accepts:"application/json",

        success: function(response) {
            alert('Success');
            $("#like"+post_id).html(postCount+1);
            console.log('here2');
            console.log(response);

        },
        error:function(response){
          alert('Failed');
          console.log(response);
        }
    });

}


</script>
<style>
img {
    width: 50%;
}</style>
    <!-- Mainly scripts -->
    <!-- <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <!-- <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script> --> -->
