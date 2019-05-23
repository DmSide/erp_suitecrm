<?php /* Smarty version 2.6.31, created on 2019-05-20 15:29:18
         compiled from cache/modules/Import/Accountsbilling_address_state.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['billing_address_state']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['billing_address_state']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['billing_address_state']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['billing_address_state']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['billing_address_state']['name']; ?>
' size='30' 
    maxlength='100' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''  tabindex='1'      >