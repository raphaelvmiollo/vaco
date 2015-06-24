<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>
<div class="container">
    <br>
    <div class="alert alert-info" role="alert" style="border: 1px solid #33FFFF">
        <h4><strong> Você está vinculado(a) ao seguinte curso: </strong></h4>
        <ul>  
            <li><h4><?= $user . " - " . $nome ?></h4></li> 
            <li><h4><?= $course ?></h4></li>  
        </ul> 
    </div>
</div>

<?php $this->end(); ?>


