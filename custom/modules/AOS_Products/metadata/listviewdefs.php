<?php
$listViewDefs ['AOS_Products'] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'RESPONSE_ENGINEER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RESPONSE_ENGINEER',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'INVENTORY_NUMBER_S_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_INVENTORY_NUMBER_S',
    'width' => '10%',
  ),
  'PART_NUMBER' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PART_NUMBER',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => true,
    'module' => 'Users',
    'link' => true,
    'id' => 'CREATED_BY',
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
);
;
?>
