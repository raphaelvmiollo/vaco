<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>
<div class="container">
    <div class="alert alert-info" role="alert" style="border: 2px solid #245580" id="">
        <h4><strong> Você está vinculado(a) ao seguinte curso: </strong></h4>
        <ul>  
            <li><h4><?= $user . " - " . $nome ?></h4></li> 
            <li><h4><?= $course ?></h4></li>  
        </ul> 
    </div>
</div>

<?php $this->end(); ?>


