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
