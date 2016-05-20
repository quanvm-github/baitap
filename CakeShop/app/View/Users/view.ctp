<?php
    echo $this->Form->create('User', array('url' => array('action' => 'edit', $user['User']['id'])));
?>
<table>
    <?php
        echo $this->Html->tableHeaders(array('Id', 'User', 'Role', 'Created', 'Modified'));
        echo $this->Html->tableCells(
        array
        (
            $user['User']['id'],
            $this->Form->input('username', array
                (
                    'default' => $user['User']['username'],
                    'label' => false
                )),
            $this->Form->input('role', array
                (
                    'options' => array('admin' => 'Admin', 'author' => 'Author'),
                    'default' => $user['User']['role'],
                    'label' => false
                )),
            $user['User']['created'],
            $user['User']['modified']
        ));
    ?>
</table>
<?php echo $this->Form->end(('Edit')); ?>