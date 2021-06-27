<?php

class CollegeInsiderTemplate extends BaseTemplate {
	private function doNavLink( $name, $showClass = true ) {
		$url = wfMessage( "collegeinsider-nav-$name-url" )->text();
		$url = Title::newFromText( $url );
		$url = $url->getLinkURL();
		$text = wfMessage( "collegeinsider-nav-$name" )->escaped();
		$attr = $showClass ? " class=\"$name\"" : '';
?><li<?=$attr?>><a href="<?=$url?>"><?=$text?></a></li>
<?php
	}
	public function execute() {
		global $wgRequest, $wgRightsPage, $wgRightsIcon, $wgRightsUrl, $wgRightsText;

		$session = $wgRequest->getSession();
		$showLanding = !$session->get( 'collegeinsider-landed', false );
		$session->set( 'collegeinsider-landed', true );
		$imgPath = $this->get('stylepath') . '/' . $this->getSkin()->stylename . '/resources/images';
		$this->html( 'headelement' );
?>
<div id="navigation">
	<div class="inner">
		<h1>
			<img id="logo" alt="HKUGAC Logo" src="<?=$imgPath?>/logo.jpg" height="100px" />
			<span id="header">
				<img src="<?=$imgPath?>/wordmark.png" />
				<div id="tagline"><?=wfMessage( 'collegeinsider-tagline' )->escaped()?></div>
			</span>
		</h1>
	</div>
	<ul>
		<div class="inner" style="border: 0">
<?php
		$this->doNavLink( 'home' );
		$this->doNavLink( 'interviews' );
		$this->doNavLink( 'articles' );
?><li class="anthology droppeddown">
	<a><?=wfMessage( 'collegeinsider-nav-studentwork' )->escaped()?></a>
	<ul class="dropdown">
<?php
		$this->doNavLink( 'anthology' );
		$this->doNavLink( 'radio' );
?>	</ul>
</li>
<?php
		$this->doNavLink( 'events' );
?>
<li class="bulletin">
	<a href="<?=wfMessage( 'collegeinsider-nav-bulletin-url' )->escaped()?>">
		<?=wfMessage( 'collegeinsider-nav-bulletin' )->escaped()?>
	</a>
</li>
<li class="fa-navli"><a
	class="fa-instagram"
	href="<?=wfMessage( 'collegeinsider-nav-instagram-url' )->escaped()?>"
></a></li>
<li class="fa-navli"><a
	class="fa-facebook"
	href="<?=wfMessage( 'collegeinsider-nav-facebook-url' )->escaped()?>"
></a></li>
		</div>
	</ul>
	<div id="navlist-toggle" class="mobile">
		<?=wfMessage( 'collegeinsider-nav-contents' )->escaped()?>
	</div>
	<ul id="navlist" class="hidden mobile">
<?php
		$this->doNavLink( 'home', false );
		$this->doNavLink( 'interviews', false );
		$this->doNavLink( 'articles', false );
		$this->doNavLink( 'anthology', false );
		$this->doNavLink( 'radio', false );
		$this->doNavLink( 'events', false );
?><li><a href="<?=wfMessage( 'collegeinsider-nav-bulletin-url' )->escaped()?>">
	<?=wfMessage( 'collegeinsider-nav-bulletin' )->escaped()?>
</a></li>
	</ul>
</div>
<div id="view">
	<article class="inner article" id="content" role="main">
<?php if ( $this->data['newtalk'] ) { ?>
		<div id="newtalk"><?php $this->html( 'newtalk' ); ?></div>
<?php }
if ( $this->data['sitenotice'] ) { ?>
		<div id="siteNotice"><?php $this->html( 'sitenotice' ); ?></div>
<?php } ?>
		<div>
			<?=$this->getIndicators()?>
			<h2 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ); ?></h2>
		</div>
<?php if ( $this->data['subtitle'] ) { ?>
		<p id="contentSub"><?php $this->html( 'subtitle' ); ?></p>
<?php }
if ( $this->data['undelete'] ) { ?>
		<p><?php $this->html( 'undelete' ); ?></p>
<?php }
		if ( $this->data['catlinks'] ) $this->html( 'catlinks' );
		$this->html( 'bodytext' );
		$this->html( 'dataAfterContent' );
?>
		<ul id="footlinks">
<?php foreach ( $this->getFooterLinks('flat') as $key ) { ?>
			<li><?php $this->html( $key ); ?></li>
<?php }
if ( !empty( $wgRightsIcon ) ) { ?>
			<br/>
			<a href="<?=
				!empty( $wgRightsPage )
				? Title::newFromText( $wgRightsPage )->getLinkURL()
				: $wgRightsUrl
			?>"><img style="float: right" alt="<?=$wgRightsText?>" src="<?=$wgRightsIcon?>" /></a>
<?php } ?>
		</ul>
	</article>
</div>
<?php if ( $showLanding ) { ?>
<div class="landing"><div>
	<h1><img src="<?=$imgPath?>/wordmark.png" /></h1>
	<div class="inner">
		<?=wfMessage( 'collegeinsider-landing' )->parse()?>
	</div>
	<button id="landing-hide" onclick="document.querySelector('.landing').remove();">
		<?=wfMessage( 'collegeinsider-enter' )->escaped()?>
	</button>
</div></div>
<?php } ?>
<script>
(function() {
	var contents = document.getElementById('navlist');
	document.getElementById('navlist-toggle').addEventListener('click', function() {
		if (contents.classList.contains('hidden')) {
			contents.classList.remove('hidden');
		} else {
			contents.classList.add('hidden');
		}
	});
})();
</script>
<?php
		$this->printTrail();
	}
}