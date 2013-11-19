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
		$output->addHTML('<div id="languagedata" class="languagedatacss">');
		$path = __DIR__ . '/langdatadump_wmf.json';
		$string = file_get_contents($path)
		 	or die("Error opening output file");
		
		$json_a=json_decode($string,true);
		$show_iso = '<div class="info-row" ><div class="row-title">Language ISO Code</div><div class="row-status">' . $json_a[$lang]['langcode_iso'] . '</div></div>';
		$show_uls = '<div class="info-row" ><div class="row-title">ULS Support</div><div class="row-status">' . ($json_a[$lang]['jquery_uls'] ? '&#x2714' : '&#x2718') . '</div></div>';
		$show_tra = '<div class="info-row" ><div class="row-title">Translation Support</div><div class="row-status">' . ($json_a[$lang]['translate'] ? '&#x2714' : '&#x2718') . '</div></div>';
		$show_dic = '<div class="info-row" ><div class="row-title">Dictionary Support</div><div class="row-status">' . ($json_a[$lang]['dictionary'] ? '&#x2714' : '&#x2718') . '</div></div>';
		$show_gra = '<div class="info-row" ><div class="row-title">Grammar Support</div><div class="row-status">' . ($json_a[$lang]['grammar'] ? '&#x2714' : '&#x2718') . '</div></div>';
		$show_spe = '<div class="info-row" ><div class="row-title">Spellcheker Support</div><div class="row-status">' . ($json_a[$lang]['spellchecker'] ? '&#x2714' : '&#x2718') . '</div></div>';

		$output->addHTML($show_iso);// . $show_uls . $show_tra . $show_dic . $show_spe);
		$output->addHTML($show_uls);
		$output->addHTML($show_tra);
		$output->addHTML($show_dic);
		$output->addHTML($show_spe);
		$output->addHTML('</div>');
		$output->addModules( 'ext.LanguageSupport' );

	}
}
?>