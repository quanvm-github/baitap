<?php
    echo $this->Form->create('User');
?>
<table>
    <?php
        echo $this->Html->tableHeaders(array('Id', 'User', 'Role', 'Created', 'Modified', 'Edit', 'Delete'));
        foreach ($user as $value) {
            echo $this->Html->tableCells(
            array
            (
                $value['User']['id'],
                $value['User']['username'],
                $value['User']['role'],
                $value['User']['created'],
                $value['User']['modified'],
                $this->Html->link('edit', array(
                    'action' => 'view',
                    $value['User']['id']
                )),
                $this->Form->postLink('delete', array(
                    'action' => 'delete',
                    $value['User']['id']
                ))
            ));
        }
    ?>
</table>
<?php echo $this->Form->end(); ?>