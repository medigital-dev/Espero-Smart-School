$(document).ready(function () {
  $(".select2-getPd").each(function () {
    const $select = $(this);
    const status = $select.data("status");
    $select.select2({
      placeholder: "Pilih peserta didik...",
      searchInputPlaceholder: "Cari Nama/NIS/NISN/Kelas...",
      theme: "bootstrap4",
      dropdownParent: $select.parents(".modal").length
        ? $select.parents(".modal").first()
        : $(document.body),
      ajax: {
        url: "/webService/peserta-didik/get/select2",
        method: "GET",
        dataType: "json",
        data: function (params) {
          return {
            key: params.term,
            page: params.page || 1,
          };
        },
        processResults: function (data, params) {
          params.page = params.page || 1;
          return {
            results: $.map(data.items, function (item) {
              return item;
            }),
            pagination: {
              more: data.hasMore,
            },
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
          `
                            <h6 class="m-0 text-bold">${option.text}</h6>
                            <div class="small">
                                <div class="row">
                                    <div class="col-2">
                                        Kelas
                                    </div>
                                    <div class="col-10">
                                        : ${option.kelas}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        NIS
                                    </div>
                                    <div class="col-10">
                                        : ${option.nipd}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        NISN
                                    </div>
                                    <div class="col-10">
                                        : ${option.nisn}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        NIK
                                    </div>
                                    <div class="col-10">
                                        : ${option.nik}
                                    </div>
                                </div>
                            </div>
                            `
        );
        return $option;
      },
      templateSelection: (option) => {
        if (!option.id) {
          return option.text;
        }
        var $selection = $(
          "<span>" + option.kelas + " - " + option.text + "</span>"
        );
        return $selection;
      },
    });
  });

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

  $(".select2-getReferensi").each(function () {
    const $select = $(this);
    const modalDialog = $("#modalReferensi");
    $select
      .select2({
        placeholder: $select.data("placeholder") || "Pilih referensi...",
        searchInputPlaceholder:
          $select.data("tags") == true ? "Cari/Tambah baru..." : "Cari...",
        theme: "bootstrap4",
        dropdownParent: $select.parents(".modal").length
          ? $select.parents(".modal").first()
          : $(document.body),
        ajax: {
          url: "/api/v0/referensi?type=" + $select.data("referensi"),
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
                  text: item.nama,
                  kode: item.kode,
                  bgColor: item.bg_color,
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
          if (option.newTag)
            return $(
              `<div class="d-flex justify-content-between align-items-center"><span>${option.text}</span><span class="badge bg-danger" data-toggle="tooltip" title="Tambah Baru">New</span></div>`
            );
          return $(`<span>${option.text}</span>`);
        },
        templateSelection: function (option) {
          if (!option.id) return option.text;
          return $(`<span>${option.text}</span>`);
        },
        escapeMarkup: (markup) => markup,
        createTag: function (params) {
          var term = $.trim(params.term);
          if (term === "") return null;
          return {
            id: new Date().getTime(),
            text: term,
            newTag: true,
            type: $select.data("referensi"),
          };
        },
      })
      .on("select2:select", function (e) {
        let data = e.params.data;
        if (data.newTag) {
          modalDialog.modal("show");
          modalDialog
            .find('textarea[name="nama"],input[name="kode"]')
            .val(data.text)
            .trigger("change");
          modalDialog.find("#targetTambahReferensi").val($select.attr("id"));
          modalDialog.find("#tempId-selectNewTags").val(data.id);
          modalDialog.find("#typeReferensi").val($select.data("referensi"));
        }
      });
  });
});
