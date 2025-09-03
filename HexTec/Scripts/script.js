// Seleciona os elementos do menu
const openMenuBtn = document.getElementById("openMenu");
const navMenu = document.querySelector(".navigation");
const closeMenuBtn = document.getElementById("closeMenu");

// Função para abrir o menu mobile
openMenuBtn.addEventListener("click", () => {
    navMenu.style.display = "flex";
    openMenuBtn.style.display = "none";

    // Botão de fechar (adiciona dinamicamente se não existir)
    if (!closeMenuBtn) {
        const closeBtn = document.createElement("button");
        closeBtn.textContent = "X";
        closeBtn.id = "closeMenu";
        closeBtn.style.marginLeft = "auto";
        closeBtn.style.background = "none";
        closeBtn.style.border = "none";
        closeBtn.style.fontSize = "20px";
        closeBtn.style.color = "#00ffcc";
        closeBtn.style.cursor = "pointer";

        closeBtn.addEventListener("click", () => {
            navMenu.style.display = "none";
            openMenuBtn.style.display = "block";
        });

        navMenu.appendChild(closeBtn);
    } else {
        closeMenuBtn.style.display = "block";
    }
});
