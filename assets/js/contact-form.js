(function ($) {
  "use strict";

  var $form = $("#contactForm");
  var $modal = $("#contactFeedbackModal");
  var $submit = $form.find('[type="submit"]');
  var previousFocus;
  var fieldNames = {
    nombre: "Name",
    country: "Country",
    emailm: "Email",
    phonenumber: "Phone Number",
    mensaje: "Message",
  };

  if (!$form.length) {
    return;
  }

  $.validator.addMethod(
    "notBlank",
    function (value, element) {
      return this.optional(element) || $.trim(value).length > 0;
    },
    "This field is required."
  );

  $.validator.addMethod(
    "contactPhone",
    function (value, element) {
      var digits = value.replace(/\D/g, "");
      return this.optional(element) || (/^[0-9+().\-\s]{7,25}$/.test(value) && digits.length >= 7);
    },
    "Enter a valid phone number."
  );

  function closeFeedback() {
    $modal.removeClass("is-visible").attr("aria-hidden", "true");
    if (previousFocus) {
      previousFocus.focus();
    }
  }

  function showFeedback(type, message, errors) {
    var $errors = $("#contactFeedbackErrors").empty();
    var title = type === "success" ? "Message sent" : "Unable to send message";

    $.each(errors || {}, function (field, error) {
      var label = fieldNames[field] || field;
      $("<li>").text(label + ": " + error).appendTo($errors);
    });

    $("#contactFeedbackTitle").text(title);
    $("#contactFeedbackMessage").text(message);
    previousFocus = document.activeElement;
    $modal.addClass("is-visible").attr("aria-hidden", "false");
    $modal.find(".contact-feedback__confirm").trigger("focus");
  }

  $form.validate({
    rules: {
      nombre: {
        required: true,
        notBlank: true,
        maxlength: 100,
      },
      country: {
        required: true,
        notBlank: true,
        maxlength: 100,
      },
      emailm: {
        required: true,
        email: true,
        maxlength: 254,
      },
      phonenumber: {
        required: true,
        contactPhone: true,
      },
      mensaje: {
        required: true,
        notBlank: true,
        maxlength: 5000,
      },
    },
    messages: {
      nombre: {
        required: "Enter your name.",
        maxlength: "Name must be no longer than 100 characters.",
      },
      country: {
        required: "Enter your country.",
        maxlength: "Country must be no longer than 100 characters.",
      },
      emailm: {
        required: "Enter your email address.",
        email: "Enter a valid email address.",
        maxlength: "Email must be no longer than 254 characters.",
      },
      phonenumber: {
        required: "Enter your phone number.",
      },
      mensaje: {
        required: "Enter a message.",
        maxlength: "Message must be no longer than 5000 characters.",
      },
    },
    errorElement: "span",
    errorClass: "contact-field-error",
    errorPlacement: function (error, element) {
      error.attr("role", "alert").insertBefore(element);
    },
    highlight: function (element) {
      $(element).addClass("contact-invalid").attr("aria-invalid", "true");
    },
    unhighlight: function (element) {
      $(element).removeClass("contact-invalid").removeAttr("aria-invalid");
    },
    submitHandler: function (form) {
      $submit.prop("disabled", true).text("SENDING...");

      $.ajax({
        url: $form.attr("action"),
        type: "POST",
        data: $(form).serialize(),
        dataType: "json",
      })
        .done(function (response) {
          if (response.status === "success") {
            form.reset();
            $form.validate().resetForm();
            $form.find(".contact-invalid").removeClass("contact-invalid").removeAttr("aria-invalid");
            showFeedback("success", response.message, {});
            return;
          }

          showFeedback(
            "error",
            response.message || "Please review the information and try again.",
            response.errors || {}
          );
        })
        .fail(function (xhr) {
          var response = xhr.responseJSON || {};
          showFeedback(
            "error",
            response.message || "A server error occurred. Please try again later.",
            response.errors || {}
          );
        })
        .always(function () {
          $submit.prop("disabled", false).text("SEND");
        });

      return false;
    },
  });

  $modal.on("click", ".contact-feedback__close, .contact-feedback__confirm", closeFeedback);
  $modal.on("click", function (event) {
    if (event.target === $modal[0]) {
      closeFeedback();
    }
  });
  $(document).on("keydown.contactFeedback", function (event) {
    if (event.key === "Escape" && $modal.hasClass("is-visible")) {
      closeFeedback();
    }
  });
})(jQuery);
