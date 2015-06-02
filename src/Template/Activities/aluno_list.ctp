<div class="container">
    <div class="actions columns large-2 medium-3">
        <h2>Minhas atividades</h2>

        <div class="activities index large-10 medium-9 columns">
            <table cellpadding="0" cellspacing="0" class="table">
                <thead>
                    <tr>
                            <!--<th><?= $this->Paginator->sort('idactivity') ?></th>-->
                        <th><?= $this->Paginator->sort('Resumo') ?></th>
                        <th><?= $this->Paginator->sort('Local da Atividade') ?></th>
                        <th><?= $this->Paginator->sort('Horas de Atividade') ?></th>
                        <th><?= $this->Paginator->sort('Semestre') ?></th>
                        <th><?= $this->Paginator->sort('Data e Hora ') ?></th>
                        <th><?= $this->Paginator->sort('arquivo') ?></th>
                        <th><?= $this->Paginator->sort('Situação') ?></th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($activities as $activity): ?>
                        <?php
                        switch ($activity->avaliation->situation) {
                            case '0':
                                $classe = "class='info'";
                                $situacao = "Em análise";
                                break;
                            case '1':
                                $classe = "class='success'";
                                $situacao = "Aprovada";
                                break;
                            case '2':
                                $classe = "class='danger'";
                                $situacao = "Reprovada";
                                break;

                            default:
                                # code...
                                break;
                        }
                        ?>

                        <tr <?php echo $classe; ?> >
                                <!-- <td><?= $this->Number->format($activity->idactivity) ?></td>-->
                            <td><?= h($activity->abstract) ?></td>
                            <td><?= h($activity->activity_local) ?></td>
                            <td><?= h($activity->activity_hours) ?> horas</td>
                            <td><?php if ($activity->semester == 1) {
                            echo "Primeiro";
                        } else {
                            echo "Segundo";
                        } ?>


                            </td>

                            <td><?= h($activity->date) ?></td>
                            <td><?= h($activity->path) ?></td>
                            <td><?= h($situacao) ?></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
<?= $this->Paginator->prev('< ' . __('anterior')) ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(__('próximo') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>



    </div>
</div>