<?php /* Smarty version 2.6.31, created on 2019-05-12 11:29:37
         compiled from modules/ModuleBuilder/tpls/Preview/listView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'modules/ModuleBuilder/tpls/Preview/listView.tpl', 49, false),array('function', 'math', 'modules/ModuleBuilder/tpls/Preview/listView.tpl', 53, false),array('function', 'sugar_translate', 'modules/ModuleBuilder/tpls/Preview/listView.tpl', 69, false),array('function', 'sugar_getimage', 'modules/ModuleBuilder/tpls/Preview/listView.tpl', 73, false),)), $this); ?>
<link rel="stylesheet" type="text/css" href="modules/ModuleBuilder/tpls/ListEditor.css" />
<table class="preview-content">
<td>

<?php echo smarty_function_counter(array('start' => 0,'name' => 'groupCounter','print' => false,'assign' => 'groupCounter'), $this);?>

<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['list']):
?>
	<?php echo smarty_function_counter(array('name' => 'groupCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>
<?php echo smarty_function_math(array('assign' => 'groupWidth','equation' => "100/".($this->_tpl_vars['groupCounter'])."-5"), $this);?>


<?php echo smarty_function_counter(array('start' => 0,'name' => 'slotCounter','print' => false,'assign' => 'slotCounter'), $this);?>

<?php echo smarty_function_counter(array('start' => 0,'name' => 'modCounter','print' => false,'assign' => 'modCounter'), $this);?>


<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['list']):
?>

<div style="float: left; border: 1px gray solid; padding:4px; margin-right:4px; margin-top: 8px; width:<?php echo $this->_tpl_vars['groupWidth']; ?>
%;">
<h3 ><?php echo $this->_tpl_vars['label']; ?>
</h3>
<ul>

<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>

<li name="width=<?php echo $this->_tpl_vars['value']['width']; ?>
%" class='draggable' style='cursor:default;'>
    <table width='100%'>
    	<tr>
    		<td style="font-weight: bold;"><?php if (! empty ( $this->_tpl_vars['value']['label'] )): ?><?php echo smarty_function_sugar_translate(array('label' => $this->_tpl_vars['value']['label'],'module' => $this->_tpl_vars['language']), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['key']; ?>
<?php endif; ?></td>
    		<td>
                                <?php if (isset ( $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['calculated'] ) && $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['calculated']): ?>
                    <?php echo smarty_function_sugar_getimage(array('name' => "SugarLogic/icon_calculated",'alt' => $this->_tpl_vars['mod_strings']['LBL_CALCULATED'],'ext' => ".png",'other_attributes' => ''), $this);?>

                <?php endif; ?>
                <?php if (isset ( $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['dependency'] ) && $this->_tpl_vars['field_defs'][$this->_tpl_vars['key']]['dependency']): ?>
                    <?php echo smarty_function_sugar_getimage(array('name' => "SugarLogic/icon_dependent",'alt' => $this->_tpl_vars['mod_strings']['LBL_DEPENDANT'],'ext' => ".png",'other_attributes' => ''), $this);?>

                <?php endif; ?>
                    		</td>
    	</tr>
    	<tr class='fieldValue' style='cursor:default;'>
    		<?php if (empty ( $this->_tpl_vars['hideKeys'] )): ?><td>[<?php echo $this->_tpl_vars['key']; ?>
]</td><?php endif; ?>
    		<td align="right" colspan="2"><span><?php echo $this->_tpl_vars['value']['width']; ?>
</span><span>%</span></td>
    	</tr>
    </table>
</li>
<?php echo smarty_function_counter(array('name' => 'modCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>

<li class='noBullet'>&nbsp;</li>

</ul>
</div>

<?php echo smarty_function_counter(array('name' => 'slotCounter'), $this);?>

<?php endforeach; endif; unset($_from); ?>
</td>
</tr></table>

