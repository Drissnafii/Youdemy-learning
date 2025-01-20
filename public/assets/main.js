const eyes = document.getElementById("password-toggle");
  const password = document.getElementById('password');
  const toggleIcon = document.getElementById('toggleIcon');
  
  eyes.addEventListener("click", () => {
    if (password.type === 'password') {
      password.type = 'text';
      toggleIcon.classList.remove('fa-eye');
      toggleIcon.classList.add('fa-eye-slash');
    } else {
      password.type = 'password';
      toggleIcon.classList.remove('fa-eye-slash');
      toggleIcon.classList.add('fa-eye');
    }
  })

  const toggleConfirmIcon = document.getElementById("confirm-password-toggle");
  const password_02 = document.getElementById('password_2');
  
  toggleConfirmIcon.addEventListener('click', () => {
    if (password_02.type === 'password') {
      password_02.type = 'text';
      toggleConfirmIcon.classList.remove('fa-eye');
      toggleConfirmIcon.classList.add('fa-eye-slash');
    } else {
      password_02.type = 'password';
      toggleConfirmIcon.classList.remove('fa-eye-slash');
      toggleConfirmIcon.classList.add('fa-eye');    }
  })