$(document).ready(function() {
  $('.flash-message-success').animate({opacity: 1.0}, 3000).slideUp("slow");
  $('.flash-message-error').animate({opacity: 1.0}, 3000).slideUp("slow");
  $('.flash-message-info').animate({opacity: 1.0}, 3000).slideUp("slow");
  $('.flash-message-warning').animate({opacity: 1.0}, 3000).slideUp("slow");
});
/*
return back

*/
function back()
{
	window.history.back();
}
/* checkall checkbox */

function chkallClick(id) {
	    if($("#"+id).is(':checked')) { 
            $(".mulchk").attr ( "checked" ,"checked" );
        }else{
            $(".mulchk").removeAttr('checked');        
        }

}
/* read file image and show */
function showImage(input,idTagImg, width,height) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+idTagImg)
                        .attr('src', e.target.result)
                        .width(width)
                    .height(height);
                };

              reader.readAsDataURL(input.files[0]);
            }
     }

