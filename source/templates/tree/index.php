<?php include_once '_helper/node-view.php' ?>

<?php $root = $this->data['tree']; ?>
<?php if($root instanceof \App\Entity\NodeEntity): ?>
<?php viewTree($root) ?>
<?php else: ?>
<p>no tree defined</p>
<?php endif; ?>
<?php ?>

