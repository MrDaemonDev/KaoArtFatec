<?php

session_start();

require "../../../config/database.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
  echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
  exit;
}

// Recebe os dados do carrinho
$carrinho = json_decode($_POST['carrinho'], true);
$total = floatval($_POST['total']);
$user_id = $_SESSION['user_id'];

if (empty($carrinho)) {
  echo json_encode(['sucesso' => false, 'mensagem' => 'Carrinho vazio']);
  exit;
}

// Inicia uma transação
mysqli_begin_transaction($conn);

try {
  // INSERT do pedido
  $sql_pedido = "INSERT INTO pedidos (user_id, total_valor, status) VALUES ($user_id, $total, 'Pendente')";

  if (!mysqli_query($conn, $sql_pedido)) {
    throw new Exception("Erro ao criar pedido: " . mysqli_error($conn));
  }

  $pedido_id = mysqli_insert_id($conn);

  // INSERT dos itens do pedido
  foreach ($carrinho as $item) {
    $produto_id = $item['id'];
    $quantidade = $item['quantidade'];
    $preco_unit = floatval($item['preco']);
    $tamanho = isset($item['tamanho']) ? "'" . mysqli_real_escape_string($conn, $item['tamanho']) . "'" : "NULL";

    $sql_item = "INSERT INTO itens_pedidos (pedido_id, produto_id, quantidade, preco_unit, tamanho) 
                     VALUES ($pedido_id, $produto_id, $quantidade, $preco_unit, $tamanho)";

    if (!mysqli_query($conn, $sql_item)) {
      throw new Exception("Erro ao inserir item do pedido: " . mysqli_error($conn));
    }
  }

  // Confirma a transação
  mysqli_commit($conn);

  echo json_encode(['sucesso' => true, 'mensagem' => 'Pedido criado com sucesso!', 'pedido_id' => $pedido_id]);

} catch (Exception $e) {
  mysqli_rollback($conn);
  echo json_encode(['sucesso' => false, 'mensagem' => $e->getMessage()]);
}
