<?php
$popupMeta = array (
    'moduleMain' => 'Documents',
    'varName' => 'DOCUMENTS',
    'orderBy' => 'name',
    'whereClauses' => array (
  'filename' => 'documents.filename',
  'name' => 'documents.name',
),
    'searchInputs' => array (
  0 => 'filename',
  1 => 'name',
),
    'searchdefs' => array (
  'filename' => 
  array (
    'type' => 'file',
    'label' => 'LBL_FILENAME',
    'width' => '10%',
    'name' => 'filename',
  ),
  'name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
),
    'listviewdefs' => array (
  'FILENAME' => 
  array (
    'type' => 'file',
    'label' => 'LBL_FILENAME',
    'width' => '10%',
    'default' => true,
  ),
  'DOCUMENT_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
),
);
