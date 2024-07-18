document.addEventListener("DOMContentLoaded", function() {
    var loginBtn = document.getElementById("loginBtn");
    var loginPopup = document.getElementById("loginPopup");
    var closeBtn = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the popup
    loginBtn.onclick = function() {
        loginPopup.style.display = "block";
    }

    // When the user clicks on <span> (x), close the popup
    closeBtn.onclick = function() {
        loginPopup.style.display = "none";
    }

    // When the user clicks anywhere outside of the popup, close it
    window.onclick = function(event) {
        if (event.target == loginPopup) {
            loginPopup.style.display = "none";
        }
    }
});
