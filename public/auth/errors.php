<?php 
if(count($errors) > 0) :?>
 <div class="min-w-0 p-4 text-red bg-purple-600 rounded-lg shadow-xs">
  <?php foreach ($errors as $error) : ?>
  <p><?php echo $error ?></p>
  <?php endforeach ?>
</div>
<br>
<?php endif; ?>

