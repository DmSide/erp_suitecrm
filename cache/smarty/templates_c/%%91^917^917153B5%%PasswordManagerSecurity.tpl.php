<?php /* Smarty version 2.6.31, created on 2019-05-22 12:12:32
         compiled from modules/Administration/PasswordManagerSecurity.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_help', 'modules/Administration/PasswordManagerSecurity.tpl', 12, false),)), $this); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <!-- Password Security Settings -->
    <tr>
        <th align="left" scope="row" colspan="3"><h4><?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_SETS']; ?>
</h4></th>
    </tr>

    <!-- Password Min Length -->
    <tr>
        <td width="25%" scope="row" valign="middle">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_MIN_LENGTH']; ?>

            <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_PWDSEC_MIN_LENGTH_DESC']), $this);?>

        </td>
        <td valign="middle">
            <input name="passwordsetting_minpwdlength" id="passwordsetting_minpwdlength" type="number" value="<?php echo $this->_tpl_vars['config']['passwordsetting']['minpwdlength']; ?>
">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_CHARS']; ?>

        </td>
        <td>&nbsp;</td><td>&nbsp;</td>
    </tr>

    <!-- Password should contains uppercase characters -->
    <tr>
        <td width="25%" scope="row" valign="middle">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_UPPERCASE']; ?>

            <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_PWDSEC_UPPERCASE_DESC']), $this);?>

        </td>
        <td valign="middle">
            <input type="hidden" name="passwordsetting_oneupper" value="0">
            <input name="passwordsetting_oneupper" id="passwordsetting_oneupper" type="checkbox" <?php if ($this->_tpl_vars['config']['passwordsetting']['oneupper']): ?>checked="checked"<?php endif; ?> value="1">
        </td>
        <td>&nbsp;</td><td>&nbsp;</td>
    </tr>

    <!-- Password should contains lowercase characters -->
    <tr>
        <td width="25%" scope="row" valign="middle">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_LOWERCASE']; ?>

            <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_PWDSEC_LOWERCASE_DESC']), $this);?>

        </td>
        <td valign="middle">
            <input type="hidden" name="passwordsetting_onelower" value="0">
            <input name="passwordsetting_onelower" id="passwordsetting_onelower" type="checkbox" <?php if ($this->_tpl_vars['config']['passwordsetting']['onelower']): ?>checked="checked"<?php endif; ?> value="1">
        </td>
        <td>&nbsp;</td><td>&nbsp;</td>
    </tr>

    <!-- Password should contains numbers -->
    <tr>
        <td width="25%" scope="row" valign="middle">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_NUMBERS']; ?>

            <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_PWDSEC_NUMBERS_DESC']), $this);?>

        </td>
        <td valign="middle">
            <input type="hidden" name="passwordsetting_onenumber" value="0">
            <input name="passwordsetting_onenumber" id="passwordsetting_onenumber" type="checkbox" <?php if ($this->_tpl_vars['config']['passwordsetting']['onenumber']): ?>checked="checked"<?php endif; ?> value="1">
        </td>
        <td>&nbsp;</td><td>&nbsp;</td>
    </tr>

    <!-- Password should contains special characters -->
    <tr>
        <td width="25%" scope="row" valign="middle">
            <?php echo $this->_tpl_vars['MOD']['LBL_PWDSEC_SPECCHAR']; ?>

            <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_PWDSEC_SPECCHAR_DESC']), $this);?>

        </td>
        <td valign="middle">
            <input type="hidden" name="passwordsetting_onespecial" value="0">
            <input name="passwordsetting_onespecial" id="passwordsetting_onespecial" type="checkbox" <?php if ($this->_tpl_vars['config']['passwordsetting']['onespecial']): ?>checked="checked"<?php endif; ?> value="1">
        </td>
        <td>&nbsp;</td><td>&nbsp;</td>
    </tr>

</table>