<?php

session_start();
require "../../../config/database.php";

header('Content-Type: application/json; charset=UTF-8');

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
  exit;
}

$user_id = intval($_SESSION['user_id']);

$sql = "SELECT ip.id,
       ip.pedido_id,
       ip.arte_status,
       pr.nome AS produto_nome
FROM itens_pedidos ip
JOIN pedidos p ON ip.pedido_id = p.id
JOIN produtos pr ON ip.produto_id = pr.id
WHERE p.user_id = $user_id
  AND ip.arte_status <> 'Pendente'
ORDER BY ip.id DESC
LIMIT 5";

$result = mysqli_query($conn, $sql);
$alertas = [];

while ($row = mysqli_fetch_assoc($result)) {
  $alertas[] = [
    'item_id' => $row['id'],
    'pedido_id' => $row['pedido_id'],
    'arte_status' => $row['arte_status'],
    'produto_nome' => $row['produto_nome'],
    'link' => 'carrinho.php'
  ];
}

echo json_encode(['sucesso' => true, 'alertas' => $alertas]);
