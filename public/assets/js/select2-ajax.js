$(document).ready(function () {
  $(".select2-getRombel").each(function () {
    const $select = $(this);
    $select.select2({
      placeholder: "Pilih rombel...",
      searchInputPlaceholder: "Cari Rombel..",
      theme: "bootstrap4",
      dropdownParent: $select.parents(".modal").length
        ? $select.parents(".modal").first()
        : $(document.body),
      ajax: {
        url: "/api/v0/rombel/get",
        method: "GET",
        dataType: "json",
        data: function (params) {
          return {
            key: params.term,
          };
        },
        processResults: function (data) {
          return {
            results: $.map(data, function (item) {
              return {
                id: item.id,
                text: item.rombel_nama,
                tingkat: item.tingkat,
                // wali: item.wali,
                // semester: item.semester,=
              };
            }),
          };
        },
        cache: true,
        error: function (jqXHR, status, error) {
          return {
            results: [],
          };
        },
      },
      templateResult: (option) => {
        if (!option.id) {
          return option.text;
        }

        var $option = $(
          "<div>" +
            "<h6 class='m-0'>" +
            option.text +
            "</h6>" +
            "<p class='small m-0'>Tingkat: " +
            option.tingkat +
            "</p>" +
            "</div>"
        );
        return $option;
      },
      templateSelection: (option) => {
        if (!option.id) {
          return option.text;
        }
        var $selection = $("<span>" + option.text + "</span>");
        return $selection;
      },
    });
  });

  $(".select2-getBgColor").each(function () {
    const $select = $(this);
    $select.select2({
      placeholder: $select.data("placeholder") || "Pilih style...",
      searchInputPlaceholder: "Cari..",
      theme: "bootstrap4",
      dropdownParent: $select.parents(".modal").length
        ? $select.parents(".modal").first()
        : $(document.body),
      ajax: {
        url: "/api/v0/backgroundColor",
        method: "GET",
        dataType: "json",
        data: function (params) {
          return {
            key: params.term,
          };
        },
        processResults: function (data) {
          return {
            results: $.map(data, function (item) {
              return {
                id: item.kode,
                text: item.nama,
                kode: item.kode,
              };
            }),
          };
        },
        cache: true,
        error: function (jqXHR, status, error) {
          return {
            results: [],
          };
        },
      },
      templateResult: function (option) {
        if (!option.id) return option.text;
        return $(`<div class="p-2 ${option.kode}">
                        <h6 class='m-0 text-bold'>${option.text}</h6>
                        </div>`);
      },
      templateSelection: function (option) {
        if (!option.id) return option.text;
        return $(`<span>${option.text}</span>`);
      },
    });
  });
});
