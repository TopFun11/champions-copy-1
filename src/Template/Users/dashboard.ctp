<?php
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
<div class="container user-dashboard">
    <div class="row greeting">
        <div class="col-md-12">
            <h1>Good Afternoon, <?=$user->username?>.</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 activity-summary">
            <h2>Your Activity Summary<span><a href="">This Week</a> | <a href="">Last 30 Days</a> | <a href="">All Time</a></span></h2>
            <div class="row">
                <div class="col-md-6">
                    (pie chart)
                </div>
                <div class="col-md-6 activity-statistics">
                    <div class="row">
                        <div class="col-md-2 value">3</div>
                        <div class="col-md-10 align-middle">Modules engaged with this week</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 value">9</div>
                        <div class="col-md-10 align-middle">Consecutive days of engagement</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 value">1</div>
                        <div class="col-md-10 align-middle">Trophy earned this week <em>(Good work!)</em></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Your Modules</h2>
            <div>
                <p>You are enrolled onto <?=count($user->module)?> modules</p>
                <?php foreach($user->module as $module): ?>
                <hr>
                (icon fa-fw) <?= $this->Html->link($module->title, ['controller' => 'module', 'action' => 'dashboard', $module->id], ['title' => __($module->title)]); ?>
                <?php endforeach; ?>                
                <hr>
                <a href="#catalogue">(icon fa-fw) View Module Catalogue</a>
            </div>
        </div>
    </div>
    <div class="row trophies">
        <div class="col-md-12">
            <h2>Trophies</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="trophy-icon"></div>
                    <p>You may earn trophies through continued engagement with your modules, and they will appear in the trophy cabinet on your public profile.</p>
                </div>
            </div>
        </div>
    </div>
</div>
