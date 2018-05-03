<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create(null,['class' => 'm-t','enctype' => 'multipart/form-data']) ?>
    <fieldset>
      <h1 style="color:white;">Add Post</h1>
      <div class="form-group">
        <label for="exampleTextarea" class=" label label-success" >Description</label>
        <textarea name="description" class="form-control" id="exampleTextarea" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleTextarea" class=" label label-danger" >Attach</label>
      <br>  <input type="file" name="attach"/>
      </div>
        <button  id="but" class="btn btn-primary" >post</button>
    </fieldset>
    <?= $this->Form->end() ?>


</div>
