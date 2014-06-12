jQuery(document).ready(function(){
	var SYM_URL = Symphony.Context.get('symphony')+'/';
	var ROOT = Symphony.Context.get('root')+'/';
	var extdd = ROOT+'extensions/ddslick/images/';
	var extDIR = SYM_URL+'extension/ddslick/options/';
	var ddslick = jQuery('.field-select').find('select[name*="ddslick"]');
	var selected = jQuery('.field-select').find('select[name*="ddslick"] option').filter(':selected').attr('value');	
	var selectname = ddslick.attr('name');		
	var jqxhr = jQuery.getJSON( extDIR, function(data) {		
		ddslick.empty();		
		jQuery.each(data.success,function(i,e){
			var option = jQuery('<option></option>');
			if(selected == e.text){
				option.attr('selected','selected');
			}
			option.attr('value',e.text);
			option.text(e.text);
			option.attr('data-description',e.description);
			option.attr('data-imageSrc',extdd+e.imageSrc);
			ddslick.append(option);			
		});		
	})
	  .done(function(json) {				
		ddslick.ddslick({
			onSelected: function(data){
				displaySelectedData(data.selectedData.imageSrc);
			}
		});
		jQuery('div.dd-container').find('div.dd-select').find('input.dd-selected-value').attr('name',selectname);
		 var container = jQuery('.dd-container');
			container.on('change',function(){
				jQuery(this).find('input.dd-selected-value').attr('name',selectname);
			
			});
	  })
	  .fail(function() {
		console.log( "error" );
	  });
	
	function displaySelectedData(imagesrc){
		
	}
});