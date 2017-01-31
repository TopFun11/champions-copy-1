<?php
if($module->theme) {
  $this->layout = $module->theme;
}
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();
$this->start('tb_sidebar');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();
?>

  <div class="row">
    <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
        <h1><?= ($module->title) ?></h1>
        <p> Tagline here </p>
    </div>
  </div>

  <div class="row">
    <?php
        foreach($module->sections as $section):
          echo $section->content;
        endforeach; ?>
  </div>