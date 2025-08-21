$(document).ready(function () {
  initJs();

  $("#btnReloadTable").on("click", function () {
    $(this).prop("disabled", true).children("i").addClass("fa-spin");
    $(".table")
      .DataTable()
      .ajax.reload(null, false)
      .on("draw", () =>
        $(this).prop("disabled", false).children("i").removeClass("fa-spin")
      );
  });

  $("#checkAllRow").on("click", function () {
    const isChecked = $(this).is(":checked");
    $(".dtCheckbox").each(function () {
      const id = $(this).prop("id");
      $(this).prop("checked", isChecked);
      if ($(this).is(":checked")) {
        if (!selectedRows.includes(id)) selectedRows.push(id);
      } else selectedRows = selectedRows.filter((item) => item !== id);
    });
    runSelectedCount();
  });

  $("#btnClearSelected").on("click", function () {
    selectedRows = [];
    const checked = $(".dtCheckbox:checked");
    checked.prop("checked", false);
    stateBtnCheckAll();
    runSelectedCount();
  });

  $("#btnSelectRow").on("click", function () {
    const checkbox = $(".dtCheckbox");
    checkbox.each(function () {
      const id = $(this).val();
      if ($(this).is(":checked")) {
        $(this).prop("checked", false);
        selectedRows = selectedRows.filter((item) => item !== id);
      } else {
        $(this).prop("checked", true);
        if (!selectedRows.includes(id)) {
          selectedRows.push(id);
        }
      }
    });
    stateBtnCheckAll();
    runSelectedCount();
  });
});
