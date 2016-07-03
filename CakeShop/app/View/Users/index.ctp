<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<?php
    echo $this->Html->script('paging');
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
<?php
    echo $this->Form->create('User', array('id' => 'form'));
    echo $this->Form->hidden('page', array('id' => 'page'));
?>
<div class="paging">
<?php
    echo $this->Paginator->first('<<');
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->last('>>');
?>
</div>
<?php
    echo $this->Form->end();
?>