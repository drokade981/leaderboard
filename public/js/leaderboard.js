
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "serverSide": true,
        "ajax": { 
            "url" : baseUrl,
            "method" : "GET",
                data: function (d) {
                d.per_page = d.length;
                d.page = (d.start / d.length) + 1;
                d.column = d.order[0].name;
                d.sortdir = d.order[0].dir;
                d.search = d.search.value;
                d.filter = $('#filter').val();
            },
            dataSrc: function(json) {
                json.recordsTotal = json.meta.total;
                json.recordsFiltered = json.meta.total;
                return json.data;
            },
        },
        
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'points', name: 'points'},
            {
                data: function () {
                    return '-';                     
                }
            }
        ],               
        createdRow: function(row, data, dataIndex) {
            var pageInfo = table.page.info();
            
            if (data.points != 0 ) {
                $('td:eq(3)', row).html(pageInfo.start + dataIndex + 1);
            } else {
                $('td:eq(3)', row).html('-');            

            }
        }
    });

    $('#filter').change(function() {
        table.ajax.reload();
    });

    $('#recalculate').click(function() {
        table.ajax.reload();
    });
});
 