function toast(message, type = "info", delay = 5000) {
  toastr.options = {
    timeOut: delay,
    progressBar: true,
    newestOnTop: true,
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
    toast(err.responseJSON.message, "error", 0);
  } else if (err.code === 400) {
    toast(err.messages, "error", 0);
  } else if (err.code === 500 || err.status === 400) {
    toast(
      err.responseJSON ? err.responseJSON.messages.error : "Error server",
      "error",
      0
    );
  } else {
    toast("An error occurred", "error", 0);
  }
}

function validationElm(elm = [], invalidIf = [], errorMessage = null) {
  let check = [];
  if (errorMessage == null) errorMessage = "Invalid Field.";
  elm.forEach(function (item) {
    if (invalidIf.includes($(item).val())) {
      check.push($(item).val());
      $(item).addClass("is-invalid");
    } else $(item).removeClass("is-invalid");
  });
  if (check.length !== 0) {
    toast(errorMessage, "error");
    return false;
  }
  $(".is-invalid").removeClass("is-invalid");
  return true;
}

function resetInput(elmInput, elmDatatables = false) {
  $(elmInput).val("").trigger("change");
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

  const date = new Date(isoDate);

  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();
  const dayIndex = date.getDay();

  const hours = date.getHours();
  const minutes = date.getMinutes();
  const seconds = date.getSeconds();

  const map = {
    d: String(day).padStart(2, "0"), // 01
    j: day, // 1
    mm: String(month).padStart(2, "0"), // 02
    m: month, // 2
    mmm: bulanNama[month - 1].slice(0, 3), // Feb
    mmmm: bulanNama[month - 1], // Februari
    Y: year, // 2009
    yyyy: year,
    yy: String(year).slice(-2), // 09
    F: bulanNama[month - 1], // Februari
    dddd: hariNama[dayIndex], // Selasa
    ddd: hariSingkat[dayIndex], // Sel
    H: hours,
    HH: String(hours).padStart(2, "0"),
    i: minutes,
    ii: String(minutes).padStart(2, "0"),
    s: seconds,
    ss: String(seconds).padStart(2, "0"),
  };

  return format.replace(
    /dddd|ddd|mmmm|mmm|mm|m|d|j|yyyy|yy|Y|F|HH?|ii?|ss?|H|i|s/g,
    (match) => map[match]
  );
}
