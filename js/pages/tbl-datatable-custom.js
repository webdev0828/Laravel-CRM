'use strict';
$(document).ready(function() {
    // [ Zero-configuration ] start
    $('#user-table-configuration').DataTable();
  
    $('#todo-table').DataTable({
        columnDefs: [
            { type: 'numeric-comma', targets: 0 }
          ]
    });
   
    $('#todo-show-table').DataTable({
        dom: 'frtip',
        aaaSorting: [[ 0, "desc" ]]
    });
    
    //task table
    setTimeout(function() {
        $('#tasktable').DataTable();
    }, 600);
    
    //logs table
    $('#logstable').DataTable({
        columnDefs: [
            { type: 'numeric-comma', targets: 0 }
          ]
    });
   
});
