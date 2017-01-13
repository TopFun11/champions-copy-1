<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="module view large-9 medium-8 columns content">
    <h3><?= h($module->title) ?></h3>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
      <li><a data-toggle="tab" href="#sections">Sections</a></li>
    </ul>

<div class="tab-content">
  <div id="details" class="tab-pane fade in active">
    <h3>Details</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($module->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($module->id) ?></td>
        </tr>
    </table>
  </div>
  <div id="sections" class="tab-pane fade">
    <h3>Sections</h3>
    <p><!--TODO--></p>
  </div>
</div>
