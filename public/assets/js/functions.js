function checkRowDt() {
  $(".dtCheckbox").on("change", function () {
    let id = $(this).prop("id");
    if ($(this).is(":checked")) {
      if (!selectedRows.includes(id)) {
        selectedRows.push(id);
      }
    } else {
      selectedRows = selectedRows.filter((item) => item !== id);
    }
    stateBtnCheckAll();
    runSelectedCount();
  });
}

function runSelectedCount() {
  const countInfo = $("#dtCountChecked-bukuInduk");
  if (selectedRows.length == 0) countInfo.html("");
  else countInfo.html(`${selectedRows.length} terpilih | `);
}

function stateBtnCheckAll() {
  const countCheckbox = $(".dtCheckbox").length;
  const countCheckboxChecked = $(".dtCheckbox:checked").length;
  if (countCheckbox == 0)
    $("#checkAllRow").prop("checked", false).prop("indeterminate", false);
  else if (countCheckboxChecked == 0)
    $("#checkAllRow").prop("checked", false).prop("indeterminate", false);
  else if (countCheckbox == countCheckboxChecked)
    $("#checkAllRow").prop("checked", true).prop("indeterminate", false);
  else $("#checkAllRow").prop("indeterminate", true);
}

function validationElm(
  idElm = [],
  invalidValue = [],
  errorMessage = "Input tidak valid."
) {
  let check = [];
  idElm.forEach(function (item) {
    let elm = $("#" + item);
    if (invalidValue.includes(elm.val())) {
      check.push(elm.val());
      elm.addClass("is-invalid");
    } else elm.removeClass("is-invalid");
  });
  if (check.length !== 0) {
    toast(errorMessage, "error");
    return false;
  }
  $(".is-invalid").removeClass("is-invalid");
  return true;
}

/**
 * Fungsi validasi elemen
 * @param {Array} idElm Selector id atau class atau yang lain
 * @param {Array} invalidValue Invalid jika value = (default "" atau null)
 * @param {string} errorMessage Pesan error
 * @returns true or false
 */
function validationElm2(
  idElm = [],
  invalidValue = ["", null],
  errorMessage = "Input tidak valid."
) {
  let check = [];
  idElm.forEach(function (item) {
    let elm = $(item);
    if (invalidValue.includes(elm.val())) {
      check.push(elm.val());
      elm.addClass("is-invalid");
    } else elm.removeClass("is-invalid");
  });
  if (check.length !== 0) {
    toast(errorMessage, "error");
    return false;
  }
  $(".is-invalid").removeClass("is-invalid");
  return true;
}

function runTooltip() {
  $('[data-toggle="tooltip"], .btn-tooltip').tooltip({
    html: true,
    trigger: "hover",
  });
}

function runPopover() {
  $('[data-toggle="popover"]').popover({
    html: true,
    trigger: "hover",
  });
}

function runOnlyInt() {
  $(".onlyInt, .intOnly, .int")
    .on("input", function () {
      const $input = $(this);
      const inputValue = $input.val();
      const numericValue = inputValue.replace(/\D/g, "");
      const useCurrencyFormat =
        $input.data("currency") === true || $input.data("currency") === "true";
      $input.siblings("input:hidden").val(numericValue);
      $input.toggleClass("text-right", useCurrencyFormat);
      const formattedValue = useCurrencyFormat
        ? formatNumber(numericValue)
        : numericValue;
      $input.val(formattedValue);
    })
    .on("click", function () {
      $(this).select();
    });
}

function runInputMask() {
  if (typeof $.fn.inputmask === "function") $("[data-mask]").inputmask();
}

function runSelect2() {
  runSelect2Global();
  runSelect2GetPd();
  runSelect2GetReferensi();
  runSelect2GetSemester();
}

function runSelect2Global() {
  $("select.select2").select2({
    placeholder: "Pilih...",
    theme: "bootstrap4",
  });
}

function runBsDropdownAutoClose() {
  $('[data-autoclose="false"]')
    .siblings(".dropdown-menu")
    .attr("onclick", "event.stopPropagation()");
}

function runFancyBox() {
  Fancybox.bind("[data-fancybox]");
}

function runBsCustomFileInput() {
  bsCustomFileInput.destroy();
  bsCustomFileInput.init();
}

function initJs() {
  runInputMask();
  runOnlyInt();
  runSelect2();
  runTooltip();
  runPopover();
  runBsDropdownAutoClose();
  runBsCustomFileInput();
  runFancyBox();
  runSelectedCount();
  runBsSwitch();
}

function resetInput(elmInput, elmDatatables = false) {
  $(elmInput).val("");
  $(elmInput).trigger("change");
  $(elmInput).trigger("input");
  if (elmDatatables !== false) $(elmDatatables).DataTable().ajax.reload();
}

function tanggal(isoDate, format = "d-m-Y") {
  if (!isoDate) return "";

  const bulanNama = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];

  const hariNama = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu",
  ];
  const hariSingkat = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

  let date = new Date(isoDate);
  if (isNaN(date)) {
    if (/^\d{4}-\d{2}-\d{2}$/.test(isoDate)) {
      date = new Date(isoDate + "T00:00:00");
    } else {
      date = new Date(isoDate.replace(" ", "T"));
    }
  }
  if (isNaN(date)) return "";

  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();
  const dayIndex = date.getDay();

  const hours = date.getHours();
  const minutes = date.getMinutes();
  const seconds = date.getSeconds();

  const map = {
    d: day,
    dd: String(day).padStart(2, "0"),
    j: day,
    mm: String(month).padStart(2, "0"),
    m: month,
    mmm: bulanNama[month - 1].slice(0, 3),
    mmmm: bulanNama[month - 1],
    Y: year,
    yyyy: year,
    yy: String(year).slice(-2),
    F: bulanNama[month - 1],
    dddd: hariNama[dayIndex],
    ddd: hariSingkat[dayIndex],
    H: hours,
    HH: String(hours).padStart(2, "0"),
    i: minutes,
    ii: String(minutes).padStart(2, "0"),
    s: seconds,
    ss: String(seconds).padStart(2, "0"),
  };

  return format.replace(
    /dddd|ddd|mmmm|mmm|mm|m|dd|d|j|yyyy|yy|Y|F|HH?|ii?|ss?|H|i|s/g,
    (match) => map[match]
  );
}

function formatNumber(number) {
  return new Intl.NumberFormat("id-ID", {
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(number);
}

function toast(
  message,
  type = "info",
  delay = 5000,
  position = "bottom-center"
) {
  function getPosition(poss) {
    switch (position) {
      case "top-left":
        return "toast-top-left";
        break;

      case "top-center":
        return "toast-top-center";
        break;

      case "top-right":
        return "toast-top-right";
        break;

      case "bottom-left":
        return "toast-bottom-left";
        break;

      case "bottom-center":
        return "toast-bottom-center";
        break;

      case "bottom-right":
        return "toast-bottom-right";
        break;

      default:
        return "toast-bottom-center";
        break;
    }
  }

  toastr.options = {
    timeOut: delay,
    progressBar: true,
    newestOnTop: true,
    positionClass: getPosition(position),
    extendedTimeOut: delay == 0 ? 0 : 2000,
    closeButton: delay == 0 ? true : false,
  };

  switch (type) {
    case "info":
      toastr.info(message);
      break;

    case "success":
      toastr.success(message);
      break;

    case "warning":
      toastr.warning(message);
      break;

    case "error":
      toastr.error(message);
      break;

    default:
      toastr.info(message);
      break;
  }
}

function errorHandle(err) {
  if (err.responseJSON && err.responseJSON.message) {
    toast(err.responseJSON.message, "error");
  } else if (err.code === 400) {
    toast(err.messages, "error");
  } else if (err.code === 500 || err.status === 400) {
    toast(
      err.responseJSON ? err.responseJSON.messages.error : "Error server",
      "error",
      0
    );
  } else {
    toast("An error occurred", "error");
  }
}

/**
 * Mengambil data dari server dengan AJAX.
 * Bisa menerima parameter sebagai objek konfigurasi atau individual parameter.
 *
 * @param {string|Object} urlOrConfig - URL request atau objek konfigurasi.
 * @param {Object} [data={}] - Data yang dikirim (opsional, abaikan jika pakai objek konfigurasi).
 * @param {string} [dataType="json"] - Tipe data yang dikembalikan (opsional, abaikan jika pakai objek konfigurasi).
 * @param {string} [method="GET"] - Metode request (opsional, abaikan jika pakai objek konfigurasi).
 * @returns {Promise<any>} - Promise yang mengembalikan hasil response AJAX.
 * @throws {Error} - Jika terjadi error selama request.
 */
async function fetchData(urlOrConfig, ...restParams) {
  let config;
  if (typeof urlOrConfig === "object") {
    if (restParams.length > 0) {
      throw new Error(
        "fetchData() tidak boleh memiliki parameter tambahan jika menggunakan objek konfigurasi."
      );
    }

    config = {
      url: urlOrConfig.url,
      data: urlOrConfig.data || {},
      dataType: urlOrConfig.dataType || "json",
      method: urlOrConfig.method || "GET",
      button: urlOrConfig.button || null,
      headers: urlOrConfig.headers || null,
    };
  } else {
    config = {
      url: urlOrConfig,
      data: restParams[0] || {},
      method: restParams[1] || "GET",
      dataType: restParams[2] || "json",
    };
  }

  const btnText = config.button ? config.button.children("span").text() : null;
  const btnIcon = config.button ? config.button.children("i") : null;
  const iconClass = btnIcon ? btnIcon.prop("class") : null;

  if (config.button) {
    config.button.prop("disabled", true);

    if (btnIcon) {
      config.button
        .children("i")
        .removeClass()
        .addClass("fas fa-pulse fa-spinner mr-1");
    }
  }

  try {
    let isFormData = config.data instanceof FormData;

    let options = {
      url: config.url,
      method: config.method,
      dataType: config.dataType,
      cache: false,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    };

    if (isFormData) {
      options.processData = false;
      options.contentType = false;
      options.enctype = "multipart/form-data";
      options.data = config.data;
    } else {
      options.contentType = "application/x-www-form-urlencoded";
      options.data = $.param(config.data);
    }
    return await $.ajax(options);
  } catch (error) {
    console.log(error);
    errorHandle(error);
    return false;
  } finally {
    if (config.button) {
      config.button.prop("disabled", false);
      if (btnIcon)
        config.button.children("i").removeClass().addClass(iconClass);
    }
  }
}

function parseFormArray(serializedArray) {
  const result = {};

  for (const field of serializedArray) {
    const isArrayField = /\[\]$/.test(field.name);
    const name = field.name.replace(/\[\]$/, "");
    const value = field.value;

    if (isArrayField) {
      if (!result[name]) {
        result[name] = [];
      }
      result[name].push(value);
    } else {
      result[name] = value;
    }
  }

  return result;
}

function runSelect2GetPd() {
  $(".select2-getPd").each(function () {
    const $select = $(this);
    $select.select2({
      placeholder: "Pilih peserta didik...",
      searchInputPlaceholder: "Cari Nama/NIS/NISN/Kelas...",
      theme: "bootstrap4",
      dropdownParent: $select.parents(".modal").length
        ? $select.parents(".modal").first()
        : $(document.body),
      ajax: {
        url: "/webService/v1/peserta-didik/select2",
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

        var $option = $(`
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
          </div>
          `);
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
}

function runSelect2GetReferensi() {
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
}

function runSelect2GetSemester() {
  $(".select2-getSemester").each(function () {
    const $select = $(this);
    const $modal = $("#modalTambahSemester");
    $select
      .select2({
        placeholder: $select.data("placeholder") || "Pilih semester...",
        searchInputPlaceholder:
          $select.data("tags") == true ? "Cari/Tambah baru..." : "Cari...",
        theme: "bootstrap4",
        dropdownParent: $select.parents(".modal").length
          ? $select.parents(".modal").first()
          : $(document.body),
        ajax: {
          url: "/webService/v1/semester/select2",
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
          if (option.newTag)
            return $(
              `<div class="d-flex justify-content-between align-items-center"><span>${option.text}</span><span class="badge bg-danger" data-toggle="tooltip" title="Tambah Baru">New</span></div>`
            );

          var $option = $(`
          <h6 class="m-0 text-bold">${option.text}</h6>
          <div class="small">
          <div class="row">
          <div class="col-2">
          Kode
          </div>
          <div class="col-10">
          : ${option.kode}
          </div>
          </div>
          <div class="row">
          <div class="col-2">
          Status
          </div>
          <div class="col-10">
          : ${option.status == 1 ? "Aktif" : "Non Aktif"}
          </div>
          </div>
          </div>
          `);
          return $option;
        },
        templateSelection: (option) => {
          return option.text;
        },
        escapeMarkup: (markup) => markup,
        createTag: function (params) {
          var term = $.trim(params.term);
          if (term === "") return null;
          return {
            id: new Date().getTime(),
            text: term,
            newTag: true,
          };
        },
      })
      .on("select2:select", function (e) {
        let data = e.params.data;
        if (data.newTag) {
          $modal
            .find('textarea[name="nama"],input[name="kode"]')
            .val(data.text)
            .trigger("change");
          $modal.find("#idTarget-semester").val(data.id);
          $modal.modal("show");
        }
      });
  });
}

function runBsSwitch() {
  $("input[data-bootstrap-switch]").each(function () {
    $(this).bootstrapSwitch("state", $(this).prop("checked"));
  });
}
