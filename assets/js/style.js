// JavaScript (with jQuery)
var baseURL = window.location.protocol + '//' + window.location.host +'/artGallery/';
$(document).ready(function () {
// Set the idle time (in milliseconds) before redirecting to logout page
var idleTime = 1800000; // 5 minutes (adjust as needed)

// Initialize idle timer variables
var idleTimer;
var logoutUrl = "logout";
var hasRedirected = false; // Flag variable to track if redirection has occurred

// Function to redirect to logout page
function redirectLogout() {
  if (!hasRedirected) {
    hasRedirected = true;
    window.location.href = logoutUrl;
  }
}

// Reset the idle timer on user activity
function resetIdleTimer() {
  clearTimeout(idleTimer);
  idleTimer = setTimeout(redirectLogout, idleTime);
}

// Bind event handlers to detect user activity
$(document).on("mousemove keydown scroll", resetIdleTimer);

// Start the idle timer on page load
$(function() {
  resetIdleTimer();
});




  // Toggle Sidebar
  $(document).on("click", "#sidebar-toggle", function (e) {
    e.preventDefault();
    $(".backdrop").toggleClass("backdropactive");
    $("#sidebar").toggleClass("active");
  });

  // Hide Sidebar when click on backdrop
  $(document).on("click", ".backdrop", function (e) {
    e.preventDefault();
    $(".backdrop").removeClass("backdropactive");
    $("#sidebar").removeClass("active");
  });

  //Header Affix when scroll value is greatter than 0
  $(window).on("scroll", function (event) {
    var scrollValue = $(window).scrollTop();
    if (scrollValue > 0) {
      $(".header").addClass("fixed");
    } else {
      $(".header").removeClass("fixed");
    }
  });

  //Header navigation prifile dropdown toggle class
  $(document).on("click", "#dropmedown", function (e) {
    e.preventDefault();
    $("#mydropdown").toggleClass("open");
  });

  //Show modal create account
  $(document).on("click", ".crtacnt", function (e) {
    e.preventDefault();
    $("#logInModal").removeClass("active");
    $("#signInModal").addClass("active");
  });

  //Show modal login account
  $(document).on("click", ".lgtacnt", function (e) {
    e.preventDefault();
    $("#signInModal").removeClass("active");
    $("#logInModal").addClass("active");
  });

  //Show modal create account through nav button
  $(document).on("click", ".signInbtn", function (e) {
    e.preventDefault();
    $("#signInModal").addClass("active");
  });

  //Hide modal create account through nav button
  $(document).on("click", "#closeme", function (e) {
    e.preventDefault();
    $("#signInModal").removeClass("active");
  });

  //Hide modal login account through nav button
  $(document).on("click", "#closeit", function (e) {
    e.preventDefault();
    $("#logInModal").removeClass("active");
  });

  $(document).on("click", "#shareBtn_01", function (e) {
    e.preventDefault();
    $("#shareModal").addClass("active");
    $(".shr-modal-content").addClass("active");
  
    var imageSrc = $(this).closest(".painting_canvas").find("img.art_canvas").attr("src");
    $(".shrmgmd01").attr("src", imageSrc);
    $("._cpyurl").val(baseURL + imageSrc);
  });
  


// Share modal hide on image click
$(document).on("click", "#shrmdlclose", function (e) {
  e.preventDefault();
  $("#shareModal").removeClass("active");
  $(".shr-modal-content").removeClass("active");
  $(".shrmgmd01").attr("src", "");
  $("._cpyurl").val('');
});


   // Share on Twitter
 $(document).on('click','._twshrbt',function(e) {
  e.preventDefault();
  var imageSrc = $('.art_canvas').attr('src');
  var tweetText = "Check out this image!";
  var tweetUrl = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(baseURL + imageSrc) + "&text=" + encodeURIComponent(tweetText);
  window.open(tweetUrl , '_blank');
});

// Share on Facebook
$(document).on('click', '._fbshrbt', function(e) {
  e.preventDefault();
  var imageSrc = $('.art_canvas').attr('src');
  var fbUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(baseURL + imageSrc);
  window.open(fbUrl, '_blank');
});
 

  //Like image
  // $(document).on("click", "#likeBtn", function (e) {
  //   e.preventDefault();
  //   $(this).find("i").toggleClass("saved");
  // });


   //Resend button disabled
    $('#rsndotp').addClass('_0rgSaz').prop('disabled', true);
    // Start the timer for 60 seconds
     var timer = 60;
     var interval;
   
     // Function to start the timer
     function startTimer() {
       interval = setInterval(function () {
         $("#timrstrd").text(formatTime(timer));
         timer--;
         if (timer < 0) {
           clearInterval(interval);
           //Resend button enabled
           $('#rsndotp').removeClass('_0rgSaz').prop('disabled', false);
         }
       }, 1000); 
     }
   
     //Function to stop the timer
     function stopTimer() {
       clearInterval(interval);
       $("#timrstrd").text("00:00");
     }
   
     // Function to format the time
     function formatTime(time) {
       var minutes = Math.floor(time / 60);
       var seconds = time % 60;
       return (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds);
     }

  //Creating user account
  $(document).on("click", "#sbmtcrtacnt", function (e) {
    e.preventDefault();

    //Getting values
    var name = $("#inputname2").val();
    var email = $("#inputEmail2").val();
    var password = $("#inputPassword2").val();

    var nameRegex = /^[A-Za-z\s]+$/;
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (name === "") {
      $(".msgerror1").text("Invalid Field: Name cannot be empty");
    } else if (!nameRegex.test(name)) {
      $(".msgerror1").text("Invalid Field: Name should only contain alphabets");
    } else if (email === "") {
      $(".msgerror2").text("Invalid Field: Email should be empty");
    } else if (!emailRegex.test(email)) {
      $(".msgerror2").text("Invalid Field: Email is invalid");
    } else if (password === "") {
      $(".msgerror3").text("Invalid Field: Password cannot be empty");
    } else if (password.length < 8) {
      $(".msgerror3").text("Invalid Field: Password should be at least 8 characters");
    } else {
      // All fields are valid, send AJAX request
      $.ajax({
        type: "POST",
        url: baseURL+'signin/createAccount',
        dataType: 'json',
        data: {
          name: name,
          email: email,
          password: password
        },
        beforeSend: function () {
          $('#sbmtcrtacnt').html('<div class="spinner-border text-light" role="status"></div>');
        },
        success: function(response) {
          $('#sbmtcrtacnt').html('Continue');
          // Handle success response from the server
          //console.log('Success:', response);
          if(response.success == '1' || response.success == 'Registration Successful'){
            $('._crdenfld').addClass('d-none');
            $('._authfld').removeClass('d-none');
            $(".svmsg").html('<p class="svmsgP _smgrn">We`ve sent you an OTP to your email address</p>');
            startTimer();
          }else if(response.error == '0' || response.error == 'Data not received!'){
            $(".svmsg").html('<p class="svmsgP _smred">Email address already exists!</p>');
          }else{
            $(".svmsg").html('');
          }
        },
        error: function(xhr, status, error) {
          // Handle error response from the server
          console.log('Error:', error);
        }
      });
      //

    }
  });

//Event listener for the _resdme class
$(document).on("click", "#rsndotp", function (e) {
  e.preventDefault();
   //Resend button disabled
   $('#rsndotp').addClass('_0rgSaz').prop('disabled', true);
  stopTimer(); // Stop the current timer
  timer = 60; // Reset the timer value
  startTimer(); // Start the timer again

  // Resend the OTP using AJAX
  var email = $("#inputEmail2").val();
  $.ajax({
    type: 'POST',
    url: baseURL+'signin/resend',
    dataType: 'json',
    data: { email: email},
    success: function (response) {
     // console.log(response);
      if (response.success == '1' || response.success == 'OTP Resent') {
        $(".svmsg").html('<p class="svmsgP _smgrn">We`ve resent you an OTP on your email address</p>');
      } else if (response.error == '0' || response.error == 'Data not received!') {
        $(".svmsg").html('<p class="svmsgP _smred">Something went wrong!</p>');
      }else{
        $(".svmsg").html('');
      }
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    }
  });

});

//Authentication
$(document).on("click", "#vrfotp", function (e) {
  e.preventDefault();

  var otp = $('#inputotp1').val();
    
  // Remove any non-digit characters from the input
  var digitsOnly = otp.replace(/\D/g, '');
  
  // Check if the input is empty or not a 6-digit number
  if (digitsOnly.length !== 6) {
    // Invalid input
    $(".msgerror4").text("Invalid OTP");
  } else {

  $.ajax({
    type: 'POST',
    url: baseURL+'signin/verify',
    dataType: 'json',
    data: { otp: otp},
    beforeSend: function () {
      $('#vrfotp').html('<div class="spinner-border text-light" role="status"></div>');
    },
    success: function (response) {
      $('#vrfotp').html('Continue');
     // console.log(response);
      if (response.success == '1' || response.success == 'Account Verified') {
        //If otp successfully verified then show login page
        $("#signInModal").removeClass("active");
        $("#logInModal").addClass("active");
        $('._crdenfld').addClass('d-flex');
        $('._authfld').addClass('d-none');
      } else if (response.error) {
        $(".svmsg").html('<p class="svmsgP _smred">'+response.error+'</p>');
      }else{
        $(".svmsg").html('');
      }
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    }
  });

  }
});

//Login to the website

$(document).on("click", "#lg2web", function (e) {
  e.preventDefault();

  //Getting values
  var email = $("#inputEmail1").val();
  var password = $("#inputPassword1").val();

  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

 if (email === "") {
    $(".msgerror5").text("Invalid Field: Email should be empty");
  } else if (!emailRegex.test(email)) {
    $(".msgerro5").text("Invalid Field: Email is invalid");
  } else if (password === "") {
    $(".msgerror6").text("Invalid Field: Password cannot be empty");
  } else if (password.length < 8) {
    $(".msgerror6").text("Invalid Field: Password should be at least 8 characters");
  } else {
    // All fields are valid, send AJAX request
    $.ajax({
      type: "POST",
      url: baseURL+'signin/login',
      dataType: 'json',
      data: {
        email: email,
        password: password
      },
      beforeSend: function () {
        $('#lg2web').html('<div class="spinner-border text-light" role="status"></div>');
      },
      success: function(response) {
        $('#lg2web').html('Continue');
        // Handle success response from the server
        //console.log('Success:', response);
        if(response.success == '1' || response.success == 'Welcome Back!'){
          window.location.href = window.location.href;
        }else if(response.error){
          $(".svmsg").html('<p class="svmsgP _smred">'+response.error+'</p>');
        }else{
          $(".svmsg").html('');
        }
      },
      error: function(xhr, status, error) {
        // Handle error response from the server
        console.log('Error:', error);
      }
    });
    //

  }
});

  //Check if charater is gretter than zero
  $(document).on("keyup", "._0keyinemp", function (e) {
    e.preventDefault();
    var inputValue = $(this).val();
    if (inputValue.length > 0) {
      $(".inputMsg").text("");
      $(".svmsg").html('');
    }
  });
  
//}); seemesm like ready doc closing file



   //Upload modal show on image click
   $(document).on("click", "#uplbtnndop", function (e) {
    e.preventDefault();
    $(".upl_modal").addClass("active");
  });

   //Upload modal hide on image click
   $(document).on("click", "#closeitup", function (e) {
    e.preventDefault();
    $(".upl_modal").removeClass("active");
  });

  // Add event listener to the remove button
// $(document).on("click", "#removebtnimg", function () {
//   var imageBox = $(this).closest(".image-box");
//   var image = imageBox.find("img");
//   var titleInput = imageBox.find('input.imgttl');
//   var descriptionInput = imageBox.find('input.imgdes');
//   var locationInput = imageBox.find('input.imgloc');
  
//   // Clear the file input
//   $("#upload").val("");
  
//   // Clear the image source and input values
//   image.attr("src", "");
//   titleInput.val("");
//   descriptionInput.val("");
//   locationInput.val("");
  
//   // Hide the image box
//   imageBox.hide();
  
//   uploadedFiles--;
  
//   if (uploadedFiles <= 0) {
//     uploadButton.hide();
//   }
//   });

  var previewContainer = $("#preview-container");
  var uploadButton = $(".btn-upload");
  var uploadedFiles = [];
  
  $(document).on("change", "#upload", function (e) {
    var files = e.target.files;
  
    for (var i = 0; i < files.length; i++) {
      
      if (uploadedFiles.length >= 4) {
        alert("You can only select up to 4 files.");
        break;
      }

      var file = files[i];
  
      // Validate the image file
      if (file.type !== "image/jpeg" && file.type !== "image/png") {
        alert("Please select only JPEG or PNG images.");
        continue;
      }
  
      if (file.size > 5 * 1024 * 1024) {
        alert("Please select images smaller than 5MB.");
        continue;
      }
  
      // Create an object to store file information
      var fileData = {
        file: file,
        title: "",
        description: "",
        location: ""
      };
  
      // Add fileData object to the uploadedFiles array
      uploadedFiles.push(fileData);
  
      // Create HTML elements for image preview and details
      var imageBox = $('<div class="col-md-2 image-box"></div>');
      var image = $('<div class="prvimg"><img class="img-fluid" src="' + URL.createObjectURL(file) + '"></div>');
      var imageDetails = $('<div class="image-details"></div>');
      var titleInput = $('<input type="text" class="imgttl _imginf" placeholder="Title">');
      var descriptionInput = $('<input type="text" class="imgdes _imginf" placeholder="Description">');
      var locationInput = $('<input type="text" class="imgloc _imginf" placeholder="Location">');
      var removeButton = $('<button class="remove-btn" id="removebtnimg"><i class="fa-solid fa-x"></i></button>');
  
      // Append remove button to the image element
      image.append(removeButton);
  
      // Bind event handlers to update fileData when inputs change
      titleInput.on("input", createInputChangeListener(fileData, "title"));
      descriptionInput.on("input", createInputChangeListener(fileData, "description"));
      locationInput.on("input", createInputChangeListener(fileData, "location"));
  
      imageBox.append(image);
      imageDetails.append(titleInput);
      imageDetails.append(descriptionInput);
      imageDetails.append(locationInput);
      imageBox.append(imageDetails);
      previewContainer.append(imageBox);
    }
  
    updateUploadButtonState();
  });
  
  function createInputChangeListener(fileData, property) {
    return function (e) {
      fileData[property] = e.target.value;
    };
  }
  
  function updateUploadButtonState() {
    if (uploadedFiles.length > 0) {
      uploadButton.show();
    } else {
      uploadButton.hide();
    }
  }
  
  $(document).on("click", ".remove-btn", function () {
    var imageBox = $(this).closest(".image-box");
    var index = imageBox.index();
    uploadedFiles.splice(index, 1);
    imageBox.remove();
    updateUploadButtonState();
  });
  
  $(document).on("click", ".btn-upload", function (e) {
    e.preventDefault();
  
    // Check if any title, description, or location field is empty
    var isAnyFieldEmpty = uploadedFiles.some(function (fileData) {
      return fileData.title === "" || fileData.description === "" || fileData.location === "";
    });
  
    if (isAnyFieldEmpty) {
      alert("Title, description, and location fields cannot be empty.");
      return;
    }
  
    var formData = new FormData();
    // Add the files to the FormData object
    for (var i = 0; i < uploadedFiles.length; i++) {
      var fileData = uploadedFiles[i];
      formData.append("files[]", fileData.file);
      formData.append("titles[]", fileData.title);
      formData.append("descriptions[]", fileData.description);
      formData.append("locations[]", fileData.location);
    }
  
    // Send AJAX request to upload images
    $.ajax({
      url: baseURL + "images/uploadImg",
      type: "POST",
      processData: false,
      contentType: false,
      data: formData,
      success: function (response) {
        console.log("Images uploaded successfully:", response);
        // Clear image details and remove image boxes
        $("#preview-container").empty();
        uploadedFiles = [];
        updateUploadButtonState();
        $(".upl_modal").removeClass("active");
        loadData();
      },
      error: function (error) {
        console.error("Error uploading images:", error);
        // Show error message or handle the error
        // You can display an error message to the user or perform any necessary error handling steps.
      },
    });
  });
  

//download image
  
// $(document).on('click', '.downloadmedown', function(e) {
//   e.preventDefault();

//   var file = $(this).data('file');
//   var key = $(this).data('key');
//   var extension = file.split('.').pop(); // Get the original file extension

//   // Create a hidden anchor tag and set its attributes
//   var anchor = $('<a>').attr({
//     href: 'assets/upload/' + file,
//     download: 'ArtG_' + key + '.' + extension // Set the desired file name with the original extension
//   });

//   // Trigger a click event on the anchor tag to initiate the file download
//   anchor[0].click();
// });



    // AJAX request to fetch image data
    function loadData() {
    
      $.ajax({
        url: baseURL + 'upmg/fetchProfile',// Replace with the actual PHP file that handles the data retrieval
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // Handle the response data
          console.log(response);
          $('#shmprodata').html(response);
          $(".upl_modal").removeClass("active");
        },
        error: function(xhr, status, error) {
          console.error('AJAX request error:', error);
        }
      });
      }

      loadData();


     // SAVE COLLECTION
$(document).on("click", ".likemebtn", function (e) {
  e.preventDefault();
  var $heartIcon = $(this).find("i");
  $heartIcon.toggleClass("saved");
  var imageId = $(this).data("image-id");
  var isLiked = $heartIcon.hasClass("saved") ? 1 : 0;

  $.ajax({
    url: baseURL + 'others/collection', // Replace with the URL of your server-side script
    method: "POST", // Change the HTTP method if necessary
    data: { imageId: imageId, isLiked: isLiked },
    success: function (response) {
      // Handle the server's response if needed
      console.log(response);
    },
    error: function (xhr, status, error) {
      // Handle errors
    }
  });
});

 
      // SAVE COLLECTION
$(document).on("click", "._dlBtn", function (e) {
  e.preventDefault();

  var id = $(this).closest('._dwf07ll').data('id');


  $.ajax({
    url: baseURL + 'delete/delt', // Replace with the URL of your server-side script
    method: "POST", // Change the HTTP method if necessary
    data: {id:id},
    success: function (response) {
      // Handle the server's response if needed
      console.log(response);
      loadData();
    },
    error: function (xhr, status, error) {
      // Handle errors
    }
  });
});





$(document).on('click','.profile-upload',function() {
  var file = $('#profilepicture')[0].files[0]; // Get the selected file
  var dob = $('#dob').val(); // Get the value of the Date of Birth input

  // Validate inputs
  if (!file || !dob) {
    // Display an error message if any of the inputs are empty
    if (!file) {
      $('.msgerror20').text('Please choose a profile picture');
    } else {
      $('.msgerror20').text(''); // Clear the error message if it was previously set
    }

    if (!dob) {
      $('.msgerror19').text('Please enter your date of birth');
    } else {
      $('.msgerror19').text(''); // Clear the error message if it was previously set
    }

    return; // Stop further execution if inputs are not valid
  }

  // Check the file size
  var fileSize = file.size;
  var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
  if (fileSize > maxSize) {
    $('.msgerror20').text('Please choose an image smaller than 5 MB');
    return; // Stop further execution if the file size exceeds the limit
  } else {
    $('.msgerror20').text(''); // Clear the error message if it was previously set
  }

  // Check the file format
  var fileExtension = file.name.split('.').pop().toLowerCase();
  if (fileExtension !== 'jpg' && fileExtension !== 'png') {
    $('.msgerror20').text('Please choose a JPG or PNG image');
    return; // Stop further execution if the file format is not allowed
  } else {
    $('.msgerror20').text(''); // Clear the error message if it was previously set
  }

  // Create a FormData object to send the file and data
  var formData = new FormData();
  formData.append('files', file);
  formData.append('dob', dob);

  // Make the AJAX request
  $.ajax({
    url: baseURL + 'others/profileEdit', // Replace with the actual URL of your backend endpoint
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function(response) {
      // Handle the success response from the server
      // console.log(response);
      window.location.href = window.location.href;
    },
    error: function(xhr, status, error) {
      // Handle the error response from the server
      console.error(error);
    }
  });
});




//Profile Edit Modal , Open the modal when the fetch button is clicked
$(document).on("click", '.prfedbtn', function(e) {
  e.preventDefault();
  $(".prfl_modal").addClass("active");
});

// Close the modal when the close button is clicked
$(document).on("click", '#closeitupprf',function(e) {
  e.preventDefault();
  $(".prfl_modal").removeClass("active");
});







// Attach a focus event handler to an input element
$(document).on('focus','.search',function() {
  $('.art_autocomplete').addClass('active');
  $('.art_bLrB4CN70D_content_search').addClass('active');
});
$(document).on('click', function(event) {
  // Check if the target of the click event is inside or outside of the art_bLrB4CN70D_content_search element
  if (!$(event.target).closest('.art_bLrB4CN70D_content_search').length) {
    // The click target is outside of the art_bLrB4CN70D_content_search element
    $('.art_autocomplete').removeClass('active');
  }
});


$(document).on('keyup focus', '.search', function() {
  $('.art_autocomplete').addClass('active');
  var query = $(this).val(); // Get the value of the search input
  if (query !== '') {
      $.ajax({
          url: baseURL + 'home/search',
          type: 'POST',
          data: { query: query },
          dataType: 'json',
          success: function(response) {
            console.log(response);
              var autocompleteList = $('.art_autocomplete > ul');
              autocompleteList.empty(); // Clear the autocomplete list

              if (response.length > 0) {
                  $.each(response, function(index, item) {
                     var url = 's.php?t=' + encodeURIComponent(item.title);
                      // Append each search result to the autocomplete list
                      autocompleteList.append('<li><a href="sr?t='+url+'">' + item.title + '</a></li>');
                  });
              } else {
                  // Display "No Result Found" message when there are no search results
                  autocompleteList.append('<p>No Result Found</p>');
              }

              $('.art_autocomplete').addClass('active'); // Show the autocomplete results
          },
          error: function(xhr, status, error) {
            console.error('AJAX request error:', error);
          }
      });
  } else {
      $('.art_autocomplete').removeClass('active'); // Hide the autocomplete results when the search input is empty
  }
});
// Prevent autocomplete from hiding when clicking on href


//CONTACT US

// Click event handler for the submit button
$(document).on('click','#reqstSent',function(e) {
  e.preventDefault();
  // Clear previous error messages
  $('.inputMsg').text('');

  // Validate the fields
  var isValid = true;
  if ($('#inputName3').val() === '') {
    $('#nameHelp3').text('Name is required.');
    isValid = false;
  }
  if ($('#inputEmail3').val() === '') {
    $('#emailHelp3').text('Email is required.');
    isValid = false;
  }
  if ($('#inputReason3').val() === '') {
    $('#reasonHelp3').text('Reason is required.');
    isValid = false;
  }
  if ($('#textareaDetails3').val() === '') {
    $('#detailsHelp3').text('Details are required.');
    isValid = false;
  }

  // If all fields are valid, send the data to the server
  if (isValid) {
    var formData = {
      name: $('.cntinputName3').val(),
      email: $('.cntinputEmail3').val(),
      reason: $('.cntinputReason3').val(),
      details: $('#textareaDetails3').val()
    };
    // console.log(formData);
    // Send the data using AJAX
    $.ajax({
      url: baseURL + 'contact/messaging',
      type: 'POST',
      data: formData,
      dataType : 'json',
      beforeSend: function () {
        $('.reqstSent').html('<div class="spinner-border text-light" role="status"></div>');
      },
      success: function(response) {
        $('.reqstSent').html('Submit Request');
        // Handle the response from the server
        //console.log(response);
        if(response.success){
          alert('Message Sent!');
        }else{
          console.log('something went wrong!');
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error
        console.error(textStatus, errorThrown);
      }
    });
  }
});

$(document).on('click','.loadMoredata', function() {
  fetchData();
});

// AJAX request to fetch image HOME PAGE
var limit = 10; // Set the maximum number of rows to fetch
var offset = 0; // Initialize the offset variable

function fetchData() {
  $.ajax({
    url: baseURL + 'home/fetchData',
    type: 'GET',
    data: { offset: offset }, // Send the current value of the offset variable as a parameter
   // dataType: 'json',
    success: function(response) {
      console.log(response);
        // Handle the response data
      $('#hmdatimg').append(response);
      offset += 10; // Increment the offset variable by 10

      // Check if there are no more rows to fetch
  if (response.length < limit) {
    // Disable the Load more button
    $('.loadMoredata').prop('disabled', true);
  }
    },
    error: function(xhr, status, error) {
      console.error('AJAX request error:', error);
    }
  });
}

fetchData();


$(document).on('click','.publisher',function(e) {
  e.preventDefault();
  var imageID = $(this).closest('.painting_canvas').data('image-id');
  var uidn = $(this).closest('.painting_canvas').data('uidn');
//console.log(imageID);
  $.ajax({
    url: baseURL + 'home/artboard',
    method: 'POST',
   dataType: 'json',
    data: { imageID: imageID, uidn: uidn },
    success: function(response) {
      // Handle the Ajax response here
      //console.log(response);
      //showing modal
      
        $('.artist_modal').addClass('active');
        $('#myartgallery').html(response);
     
    },
    error: function(xhr, status, error) {
      // Handle any errors that occur during the Ajax request
      console.log(error);
    }
  });
});

  //Hide modal login account through nav button
  $(document).on("click", "#closemeart", function (e) {
    e.preventDefault();
    $(".artist_modal").removeClass("active");
  });



  $(document).on('click', '.downloadmedown', function(e) {
    e.preventDefault();
    var imageID = $(this).closest('.painting_canvas').data('image-id');
    var id = '';
    
    if (typeof imageID !== 'undefined') {
      id = imageID;
    } else {
      id = $(this).closest('.painting_canvas').data('id');
    }

    var file = $(this).data('file');
    var key = $(this).data('key');
    var extension = file.split('.').pop(); // Get the original file extension
  
    // Create a hidden anchor tag and set its attributes
    var anchor = $('<a>').attr({
      href: 'assets/upload/' + file,
      download: 'ArtG_' + key + '.' + extension // Set the desired file name with the original extension
    });
  
    // Trigger a click event on the anchor tag to initiate the file download
    anchor[0].click();
  console.log(imageID);
    // Send an AJAX request to update the download count in the database
    $.ajax({
      url: baseURL + 'images/downCount', // Replace with the actual URL to your PHP script
      method: 'POST',
      dataType:'json',
      data: { imageID: imageID }, // Pass the image ID to the PHP script
      success: function(response) {
        console.log(response);
        console.log('1');
      },
      error: function(xhr, status, error) {
        console.error('Error updating download count: ' + error);
      }
    });
  });

});




  