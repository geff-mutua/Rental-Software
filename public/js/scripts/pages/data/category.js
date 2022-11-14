/*=========================================================================================
    File Name: app-invoice-list.js
    Description: app-invoice-list Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';
  
    var dtInvoiceTable = $('.invoice-list-table'),
      assetPath = '../../../app-assets/',
      invoicePreview = 'app-invoice-preview.html',
      invoiceAdd = 'app-invoice-add.html',
      invoiceEdit = 'app-invoice-edit.html';
  
    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path');
      invoicePreview = '#';
      invoiceAdd = assetPath + 'app/invoice/add';
      invoiceEdit = assetPath + 'app/invoice/edit';
    }
  
    // datatable
    if (dtInvoiceTable.length) {
      var dtInvoice = dtInvoiceTable.DataTable({
        ajax: 'http://127.0.0.1:8000', // JSON file to add data
        autoWidth: false,
       
        columns: [
          // columns according to JSON
          {data:'no'},
          {data:'name'},
         
        ],
        columnDefs: [
          {
            // Invoice ID
            targets: 0,
            width: '46px',
            render: function (data, type, full, meta) {
              var $invoiceId = full['no'];
              // Creates full output for row
              var $rowOutput = '<span class="font-weight-bold" data-toggle="modal" data-target="#category">' + $invoiceId + '</span>';
              return $rowOutput;
            }
          },

          {
            // action
            targets: 2,
            render: function (data, type, full, meta) {
              var $invoiceId = full['id'];
              // Creates full output for row
              var $rowOutput = '<span class="font-weight-bold" data-feather="edit" data-toggle="modal" data-target="#category'+$invoiceId+'"></span>';
              return $rowOutput;
            }
          },

        
        ],
        order: [[0, 'asc']],
        dom:
          '<"row d-flex justify-content-between align-items-center m-1"' +
          '<"col-lg-6 d-flex align-items-center"l<"dt-action-buttons text-xl-right text-lg-left text-lg-right text-left "B>>' +
          '<"col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0"f<"invoice_status ml-sm-2">>' +
          '>t' +
          '<"d-flex justify-content-between mx-2 row"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: 'Search',
          searchPlaceholder: 'Search Invoice',
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },
        // Buttons with Dropdown
        buttons: [
        //   {
        //     text: 'Add Record',
        //     className: 'btn btn-primary btn-add-record ml-2',
        //     dataToggle:"modal" ,
        //     dataTarget:"#category"
            
        //   }
        ],
        // For responsive popup
        // responsive: {
        //   details: {
        //     display: $.fn.dataTable.Responsive.display.modal({
        //       header: function (row) {
        //         var data = row.data();
        //         return 'Details of ' + data['client_name'];
        //       }
        //     }),
        //     type: 'column',
        //     renderer: $.fn.dataTable.Responsive.renderer.tableAll({
        //       tableClass: 'table',
        //       columnDefs: [
        //         {
        //           targets: 2,
        //           visible: false
        //         },
        //         {
        //           targets: 3,
        //           visible: false
        //         }
        //       ]
        //     })
        //   }
        // },
        // initComplete: function () {
        //   $(document).find('[data-toggle="tooltip"]').tooltip();
        //   // Adding role filter once table initialized
        //   this.api()
        //     .columns(7)
        //     .every(function () {
        //       var column = this;
        //       var select = $(
        //         '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> Select Status </option></select>'
        //       )
        //         .appendTo('.invoice_status')
        //         .on('change', function () {
        //           var val = $.fn.dataTable.util.escapeRegex($(this).val());
        //           column.search(val ? '^' + val + '$' : '', true, false).draw();
        //         });
  
        //       column
        //         .data()
        //         .unique()
        //         .sort()
        //         .each(function (d, j) {
        //           select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
        //         });
        //     });
        // },
        // drawCallback: function () {
        //   $(document).find('[data-toggle="tooltip"]').tooltip();
        // }
      });
    }
  
  
  });
  