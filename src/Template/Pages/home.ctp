<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'V.A.C.O.';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>
        </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    </head>
    <body>
        <header>
        </header>
        <div>
            <h1>Login</h1>
             <?= $this->Form->create() ?>
                <?= $this->Form->input('login') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->button('Login') ?>
             <?= $this->Form->end() ?>
             <?= $this->Flash->error ?>
           
        </div>
        <footer>
        </footer>
    </body>
</html>
