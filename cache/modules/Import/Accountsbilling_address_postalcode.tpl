
{if strlen($fields.billing_address_postalcode.value) <= 0}
{assign var="value" value=$fields.billing_address_postalcode.default_value }
{else}
{assign var="value" value=$fields.billing_address_postalcode.value }
{/if}  
<input type='text' name='{$fields.billing_address_postalcode.name}' 
    id='{$fields.billing_address_postalcode.name}' size='30' 
    maxlength='20' 
    value='{$value}' title=''  tabindex='1'      >