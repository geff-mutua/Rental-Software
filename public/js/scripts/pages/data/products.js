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
    invoiceEdit = '/products/{photo}/edit';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    invoicePreview = assetPath + 'app/invoice/preview';
    invoiceAdd = assetPath + 'app/invoice/add';
    invoiceEdit = assetPath + 'app/invoice/edit';
  }

  // datatable
  if (dtInvoiceTable.length) {
    var dtInvoice = dtInvoiceTable.DataTable({
      ajax: 'http://127.0.0.1:8000/api/products', // JSON file to add data
      autoWidth: false,
      columns: [
        // columns according to JSON
        { data: 'no' },
        { data: 'id' },
        { data: 'model' },
        { data: 'issued_date' },
        { data: 'name' },
        { data: 'total' },
        { data: 'stock' },
        { data: 'model' },
        {data:'image'},
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          targets: 0
        },
        {
          // Invoice ID
          targets: 1,
          width: '46px',
          render: function (data, type, full, meta) {
            var $id = full['id'];
            // Creates full output for row
            var $rowOutput = '<a class="font-weight-bold" href="' + invoicePreview + '"> ' + $id + '</a>';
            return $rowOutput;
          }
        },
        {
          // Invoice status
          targets: 2,
          width: '42px',
          render: function (data, type, full, meta) {
            var $model = full['model']
            return (
             '<span >' +$model  + '</span>'
            );
          }
        },
        {
          // Client name and Service
          targets: 3,
          responsivePriority: 4,
          width: '270px',
          render: function (data, type, full, meta) {
            var $name = full['name'];
            
            var $rowOutput =
    
              '<h6 class="user-name text-truncate mb-0">' +
              $name +
              '</h6>' 
              
            return $rowOutput;
          }
        },
        {
   
          targets: 4,
          width: '73px',
          render: function (data, type, full, meta) {
            var $category = full['category'];
            return '<span class="d-none">' + $category + '</span>' + $category;
          }
        },
        {
          // Due Date
          targets: 5,
          width: '130px',
          render: function (data, type, full, meta) {
            var $unit = full['unit'];
            // Creates full output for row
            var $rowOutput =
            '<span >' +$unit  + '</span>'
              
            return $rowOutput;
          }
        },
        {
          // Client Balance/Status
          targets: 6,
          width: '98px',
          render: function (data, type, full, meta) {
            var $stock = full['stock'];
            return (
                '<span >' +$stock  + '</span>'
               );
          }
        },
        {
          targets: 7,
          visible: false
        },
        {
          targets: 8,
          render: function (data, type, full, meta) {
            var $total = full['image'];
            return '<img src="'+assetPath+'product/'+$total+'" alt="image" width="20" height="20">';
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          width: '80px',
          orderable: false,
          render: function (data, type, full, meta) {
            var $id = full['id'];
            return (
              '<div class="d-flex align-items-center col-actions">' +
              '<a class="mr-1" href="products/'+$id+'/edit" data-toggle="tooltip" data-placement="top" title="Edit Product">' +
              feather.icons['edit'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +
              '<a class="mr-1" href="' +
              invoicePreview +
              '" data-toggle="tooltip" data-placement="top" title="Delete Product">' +
              feather.icons['trash'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +

              '</div>' +
              '</div>'
            );
          }
        }
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
        searchPlaceholder: 'Search Product',
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      // Buttons with Dropdown
      buttons: [
        
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return '' + data['name'];
            }
          }),
          type: 'column',
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table',
            columnDefs: [
              {
                targets: 2,
                visible: false
              },
              {
                targets: 3,
                visible: false
              }
            ]
          })
        }
      },
      initComplete: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
        // Adding role filter once table initialized
        this.api()
          .columns(7)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.unit')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      },
      drawCallback: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
      }
    });
  }



});
