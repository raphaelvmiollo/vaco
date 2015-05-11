<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'V.A.C.O - Validação de ACG Online';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!--<?= $this->Html->css('base.css') ?>-->
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
    echo $this->Html->script('jQuery-1.7');
    ?>
</head>
<body>
    <header>
        <div class="header-title">
            <span>
                <center><h1>Sistema de Validação<br> de ACG</h1></center>
            </span>
        </div>
        <div class="header-help">
           <!-- <span><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></span>
           <span><a target="_blank" href="http://api.cakephp.org/3.0/">APdfI</a></span>-->
       </div>
   </header>
   <div id="container">

    <div id="content">


        <div class="row">
            
                <?= $this->fetch('content') ?>
            
        </div>
    </div>
    <footer class="footer">

    </footer>
</div>

</body>
</html>
