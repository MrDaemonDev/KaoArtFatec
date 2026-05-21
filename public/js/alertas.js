document.addEventListener("DOMContentLoaded", function () {
  const alertBadge = document.getElementById("alertBadgeCount");
  const alertList = document.getElementById("alertList");
  const alertFallback = document.getElementById("alertFallback");

  if (!alertBadge || !alertList) {
    return;
  }

  const backendPath = window.location.pathname.includes("/admin/")
    ? "../../backend/functions/pedidos/alertasArte.php"
    : "../backend/functions/pedidos/alertasArte.php";

  fetch(backendPath)
    .then((response) => response.json())
    .then((data) => {
      if (!data.sucesso) {
        if (alertFallback) {
          alertFallback.textContent = "Erro ao carregar alertas.";
        }
        return;
      }

      const alertas = data.alertas || [];
      alertBadge.textContent = alertas.length > 0 ? alertas.length : "";
      alertBadge.style.display = alertas.length > 0 ? "inline-block" : "none";

      if (alertas.length === 0) {
        if (alertFallback) {
          alertFallback.textContent =
            "Nenhuma atualização de arte por enquanto.";
        }
        return;
      }

      alertList.innerHTML = alertas
        .map((alerta) => {
          const texto =
            alerta.arte_status === "Aprovada"
              ? `Sua arte para "${alerta.produto_nome}" foi aprovada.`
              : `Sua arte para "${alerta.produto_nome}" precisa de alteração.`;

          return `
                    <li>
                        <a class="dropdown-item small" href="${alerta.link}">
                            <strong>${alerta.arte_status}</strong><br>
                            ${texto}
                            <div class="text-muted small mt-1">Pedido #${alerta.pedido_id}</div>
                        </a>
                    </li>
                `;
        })
        .join("");
    })
    .catch(() => {
      if (alertFallback) {
        alertFallback.textContent = "Erro ao carregar alertas.";
      }
    });
});
