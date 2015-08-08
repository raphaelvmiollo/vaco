<?php
$class = 'message';
if (!empty($params['class'])) {
    $class = "alert alert-info";
}
?>
<div class="<?= h($class) ?>" role="alert"><?= h($message) ?></div>
