$(document).ready(function () {
  $('[data-toggle="tooltip"], .btn-tooltip').tooltip();
  $('[data-autoclose="false"]').on("click", (e) =>
    $(e.target)
      .siblings(".dropdown-menu")
      .attr("onclick", "event.stopPropagation()")
  );

  $(".select2").select2({
    placeholder: "Pilih...",
    theme: "bootstrap4",
  });
  $("[data-mask]").inputmask();
});
