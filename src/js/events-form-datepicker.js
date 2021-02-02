jQuery(document).ready(function($) {
  $('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    'maxSpan': {
      'days': 10
    },
    locale: {
      format: 'MM/DD/YYYY',
      applyLabel: 'Apply',
      cancelLabel: 'Clear'
    }
  });
  $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YY') + ' - ' + picker.endDate.format('MM/DD/YY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function () {
    $(this).val('');
  });
});