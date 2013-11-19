<?php
class SpecialLanguageSupport extends SpecialPage {
	function __construct() {
		parent::__construct( 'LanguageSupport' );
	}

	function execute( $par ) {
		global $wgUserLanguage;
		//$lang = wgUserLanguage;
		$lang = 'gu';
		$request = $this->getRequest();
		$output = $this->getOutput();
		$this->setHeaders();
                //$param = $request->getText( 'param' );
		$output->setPageTitle('Language Support Data');
		$output->addHTML('<div id="languagedata"></div>');
		$path = __DIR__ . '/langdatadump_wmf.json';
		$string = file_get_contents($path)
		 	or die("Error opening output file");
		
		$json_a=json_decode($string,true);
		$show_iso = '* Language ISO Code : ' . $json_a[$lang]['langcode_iso'];
		$show_uls = '* ULS Support : ' . ($json_a[$lang]['jquery_uls'] ? 'Yes' : 'No');
		$show_tra = '* Translation Support : ' . ($json_a[$lang]['translate'] ? 'Yes' : 'No');
		$show_dic = '* Dictionary Support : ' . ($json_a[$lang]['dictionary'] ? 'Yes' : 'No');
		$show_gra = '* Grammar Support : ' . ($json_a[$lang]['grammar'] ? 'Yes' : 'No');
		$show_spe = '* Spellcheker Support : ' . ($json_a[$lang]['spellchecker'] ? 'Yes' : 'No');

		$output->addWikiText($show_iso);// . $show_uls . $show_tra . $show_dic . $show_spe);
		$output->addWikiText($show_uls);
		$output->addWikiText($show_tra);
		$output->addWikiText($show_dic);
		$output->addWikiText($show_spe);
		//$output->addModules( 'ext.LanguageSupport' );

	}
}
?>