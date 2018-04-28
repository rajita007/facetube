<h3>Search Result</h3>
<div class="result">
 <?php

    echo $this->Form->create();
    echo $this->Form->control('field1', ['id' => 'field']);

   echo $this->Form->end();

?>
<button onclick="myFunction()">Click Me</button>
</div>
<script>
var url = '<?= $this->Url->build([
"controller" => "Users",
"action" => "ajaxSearch",
]);
?>';
        function myFunction() {
          data = {
            description: $('#field').val()
          }


            $.ajax({
                type: 'POST',
                data: data,
                beforeSend: function(){
                $("#result").text("loading...");
              },
                url: url,
                success:function(data) {
                  alert(data);
                 $("#result").text(data);
              },
            });

        }
</script>
