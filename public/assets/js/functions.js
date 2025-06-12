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
  var numericValue = number.replace(/\D/g, "");
  var formattedValue = new Intl.NumberFormat("id-ID").format(numericValue);
  return formattedValue;
}
