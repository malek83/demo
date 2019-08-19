<?php

function viewTree(\App\Entity\NodeEntity $node) {
    ?>
    <table class="table">
        <tr>
            <td colspan="2" class="text-center">
                <?php echo $node->getUsername(); ?>(ID:<?php echo $node->getId(); ?>)<br/>(credits left: <?php echo $node->getCreditsLeft(); ?>) (credits right: <?php echo $node->getCreditsRight(); ?>)
            </td>
        </tr>
        <tr>
            <td class="align-top text-center">
                <?php if($node->getLeftChild()): ?>
                    <?php viewTree($node->getLeftChild()) ?>
                <?php else: ?>
                    no left child <br/><a href="?action=add&parent_id=<?php echo $node->getId() ?>&direction=l" class="btn btn-primary" title="Add">Add</a>
                <?php endif; ?>
            </td>
            <td class="align-top text-center">
                <?php if($node->getRightChild()): ?>
                    <?php viewTree($node->getRightChild()) ?>
                <?php else: ?>
                    no right child <br/><a href="?action=add&parent_id=<?php echo $node->getId() ?>&direction=r" class="btn btn-primary" title="Add">Add</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>

<?php
}