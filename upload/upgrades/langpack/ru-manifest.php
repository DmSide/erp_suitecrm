<?PHP
/******************************************
 * SuiteCRM Translations
 * @URL: https://crowdin.com/project/suitecrmtrans
 * @author SuiteCRM Community via Crowdin
 ******************************************/
$manifest = array( 
	'name' => 'Russian (Russia)',
	'description' => 'Перевод: www.crowdin.com/project/suitecrmtranslations',
	'type' => 'langpack',
	'is_uninstallable' => 'Yes',
	'acceptable_sugar_versions' =>
		  array (),
	'acceptable_sugar_flavors' =>
		  array('CE'),
	'author' => 'Сообщество SuiteCRM',
	'version' => '7.11.3.01',
	'published_date' => '2019-04-03',
      );
$installdefs = array(
	'id'=> 'ru_RU',
	'image_dir'=>'<basepath>/images',
	'copy' => array(
	array('from'=> '<basepath>/include','to'=>'include'),
	array('from'=> '<basepath>/modules','to'=>'modules'),
	array('from'=> '<basepath>/install','to'=>'install'),
   )
 );
?>