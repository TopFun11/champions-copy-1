<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $profile->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $profile->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($profile); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Profile']) ?></legend>
    <?php
    echo $this->Form->input('email');
    echo $this->Form->input('phone_number');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>