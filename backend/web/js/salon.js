 $(document).ready(function() {
     $('.repeat_type').click(function(){
         if ($(this).val() == 'day_of_week') {
             $('#repeat_day_of_week').show();
             $('#repeat_day_specified').hide().attr('disabled', 'disabled');
         } else if ($(this).val() == 'day_specified') {
             $('#repeat_day_of_week').hide().attr('disabled', 'disabled');
             $('#repeat_day_specified').show();
         }
     });
 });