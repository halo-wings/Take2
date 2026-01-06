<script>
$(document).ready(function() {

	$("#menu_home").mouseover(function () {
	  $("#bande1").css('display', 'block');
	});
	$("#menu_home").mouseout(function () {
	  $("#bande1").css('display', 'none');
	});
	<?php
	if ($section != "research")
	{
		?>
		$("#menu_research").mouseover(function () {
		  $(".container_sous_menu").css('display', 'block');
		  $("#bande2").css('display', 'block');
		});
		$("#menu_research").mouseout(function () {
		  $(".container_sous_menu").css('display', 'none');
		  $("#bande2").css('display', 'none');
		});
		$(".container_sous_menu").mouseover(function () {
		  $(".container_sous_menu").css('display', 'block');
		  $("#bande2").css('display', 'block');
		});
		$(".container_sous_menu").mouseout(function () {
		  $(".container_sous_menu").css('display', 'none');
		  $("#bande2").css('display', 'none');
		});
		$("#bande2").mouseover(function () {
		  $(".container_sous_menu").css('display', 'block');
		  $("#bande2").css('display', 'block');
		});
		$("#bande2").mouseout(function () {
		  $(".container_sous_menu").css('display', 'none');
		  $("#bande2").css('display', 'none');
		});
		<?php
	}
	else
	{
		?>
		$("#bande2").css('display', 'block');
		<?php
	}
	?>
	$("#menu_members").mouseover(function () {
	  $("#bande3").css('display', 'block');
	});
	$("#menu_members").mouseout(function () {
	  $("#bande3").css('display', 'none');
	});
	
	$("#menu_contact").mouseover(function () {
	  $("#bande4").css('display', 'block');
	});
	$("#menu_contact").mouseout(function () {
	  $("#bande4").css('display', 'none');
	});

	
	
	/*$(".typeface-js a,a.typeface-js").hover(
        function(){
			if(!$(this).hasClass('remove_typeface')){
				if(!$(this).hasClass('typeface-js-hover-checked')){
					$(this).wrapInner('<span class="typeface-js-normal"></span>').append($('<span class="typeface-js-hover"></span>').text($(this).text()).css('color',$(this).css('color'))).addClass('typeface-js-hover-checked');
					_typeface_js.renderDocument();
				}
				$(this).find('.typeface-js-normal').hide();
				$(this).find('.typeface-js-hover').show();
			}
        },
        function(){
            if(!$(this).hasClass('remove_typeface')){
				$(this).find('.typeface-js-normal').show();
				$(this).find('.typeface-js-hover').hide();
			}
        }
    );*/
	
	// ON DONNE L'EMPLACEMENT ICI POUR LES BANDES BLEUES DU MENU POUR MAC
	if(navigator.userAgent.indexOf('Mac') > 0)
	{
		$("#bande2").css('margin-left', '405px');
		$("#bande3").css('margin-left', '492px');
		$("#bande4").css('margin-left', '574px');
	}
 });


</script>

