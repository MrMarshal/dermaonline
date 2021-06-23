$("#contactForm").submit(function (ev) {
  ev.preventDefault();
  var name = $("#inputName").val();
  var email = $("#inputEmail").val();
  var message = $("#msj").val();
  let flag = true;
  if (name === "") {
    $("#nameError").html("El nombre está vacio");
    flag = false;
  } else {
    $("#nameError").html("");
  }
  if (email === "") {
    $("#emailError").html("El email está vacio");
    flag = false;
  } else {
    $("#emailError").html("");
  }
  if (!flag) return;
  var firstName = name; // For Success/Failure Message
  // Check for white space in name for Success/Fail message
  if (firstName.indexOf(" ") >= 0) {
    firstName = name.split(" ").slice(0, -1).join(" ");
  }
  $this = $("#sendMessageButton");
  $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages

  $.ajax({
    url: "./assets/mail/contact_me.php",
    type: "post",
    data: {
      name: name,
      email: email,
      message: message,
    },
    cache: false,
    success: function (respuesta) {
      //clear all fields
      alert("En breves momentos te estaremos dando respuesta a tu solicitud");
      $("#contactForm").trigger("reset");
    },
    error: function (error) {
      //clear all fields
      alert("Ha ocurrido un error");
      $("#contactForm").trigger("reset");
    },
    complete: function () {
      setTimeout(function () {
        $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
      }, 1000);
    },
  });
});

$("#").onSubmit(function (event) {});
