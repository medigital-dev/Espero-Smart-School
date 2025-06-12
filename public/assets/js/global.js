$(document).ready(function () {
  $('[data-toggle="tooltip"], .btn-tooltip').tooltip({
    trigger: "hover",
  });
  $('[data-autoclose="false"]')
    .siblings(".dropdown-menu")
    .attr("onclick", "event.stopPropagation()");

  $(".select2").select2({
    placeholder: "Pilih...",
    theme: "bootstrap4",
  });
  $("[data-mask]").inputmask();
  $(".onlyInt")
    .on("input", function () {
      $(this).addClass("text-right");
      var inputValue = $(this).val();
      $(this).siblings("input:hidden").val(inputValue.replace(/\D/g, ""));
      var formattedValue = formatNumber(inputValue);
      $(this).val(formattedValue);
    })
    .on("click", function () {
      $(this).select();
    });
});
