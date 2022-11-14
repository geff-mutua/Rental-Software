/*=========================================================================================
    File Name: pricing.js
    Description: pricing page js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  // variables
  var priceSwitch = $('#priceSwitch'),
    priceStandardValue = $('.pricing-standard-value'),
    priceEnterpriseValue = $('.pricing-enterprise-value'),
    enterpriseAnnualPricing = $('.enterprise-pricing .annual-pricing'),
    standardAnnualPricing = $('.standard-pricing .annual-pricing'),
    standardAnnualPlan = 209,
    standardMonthlyPlan = 19,
    enterpriseAnnualPlan = 495,
    enterpriseMonthlyPlan = 45;

  // price and duration change on switch button toggle
  priceSwitch.on('change', function () {
    if ($(this).is(':checked')) {
      // for enterprise plan
      var enterpriseMonthValue = enterpriseAnnualPlan / 11;
      priceEnterpriseValue.html(enterpriseMonthValue);
      enterpriseAnnualPricing.removeClass('d-none').html('USD ' + enterpriseAnnualPlan + ' / year');

      // for standard plan
      var standardMonthValue = standardAnnualPlan / 11;
      priceStandardValue.html(standardMonthValue);
      standardAnnualPricing.removeClass('d-none').html('USD ' + standardAnnualPlan + ' / year');
    } else {
      // for enterprise plan
      priceEnterpriseValue.html(50);
      enterpriseAnnualPricing.addClass('d-none');

      // for standard plan
      priceStandardValue.html(20);
      standardAnnualPricing.addClass('d-none');
    }
  });
});
