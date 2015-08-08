<?php $this->extend('/Menus/menu_principal');
$this->start('sidebar'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="actions columns large-1 medium-3">
                <h2>Envio de ACGs</h2>
                <div class="activities form large-10 medium-9 columns">
                    <?= $this->Form->create($activity); ?>
                    <fieldset>
                        <br>
                        <?php
                        asort($classifications);
                        echo $this->Form->input('classification_id', ['class' => 'form-control', 'label' => 'Categoria:'], ['options'=> array_multisort($classifications)]) . '<br>'; 
                        echo $this->Form->input('activity_local', ['class' => 'form-control', 'type' => 'text', 'label' => 'Local:', 'required' => true]) . '<br>';
                        echo $this->Form->input('activity_hours', ['class' => 'form-control', 'type' => 'number', 'label' => 'Horas Totais:', 'required' => true]) . '<br>'; 
                        echo $this->Form->label('Semetre:');
                        echo $this->Form->select('semester', $this->dropSemestres(), ['class' => 'form-control']) . '<br>';                        
                        echo $this->Form->input('date', ['label' => 'Data:  '], ['type' => 'date']) . '<br>';
                        echo $this->Form->label('Resumo:');
                            echo $this->Form->textarea('abstract', ['class' => 'form-control', 'type' => 'text', 'required' => true]) . '<br>';
                        echo $this->Form->input('path', ['type' => 'file', 'label' => 'Documento de comprovação:']) . '<br>'; 
                        //ALTERAR
                        echo $this->Form->input('user_id', ['type' => 'hidden', 'value' =>  $this->request->session()->read('Auth.User.iduser')]);
                        echo $this->Form->input('submition_date', ['type' => 'hidden', 'value' =>  date('Y-m-d')]);                        
                      
                        ?>
                    </fieldset>
                    <?= $this->Html->Link(__('Cancelar'), array('controller' => 'Activities', 'action' => 'alunoList'), ['class' => 'btn btn-danger']);?>
                    <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-primary']);?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-sm-7"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->end(); ?>