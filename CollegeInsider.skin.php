<?php

class SkinCollegeInsider extends SkinTemplate {
	var $skinname = 'collegeinsider', $stylename = 'CollegeInsider',
		$template = 'CollegeInsiderTemplate', $useHeadElement = true;

	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModuleStyles( [
			'mediawiki.skinning.interface', 'skins.collegeinsider'
		] );
		$out->addMeta(
			'viewport',
			'user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height'
		);
	}
}