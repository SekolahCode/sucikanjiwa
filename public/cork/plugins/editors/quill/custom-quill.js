// Basic

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['code-block']
    ]
  },
  scrollingContainer: '#scrolling-container', 
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});

$(document).ready(function() {
  

  $("#btnSubmit").on('click', function (){
    alert('hoi')
      var content = document.querySelector('input[name=content]')
      var length  = quill.getLength()

      if(length > 1){
        $(".article-content").css("border-color", "");
        $("p[class='content-message']").remove()
        content.value = quill.getText(0, length)
        //console.log("Submitted", $("form[name='save-form']").serialize(), $("form[name='save-form']").serializeArray())
      }else{
        $(".article-div").append($('<p class="content-message">please enter your content .</p>').fadeIn('slow'));
        $(".article-content").css("border-color", "red");
      }

      $("form[name='save-form']").submit()
  });


  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='save-form']").validate({
    ignore: '*:not([name])',
    debug: true,
    errorClass: 'is-invalid',
    errorElement: 'span',
    highlight: function(element, errorClass) {
      console.log(element)
      $(element).addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass);
    },
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      title: "required",
      author: "required",
    },
    // Specify validation error messages
    messages: {
      title: "Please enter your title",
      author: "Please enter your author",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      console.log('submitted')
      ajaxPostForm(form)
      // e.preventDefault(); // avoid to execute the actual submit of the form.
      // console.log('form submitted')
      // var form = $(this);
      // var url = form.attr('action');
      // console.log(url);
      // $.ajax({
      //   type: "POST",
      //   url: url,
      //   data: form.serialize(), // serializes the form's elements.
      //   success: function(data)
      //   {
      //       alert(data); // show response from the php script.
      //   },
      //   error: function(jqXHR, exception)
      //   {
      //       var msg = '';
      //       if (jqXHR.status === 0) {
      //           msg = 'Not connect.\n Verify Network.';
      //       } else if (jqXHR.status == 404) {
      //           msg = 'Requested page not found. [404]';
      //       } else if (jqXHR.status == 500) {
      //           msg = 'Internal Server Error [500].';
      //       } else if (exception === 'parsererror') {
      //           msg = 'Requested JSON parse failed.';
      //       } else if (exception === 'timeout') {
      //           msg = 'Time out error.';
      //       } else if (exception === 'abort') {
      //           msg = 'Ajax request aborted.';
      //       } else {
      //           msg = 'Uncaught Error.\n' + jqXHR.responseText;
      //       }
      //       alert(msg);
      //   }
      // });
      return false;
    }
  })

});

function ajaxPostForm(form){
  alert('action=' + $('#summaryforms').attr('action')); // for demo
  alert('valid form submitted'); // for demo
  
}

function validateForm(){
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='save-form']").validate({
    ignore: '*:not([name])',
    debug: true,
    errorClass: 'is-invalid',
    errorElement: 'span',
    highlight: function(element, errorClass) {
      console.log(element)
      $(element).addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass(errorClass);
    },
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      title: "required",
      author: "required",
    },
    // Specify validation error messages
    messages: {
      title: "Please enter your title",
      author: "Please enter your author",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      console.log('submitted')
      ajaxPostForm(form)
      // e.preventDefault(); // avoid to execute the actual submit of the form.
      // console.log('form submitted')
      // var form = $(this);
      // var url = form.attr('action');
      // console.log(url);
      // $.ajax({
      //   type: "POST",
      //   url: url,
      //   data: form.serialize(), // serializes the form's elements.
      //   success: function(data)
      //   {
      //       alert(data); // show response from the php script.
      //   },
      //   error: function(jqXHR, exception)
      //   {
      //       var msg = '';
      //       if (jqXHR.status === 0) {
      //           msg = 'Not connect.\n Verify Network.';
      //       } else if (jqXHR.status == 404) {
      //           msg = 'Requested page not found. [404]';
      //       } else if (jqXHR.status == 500) {
      //           msg = 'Internal Server Error [500].';
      //       } else if (exception === 'parsererror') {
      //           msg = 'Requested JSON parse failed.';
      //       } else if (exception === 'timeout') {
      //           msg = 'Time out error.';
      //       } else if (exception === 'abort') {
      //           msg = 'Ajax request aborted.';
      //       } else {
      //           msg = 'Uncaught Error.\n' + jqXHR.responseText;
      //       }
      //       alert(msg);
      //   }
      // });
      return false;
    }
  })
}

// // With Tooltip

//   var quill = new Quill('#quill-tooltip', {
//     modules: {
//       toolbar: '#toolbar-container'
//     },
//     placeholder: 'Compose an epic...',
//     theme: 'snow'
//   });
  
//   // Enable all tooltips
//   $('[data-toggle="tooltip"]').tooltip();
  
//   // Can control programmatically too
//   $('.ql-italic').mouseover();
//   setTimeout(function() {
//     $('.ql-italic').mouseout();
//   }, 2500);