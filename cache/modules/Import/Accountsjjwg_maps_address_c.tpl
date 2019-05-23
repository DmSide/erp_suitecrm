
{if strlen($fields.jjwg_maps_address_c.value) <= 0}
{assign var="value" value=$fields.jjwg_maps_address_c.default_value }
{else}
{assign var="value" value=$fields.jjwg_maps_address_c.value }
{/if}  
<input type='text' name='{$fields.jjwg_maps_address_c.name}' 
    id='{$fields.jjwg_maps_address_c.name}' size='30' 
    maxlength='255' 
    value='{$value}' title='Address'  tabindex='1'      >