const botoes = document.querySelectorAll(".add-to-cart");

botoes.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();

    const card = btn.closest(".card");
    const produtoDiv = btn.closest(".produto");
    const id = parseInt(produtoDiv.getAttribute("data-id"));
    const nome = card.querySelector(".card-title").innerText;
    const preco = card
      .querySelector(".preco")
      .innerText.replace("R$", "")
      .replace(",", ".")
      .trim();
    const img = card.querySelector("img").src;

    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    const existente = carrinho.find((p) => p.id === id);

    if (existente) {
      existente.quantidade += 1;
    } else {
      carrinho.push({
        id,
        nome,
        preco: parseFloat(preco),
        img,
        quantidade: 1,
        observacoes: "",
      });
    }

    localStorage.setItem("carrinho", JSON.stringify(carrinho));

    atualizarBadgeCarrinho();
  });
});

function atualizarBadgeCarrinho() {
  let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
  const totalItens = carrinho.reduce((acc, p) => acc + p.quantidade, 0);
  const badge = document.querySelector(".bi-cart ~ .badge, .bi-cart + .badge");
  if (badge) badge.textContent = totalItens;
}

document.addEventListener("DOMContentLoaded", atualizarBadgeCarrinho);
