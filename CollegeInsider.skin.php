<?php

class SkinCollegeInsider extends SkinTemplate {
	var $skinname = 'collegeinsider', $stylename = 'CollegeInsider',
		$template = 'CollegeInsiderTemplate', $useHeadElement = true;


	public function __construct( $options = [] ) {
		// bodyOnly property for MediaWiki >= 1.39
		// More information: https://phabricator.wikimedia.org/T306942
		$options['bodyOnly'] = true;
		parent::__construct( $options );
	}

	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModuleStyles( [
			'skins.collegeinsider'
		] );
		$out->addMeta(
			'viewport',
			'user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height'
		);
		$out->addLink( [
			'rel' => 'stylesheet',
			'href' => 'https://fonts.googleapis.com/css?family=Laila|Arimo|Roboto|Nanum+Pen+Script'
		] );
		$out->addLink( [
			'rel' => 'stylesheet',
			'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
		] );
	}
}
