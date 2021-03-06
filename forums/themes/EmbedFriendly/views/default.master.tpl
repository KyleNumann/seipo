<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head>
  {asset name='Head'}
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
</head>
<body id="{$BodyID}" class="{$BodyClass}">
  <div id="Frame">
	<header>
		<hgroup>
			<h1 class="site-title"><a href="http://seiowarentals.com" title="SEIPO Home" rel="home">SEIPO</a></h1>
			<h2 class="site-description">Southeast Iowa Property Owners</h2>
		</hgroup>
	</header>
	 <div class="Banner">
		<ul>
			<li><a href="http://seiowarentals.com" title="SEIPO Home" rel="home">Home</a>
		  {dashboard_link}
		  {discussions_link}
		  {activity_link}
		  {inbox_link}
		  {profile_link}
		  {custom_menu}
		  {signinout_link}
		</ul>
	 </div>
	 <div id="Body">
		<div class="Wrapper">
		  <div id="Panel">
			 <div class="SearchBox">{searchbox}</div>
			 {asset name="Panel"}
		  </div>
		  <div id="Content">
			 {asset name="Content"}
		  </div>
		</div>
	 </div>
	 <div id="Foot">
		<div><a href="{vanillaurl}"><span>Powered by Vanilla</span></a></div>
		{asset name="Foot"}
	 </div>
  </div>
</body>
</html>