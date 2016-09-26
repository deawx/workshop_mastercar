$(document).ready(function () {
  if($('.datatable-1').length>0){
    $('.datatable-1').dataTable();
    $('.dataTables_paginate').addClass('btn-group datatable-pagination');
    $('.dataTables_paginate > a').wrapInner('<span />');
    $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
    $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
  }
  $('.datepicker').datepicker({language:'th',format:'dd/mm/yyyy',todayHighlight:'true',autoclose:'true'});
});
