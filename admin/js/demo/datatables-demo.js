// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": { // Para establecer el español en la DataTable | Por defecto es en inglés
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    } 
  });
});
