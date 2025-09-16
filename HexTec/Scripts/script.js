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

// Modal produtos
const modal = document.getElementById("modal");
const modalNome = document.getElementById("modalNome");
const modalPreco = document.getElementById("modalPreco");
const modalDescricao = document.getElementById("modalDescricao");
const modalImagem = document.getElementById("modalImagem");
const closeModal = document.getElementById("closeModal");
const btnCarrinho = document.getElementById("addCarrinho");

// Abrir modal
document.querySelectorAll(".produto").forEach(prod => {
    prod.addEventListener("click", () => {
        modalNome.textContent = prod.dataset.nome;
        modalPreco.textContent = "Preço: R$ " + prod.dataset.preco;
        modalDescricao.textContent = prod.dataset.descricao;
        modalImagem.src = prod.dataset.imagem;
        modal.style.display = "flex";
    });
});

// Fechar modal
closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

// Fechar clicando fora do modal
window.addEventListener("click", (e) => {
    if(e.target === modal){
        modal.style.display = "none";
    }
});

// Botão adicionar no carrinho
btnCarrinho.addEventListener("click", () => {
    alert(`Produto "${modalNome.textContent}" adicionado ao carrinho!`);
});
