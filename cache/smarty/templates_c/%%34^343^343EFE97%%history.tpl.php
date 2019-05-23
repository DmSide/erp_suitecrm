<?php /* Smarty version 2.6.31, created on 2019-05-12 11:29:34
         compiled from modules/ModuleBuilder/tpls/history.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'modules/ModuleBuilder/tpls/history.tpl', 42, false),)), $this); ?>
<table class="tabform" ><tr><th><?php echo smarty_function_sugar_translate(array('label' => 'LBL_HISTORY_TIMESTAMP','module' => 'ModuleBuilder'), $this);?>
</th><th>&nbsp;</th><th>&nbsp;</th></tr>
<?php if (empty ( $this->_tpl_vars['snapshots'] )): ?>
	<tr><td class='mbLBLL'><?php echo smarty_function_sugar_translate(array('label' => 'ERROR_NO_HISTORY','module' => 'ModuleBuilder'), $this);?>
</td></tr>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['snapshots']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['timestamp']):
?>
<tr>
	<td class="oddListRowS1"><a onclick="ModuleBuilder.history.preview('<?php echo $this->_tpl_vars['view_module']; ?>
', '<?php echo $this->_tpl_vars['view']; ?>
', '<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['subpanel']; ?>
');" href="javascript:void(0);">
	<?php echo $this->_tpl_vars['timestamp']; ?>
</a></td>
	<td width="1%"><input type='button' value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MB_PREVIEW','module' => 'ModuleBuilder'), $this);?>
" onclick="ModuleBuilder.history.preview('<?php echo $this->_tpl_vars['view_module']; ?>
', '<?php echo $this->_tpl_vars['view']; ?>
', '<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['subpanel']; ?>
');"/></td>
	<td width="1%"><input type='button' value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MB_RESTORE','module' => 'ModuleBuilder'), $this);?>
" onclick="ModuleBuilder.history.revert('<?php echo $this->_tpl_vars['view_module']; ?>
', '<?php echo $this->_tpl_vars['view']; ?>
', '<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['subpanel']; ?>
');"/></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>