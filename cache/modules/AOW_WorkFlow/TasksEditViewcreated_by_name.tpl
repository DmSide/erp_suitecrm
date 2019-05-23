
<input type="text" name="{$fields.created_by_name.name}" class="sqsEnabled" tabindex="1" id="{$fields.created_by_name.name}" size="" value="{$fields.created_by_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.created_by_name.id_name}" 
	id="{$fields.created_by_name.id_name}" 
	value="{$fields.created_by.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.created_by_name.name}" id="btn_{$fields.created_by_name.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
    "{$fields.created_by_name.module}", 
	600, 
	400, 
	"", 
	true, 
	false, 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.created_by_name.id_name}"{literal},"user_name":{/literal}"{$fields.created_by_name.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.created_by_name.name}" id="btn_clr_{$fields.created_by_name.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.created_by_name.name}', '{$fields.created_by_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.created_by_name.name}']) != 'undefined'",
		enableQS
);
</script>