<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.typekit.net/yig5crv.css">	
    <script src="https://kit.fontawesome.com/8b0457928c.js" crossorigin="anonymous"></script>

<!-- Facebook Pixel Code -->
<script type='text/javascript'>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
</script>
<!-- End Facebook Pixel Code -->
<script type='text/javascript'>
  fbq('init', '396843427960365', {}, {
    "agent": "wordpress-5.2.9-2.0.2"
});
</script><script type='text/javascript'>
  fbq('track', 'PageView', []);
</script>
<!-- Facebook Pixel Code -->
<noscript>
<img height="1" width="1" style="display:none" alt="fbpx"
src="https://www.facebook.com/tr?id=396843427960365&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->
	
<!-- Facebook Domain verification -->
	<meta name="facebook-domain-verification" content="bbsy1bl3oilbto7yekmet1r27yu1v4" />
<!-- End Facebook Domain verification -->

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-39400436-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KRJJFJN');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRJJFJN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

<style>
/** Side Tab Sticky Button **/
#side-sticky-tab {
  position: fixed;
  top: 35vh;
  right: 50px;
	z-index: 3;
}

#side-sticky-tab div {
  margin: 0px;
  padding: 0px;
}

#side-sticky-tab .sticky-container{
   -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    -webkit-box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.05);
  box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.45);

  border-radius: 6px 6px 0px 0px;
  right: -168px;
  position:fixed;  
  transition-property: right;
  transition-duration: .6s;
}

#side-sticky-tab .sticky-container:hover{
  right: 0px;
}

#side-sticky-tab .callout {  
  position: relative;
  display:block;
  border-radius: 6px 6px 0px 0px;  
}


#side-sticky-tab .slideout {
  position:relative;
  vertical-align:middle;
  height: 180px;
  display:block;
  background-color: rgba(170,170, 170, .5);
   -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);  
}

#side-sticky-tab .slideout .inner{
  padding-top: 16%;
  padding-bottom: 16%;
  text-align:center;
  
}

#side-sticky-tab .callout a {
  color: white;
  background-color: #CC0000;
  height: 40px;
  width: 180px;
  margin: 0;
  padding: 0;
  z-index: 9999;
  display: block;
  text-align: center;
  font-size: 20px;
  line-height: 40px;
  font-weight: 600;
  border-radius: 6px 6px 0px 0px;
}

#side-sticky-tab a:hover {
 /* background-color: #8c0000;*/
}
#side-sticky-button {
	width: 180px;
	position: fixed;
	top: 25vh;
	right: -180px;
	z-index: 3;	
}

#side-sticky-button a {
	color: #fff;
	background-color: #D9A121;
	padding: 15px;
	transform-origin: 0 0;
  transform: rotate(90deg);
	font-size: 18px;
	line-height: 1;
	font-weight: bold;
	text-align: center;
	display: block;
	text-decoration: none;
	-webkit-box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.05);
  box-shadow: -10px 0px 25px -1px rgba(0, 0, 0, 0.45);
  border-radius: 0px 0px 6px 6px;	
	text-transform: uppercase;
}
#side-sticky-button a:hover,
#side-sticky-button a:active,
#side-sticky-button a:focus {
	background-color: #403A60 !important;
	color: #D9A121;
}
</style>
<div id="side-sticky-button">
  <a href="https://radiumhotsprings.reservationsystems.com/English/Availability_Check.asp" target="_blank">Book Your Stay</a>
</div>

</div>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
