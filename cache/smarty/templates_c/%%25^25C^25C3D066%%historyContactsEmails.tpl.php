<?php /* Smarty version 2.6.31, created on 2019-05-11 15:44:13
         compiled from modules/Configurator/tpls/historyContactsEmails.tpl */ ?>
<form name="AdminSettings" method="POST">
    <input type="hidden" name="action" value="historyContactsEmailsSave">
    <input type="hidden" name="module" value="Configurator">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
        <tr>
            <td width="100%" colspan="2">
                <input type="submit" id="configuratorHistoryContactsEmails_admin_save"  class="button primary" title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
">
                <input type="button" id="configuratorHistoryContactsEmails_admin_cancel" onclick="location.href='index.php?module=Administration&amp;action=index';" class="button" title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
">
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr>
            <td scope="row" align="right" valign="top" nowrap><?php echo $this->_tpl_vars['MOD']['LBL_ENABLE_HISTORY_CONTACTS_EMAILS']; ?>
:</td>
            <td colspan="4" width="95%">
                <table id="sugarfeed_modulelist" cellspacing=3 border=0>
                    <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['feedModuleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['feedModuleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['feedModuleList']['iteration']++;
?>
                        <?php if (( ($this->_foreach['feedModuleList']['iteration']-1) % 2 ) == 0): ?><tr><?php endif; ?>
                        <td scope="row" align="right"><?php echo $this->_tpl_vars['entry']['label']; ?>
:</td>
                        <td>
                            <input type="hidden" name="modules[<?php echo $this->_tpl_vars['entry']['module']; ?>
]" value="0">
                            <input type="checkbox" id="modules[<?php echo $this->_tpl_vars['entry']['module']; ?>
]" name="modules[<?php echo $this->_tpl_vars['entry']['module']; ?>
]" value="1" <?php if ($this->_tpl_vars['entry']['enabled'] == 1): ?>CHECKED<?php endif; ?>>
                        </td>
                        <?php if (( $this->_tpl_vars['i'] % 2 ) == 1): ?></tr><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </td></tr>
    </table>
</form>