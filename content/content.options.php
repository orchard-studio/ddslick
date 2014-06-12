<?php
	ini_set('xdebug.var_display_max_depth', 500);
	ini_set('xdebug.var_display_max_children', 2048);
	ini_set('xdebug.var_display_max_data', 28186);
	ini_set('max_execution_time', 200);
	if(!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

	require_once(EXTENSIONS . '/extension_downloader/lib/require.php');
	
	class contentExtensionDDslickOptions extends JSONPage {
	
	public function view() {
		$json_url = EXTENSIONS."/ddslick/assets/js/options.json";
		$json = file_get_contents($json_url);
		$data = json_decode($json);
		//$results = array();
		
		//f//oreach($data as $opt => $optval){
			//$results[] = '<option value="'.$optval->value.'" data-description="'.$optval->description.'" data-imagesrc="'.URL.'/extensions/ddslick/images/'.$optval->imageSrc.'">'.$optval->text.'</option>';
		//}	
		
		$this->_Result['success'] =$data;// implode('',$results);	
	}
	
	}
?>