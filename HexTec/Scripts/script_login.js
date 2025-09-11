 //splash
 
 window.addEventListener("load", () => {
      document.querySelector(".splash").classList.add("hidden");
    });

// ocultar senha 

    document.querySelector(".toggle-password").addEventListener("click", () => {
      const senha = document.getElementById("senha");
      senha.type = senha.type === "password" ? "text" : "password";
    });