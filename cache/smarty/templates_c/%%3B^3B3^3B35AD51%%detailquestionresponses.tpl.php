<?php /* Smarty version 2.6.31, created on 2019-05-12 11:28:15
         compiled from modules/SurveyResponses/tpls/detailquestionresponses.tpl */ ?>
<div>
    <table id="questionResponseTable" class="table table-bordered">
        <tr>
            <th></th>
            <th>
                Question
            </th>
            <th>
                Response
            </th>
        </tr>
        <?php $_from = $this->_tpl_vars['questionResponses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['questionResponse']):
?>
            <tr>
                <td>Q<?php echo $this->_tpl_vars['questionResponse']['sort_order']+1; ?>
</td>
                <td>
                    <?php echo $this->_tpl_vars['questionResponse']['questionName']; ?>

                </td>
                <td>
                    <?php echo $this->_tpl_vars['questionResponse']['answer']; ?>

                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>
</div>