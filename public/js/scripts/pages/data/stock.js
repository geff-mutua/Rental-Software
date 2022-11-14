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
        //   { data: 'id' },
          { data: 'name' },
            { data: 'model' },
            { data: 'buy_price' },
          { data: 'sale_price' },
          { data: 'in_qnty' },
          { data: 'out_qnty' },
          { data: 'stock' },
          { data : 'stock_buy_price'},
          { data : 'stock_sale_price'}
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
      });
    }
  
  
  
  });
  