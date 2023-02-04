// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  
    modal.style.display = "block";
   
    
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    document.getElementById("regForm").reset();
    var aux = currentTab;
        var x = document.getElementsByClassName("tab");
        x[aux].style.display = "none";
        currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); 

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById("regForm").reset();
        var aux = currentTab;
        var x = document.getElementsByClassName("tab");
        x[aux].style.display = "none";
        currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); 

    }
}


/*var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    
    document.getElementById("nextBtn").innerHTML = "Registrar";
   // document.getElementById("nextBtn").id = "reg";
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function validate_Email(sender_email) {
  var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
 if (expression.test(sender_email)) {
     return true;
 }
 else {
     return false;
 }
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) {

        $.alert({
              useBootstrap: false,
               boxWidth: '30%',
                title: 'Mensaje',
               content: 'Debe llenar los campos.',
               animation: 'Rotate' 


            });
  	return false

  };
  // Hide the current tab:
  x[currentTab].style.display = "none";
  var aux = currentTab ;
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:

    
      
      var sender_email = $('#clientecorreo').val();
      // Check if the Fields are empty or not.
      if ($.trim(sender_email).length == 0 ) {
         // alert('All fields are mandatory,Try again');
          e.preventDefault();
      }
      if (validate_Email(sender_email)) {
           alert('Nice!! your Email is valid, now you can continue..');
           
         
           document.getElementById("regForm").submit();
          
      }
      else {
  
         // alert('Invalid Email Address');
          x[aux].style.display = "block";
          currentTab = aux;
        
          e.preventDefault();
      }
      

   
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}*/