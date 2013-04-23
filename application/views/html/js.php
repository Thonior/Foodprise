<script>
    
$(document).ready(function(){
    $('#root').mouseover(function(){
        $('#dropdown').css('display','block');
    });
    
    $('html').click(function(){
        $('#dropdown').css('display','none');
    });
    
});

setInterval('hideDropdown()',8000);

function hideDropdown(){
    $('#dropdown').css('display','none');
}
</script>