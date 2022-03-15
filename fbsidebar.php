<?php
/*
Plugin Name: Hello World
Description: Echos "Hello World" in footer of theme
Version: 1.0
Author: Chris Cagle
Author URI: http://www.cagintranet.com/
*/
 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'fb sidebar', 	//Plugin name
	'1.0', 		//Plugin version
	'Mateusz Skrzypczak',  //Plugin author
	'http://www.multicolor.stargard.pl', //author website
	'Add fb sidebar to your website', //Plugin description
	'plugins', //page type - on which admin tab to display
	'fbsidebar_active'  //main function (administration)
);
 
 
register_style('fbsidebarstyle','/plugins/fbsidebar/css/style.css', GSVERSION, 'screen');

queue_style('fbsidebarstyle',GSBOTH);  







# activate filter 
add_action('theme-header','fbslider'); 
 
# add a link in the admin tab 'theme'
add_action('plugins-sidebar','createSideMenu',array($thisfile,'Fb sidebar settings'));
 
# functions
function fbslider() {
	
	$plugin_id = 'fbsidebar';
 
// Set up the folder name and its permissions
// Note the constant GSDATAOTHERPATH, which points to /path/to/getsimple/data/other/
$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$filename      = $folder . 'fb.txt';
	echo '<div id="fb" class="">
	  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2F';echo 'https://web.facebook.com/';	echo file_get_contents($filename) ;echo '?_rdc=1&_rdr'; echo'&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		  
	  </div>';
}
 
function fbsidebar_active() {
// Set up the data

 $plugin_id = 'fbsidebar';
 
// Set up the folder name and its permissions
// Note the constant GSDATAOTHERPATH, which points to /path/to/getsimple/data/other/
$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$filename      = $folder . 'fb.txt';
$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);
 
// Save the file (assuming that the folder indeed exists)


  
echo' <b>Your fb </b> (example: Getsimplecms) works only on fb fanpage on firm site ';  echo file_get_contents($filename); echo'<br><br>';

  
  	echo'

	
	 <form  action="#" style="margin:0 auto;" method="POST">
 <b>FB name</b><br><input type="text" style="width:90%;padding:10px;border-radius:5px;"  name="fb" />


    <input type="submit" name="submit" style="background:#000;color:#fff;padding:10px;margin-top:10px;border:solid 0 ;border-radius:10px;" value="Save settings" />
  </form>';

  
  echo' <p style="color:#343434;margin-top:20px;">Add "facebook sidebar" to your website on mobilephone fb sidebar by Multicolor</p>';

 	    
  if(isset($_POST['submit'])){
$fbe = $_POST['fb'];
  file_put_contents($filename, $fbe);

  
  echo '<div style="width:90%;background:green;color:#fff;border-radius:5px;padding:10px;text-align:center;">ok ! ';
  echo 'your fb: '; echo file_get_contents($filename);
  echo'</div>';

}

}
?>