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
	<?= $this->Html->css('estilo.css'); ?>
	<?= $this->Html->script('bootstrap.min'); ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
	<?php
	echo $this->Html->script('jQuery-1.7');
	?>
    </head>
    <body>
        <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
            <ul id="menu-barra-temp" style="list-style:none;">
                <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
                <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
            </ul>
        </div>
        <header>
        </header>
        <div id="container">
            <div id="content" style="margin-bottom: 5px;">
			<?= $this->fetch('content') ?>
            </div>
            <footer class="footer">
                <hr style="margin-bottom: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Portal das ACGS - Versão 1.0</p>
                        </div>
                        <div class="col-sm-6">
                            <p style="text-align: right;">Projeto de Software I - 2015/1</p>
                        </div>
                    </div>
                </div>
            </footer>   
        </div>
        <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
    </body>
</html>
