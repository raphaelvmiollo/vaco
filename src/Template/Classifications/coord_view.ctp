<?php
$this->extend('/Menus/menu_principal');
$this->start('sidebar');
?>

<div class="container">
    <div class="avaliations view large-10 medium-9 columns">
        <h2><?= h($classification->classification_name) ?></h2>
        <div class="row">
            <div class="large-2 columns numbers end">
                <h4 class="subheader"><?= __('Nome da Categoria:') ?></h4>
                <p><?= h($classification->classification_name) . "<br>" ?></p>

                <h4 class="subheader"><?= __('Avaliador') ?></h4>
                <p><?= h($this->typeOfUser($this->Number->format($classification->avaliator_type))) . "<br>" ?></p>

                <h4 class="subheader"><?= __('Descrição') ?></h4>
                <p> <?= $this->Text->autoParagraph(h($classification->description)) . "<br>" ?></p>

                <h4 class="subheader"><?= __('Máximo de horas') ?></h4>
                <p><?= h($classification->max_hours) . "<br>" ?></p>
            </div>
        </div>
    </div>
</div>

<?php $this->end(); ?>