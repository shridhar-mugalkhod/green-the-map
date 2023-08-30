// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

 
$('#dataTable tbody').on('click','.btn',function() {
    $(this).closest('tr').remove();
});