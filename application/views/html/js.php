<script>
    
$(document).ready(function(){
    $('#root').mouseover(function(){
        $('#dropdown').css('display','block');
    });
    
    $('#root2').mouseover(function(){
        $('#dropdown2').css('display','block');
    });
    
    $('html').click(function(){
        $('#dropdown').css('display','none');
        $('#dropdown2').css('display','none');
    });
    
    $('.add').click(function(){
        
        var newContent = $('<div id="dialog-foodprise"></div>');
        var dlg = newContent.dialog({
    		autoOpen:false,
    		resizable:false,
    		width:850,
    		height:400,
    		modal:true,
                dialogClass:'custom-dialog',
    		title: "Add a Froodprise", 
    		close:function(){ 
    			$('#dialog-login').dialog('close');
    		}
    	});
    	dlg.load('<?php echo site_url('NodeController/add1');?>', function(){
            dlg.dialog('open');
        }); 
    });
    
    $('.search').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            search();
        }
    });
    
    $('.infinite-container').waypoint('infinite', {
        container: 'auto',
        items: '.infinite-item',
        more: '.infinite-more-link',
        offset: 'bottom-in-view',
        loadingClass: 'infinite-loading',
        onBeforePageLoad: $.noop,
        onAfterPageLoad: $.noop
      });
    
});

setInterval('hideDropdown()',8000);

function hideDropdown(){
    $('#dropdown').css('display','none');
    $('#dropdown2').css('display','none');
}

function search(){
    var query = $('#search-header').val();
    document.title = "Search: "+query;
    query= query.replace(" ","_");
    var request = $.ajax({
        type: "GET",
        url: '<?=site_url('NodeController/search')?>/'+query
    });
    request.done(function (response, textStatus, jqXHR){
        $('#node-list').html(response);
    });
}



</script>