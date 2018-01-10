<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo (!$titulo_pg)?'Hoop78 - Basquete. Um esporte. Um estilo de vida':$titulo_pg;?></title>
    <meta property="og:title" content="<?php echo (!$titulo_pg)?'Hoop78 - Basquete. Um esporte. Um estilo de vida':$titulo_pg;?>" />
    <meta property="og:site_name" content="Hoop78">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <meta property="og:description" content="<?php echo (!$lead_pg)?"Basquete um estilo de vida. NBA, design, fotografia e música.":$lead_pg?>" />
    <meta property="og:url" content="<?php echo (!$url_pg)?'http://www.hoop78.com':$url_pg?>" />
	<meta property="og:image" content="<?php echo (!$img_pg)?ROOT.'img/logo.png':$img_pg?>">
	<meta property="og:image:type" content="image/jpeg">
	<?php if($img_pg==""):?>
	<meta property="og:image:width" content="800"> 
	<meta property="og:image:height" content="800"> 
	<?php endif;?> 
	<meta property='og:type' content='website' />
    <meta property="og:locale" content="pt_BR">
    <link rel="stylesheet" href="<?php echo ROOT?>css/foundation-min.css" />
    <link rel="stylesheet" href="<?php echo ROOT?>css/main-min.css" />
    <link href="https://fonts.googleapis.com/css?family=Armata|Glegoo:400,700" rel="stylesheet">
    <script src="<?php echo ROOT?>js/vendor/modernizr.js"></script>
	
	<script>
	var root= '<?php echo ROOT?>';
	var url = '<?php echo URL?>';
	var refer = '<?php echo $total.'.'.$url[0].'.'.$slug_pg?>';
	</script>
	
	<!-- Facebook Pixel Code -->
	
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '1149711371720416');
	  fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	  src="https://www.facebook.com/tr?id=1149711371720416&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
	
	
	  <!--Google Ad Sense-->

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-9403421182725373",
		enable_page_level_ads: true
	  });
	</script>

	
  </head>
  
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=142635469155863";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>