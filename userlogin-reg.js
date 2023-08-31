//show hide pass
const eyeIcons = document.querySelectorAll(".show-hide");

eyeIcons.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
      const pInput = eyeIcon.parentElement.querySelector("input");
      
      if (pInput.type === "password") {
          eyeIcon.classList.replace("uil-eye-slash", "uil-eye");
          return (pInput.type = "text");
      }

      eyeIcon.classList.replace("uil-eye", "uil-eye-slash");
      return (pInput.type = "password");
 });
});



