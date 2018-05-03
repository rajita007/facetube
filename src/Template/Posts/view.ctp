  <div  class="row">

    <!-- <div class="col-lg-6"> -->
      <?php  foreach ($post as $posts): ?>
          <div style="margin:0 13px 0 13px;" class="social-feed-box">

            <div  class="pull-right social-action dropdown">
              <?=  $this->Form->postButton('<i class="fa fa-minus"></i>', ['controller'=>'Posts','action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
            </div>
            <div class="social-avatar">
              <div class="media-body">
                <a href="#">
                  <td><?= h($posts->sender->name) ?></td>
                </a>
              </div>
            </div>
            <div class="social-body">
              <p>

                <td><?= h($posts->description) ?></td>
              </p>

              <div class="btn-group">
                <button class="btn btn-white btn-xs" onclick="like(<?= $posts->id ?>, <?= $posts->receiver_id ?>, <?= count($posts->likes)?>)"><i class="fa fa-thumbs-up"></i> <span id ="<?= 'like'.$posts->id ?>"><?= count($posts->likes)?></span></button>
                <!-- <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button> -->
                <!-- <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button> -->
              </div>
            </div>


          </div>
      <?php endforeach; ?>
    <!-- </div> -->

  </div>

<div class="footer">
  <div class="pull-right">
    10GB of <strong>250GB</strong> Free.
  </div>
  <div>
    <strong>Copyright</strong> Example Company &copy; 2014-2015
  </div>
</div>

</div>
</div>


<script>
var url8 = '<?= $this->Url->build([
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
  console.log(postCount);
  console.log('here');
  console.log(url8);
  $.ajax({
    type: 'POST',
    data: data,
    url: url8,
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
<!-- Mainly scripts -->
<!-- <script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<!-- <script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script> --> -->
