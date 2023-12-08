    function goToSecondPage() {
      window.location.href = "Dashboard.html";
    }
    function goToAdminPage() {
      window.location.href = "admin.html";
    }
    function goToStudentPage() {
      window.location.href = "login.html";
    }
    const minusBtn = document.querySelector('.minus-btn');
    const plusBtn = document.querySelector('.plus-btn');
    const count = document.querySelector('.count');
    
    minusBtn.addEventListener('click', () => {
        count.textContent = parseInt(count.textContent) - 1;
    });
    
    plusBtn.addEventListener('click', () => {
        count.textContent = parseInt(count.textContent) + 1;
    });
    function goToCartPage() {
      window.location.href = "cart.html";
    }
    function goToConfirmPage() {
      window.location.href = "confirm.html";
    }
    function goToPaymentPage() {
      window.location.href = "payment.html";
    }