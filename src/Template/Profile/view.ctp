<?php
   $this->start('tb_actions');
   ?>
<li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
<li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
   $this->end();

   $this->start('tb_sidebar');
   ?>
<ul class="nav nav-sidebar">
   <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
   <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
   <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?> </li>
   <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
   <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
   <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
   $this->end();
   ?>
<div class="row">
   <div class="col-sm-3">
      <div class="row">
         <div class="col-sm-6">
            <img class="img-responsive" src="/webroot/img/trophy.jpg">
         </div>
         <div class="col-sm-6">
            <div class="row">
               <strong><?= $user->username ?></strong>
            </div>
            <div class="row">
               <?= $this->Number->format($profile->points) ?> points
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-9">
     <div class="panel panel-primary">
       <div class="panel-heading">
         Personal Information
       </div>
       <div class="panel-body">
         <table class="table table-striped" cellpadding="0" cellspacing="0">
            <tr>
               <td><?= __('Age') ?></td>
               <td><?= h($profile->age) ?></td>
            </tr>
            <tr>
               <td><?= __('Gender') ?></td>
               <td><?= h($profile->gender) ?></td>
            </tr>
         </table>
       </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Medical Information
        </div>
        <div class="panel-body">
          <table class="table table-striped" cellpadding="0" cellspacing="0">
             <tr>
                <td><?= __('Hospital') ?></td>
                <td><?= h($profile->hospital) ?></td>
             </tr>
          </table>
        </div>
       </div>
       <div class="panel panel-primary">
         <div class="panel-heading">
           Contact Details
         </div>
         <div class="panel-body">
           <table class="table table-striped" cellpadding="0" cellspacing="0">
              <tr>
                 <td><?= __('Email') ?></td>
                 <td><?= h($profile->email) ?></td>
              </tr>
              <tr>
                 <td><?= __('Phone Number') ?></td>
                 <td><?= h($profile->phone_number) ?></td>
              </tr>
           </table>
         </div>
        </div>
      <div class="row user-profile-buttons">
        <a href="/users/dashboard"><div class="btn btn-success">
            My Dashboard
        </div></a>

      </div>
   </div>
</div>
