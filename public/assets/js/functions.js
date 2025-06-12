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
