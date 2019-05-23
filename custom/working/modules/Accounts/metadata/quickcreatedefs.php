<?php
$viewdefs ['Accounts'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_fax',
          ),
          1 => 
          array (
            'name' => 'phone_alternate',
            'comment' => 'An alternate phone number',
            'label' => 'LBL_PHONE_ALT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'jjwg_maps_address_c',
            'label' => 'LBL_JJWG_MAPS_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_city',
            'comment' => 'The city used for billing address',
            'label' => 'LBL_BILLING_ADDRESS_CITY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_state',
            'comment' => 'The state used for billing address',
            'label' => 'LBL_BILLING_ADDRESS_STATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_postalcode',
            'comment' => 'The postal code used for billing address',
            'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_country',
            'comment' => 'The country used for the billing address',
            'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'account_type',
          ),
          1 => 
          array (
            'name' => 'industry',
          ),
        ),
      ),
    ),
  ),
);
;
?>
