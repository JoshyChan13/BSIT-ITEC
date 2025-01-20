const viewCartButton = document.getElementById("viewCartButton");
  viewCartButton.addEventListener("click", function () {
    window.location.href = "view_cart.php";
  });

const logoutButton = document.getElementById('logoutButton');
    logoutButton.addEventListener('click', function() {
        window.location.href = 'logout.php';
    });