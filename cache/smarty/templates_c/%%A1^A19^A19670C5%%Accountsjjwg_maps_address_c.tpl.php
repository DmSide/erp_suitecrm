<?php /* Smarty version 2.6.31, created on 2019-05-20 15:29:50
         compiled from cache/modules/Import/Accountsjjwg_maps_address_c.tpl */ ?>

<?php if (strlen ( $this->_tpl_vars['fields']['jjwg_maps_address_c']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_address_c']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['jjwg_maps_address_c']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['jjwg_maps_address_c']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['jjwg_maps_address_c']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title='Address'  tabindex='1'      >