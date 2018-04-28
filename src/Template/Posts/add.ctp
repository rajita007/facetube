<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?><script>






</script>

<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
          //  echo $this->Form->control('sender_id', ['options' => $senders]);
            echo $this->Form->control('description', ['id' => 'des']);
            echo $this->Form->control('attach', ['id' => 'att']);
          //  echo $this->Form->control('receiver_id', ['options' => $receivers]);
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
    <button id="but">Click Me</button>

</div>
<script>
  var url = '<?= $this->Url->build([
  "controller" => "Posts",
  "action" => "post",
  ]);
  ?>';
  // $(document).ready(function(){
          $("#but").click(function(){

            data = {
              description: $('#des').val(),
              attach: $('#att').val()
            }


              $.ajax({
                  type: 'POST',
                  url: url,
                  data: data,
                  success: function(data) {
                      alert(data);
                      $("p").text(data);

                  }
              });
     });
  // });
</script>
