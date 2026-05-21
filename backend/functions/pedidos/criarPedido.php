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

  // Caminho para armazenar as artes enviadas
  $uploadDir = __DIR__ . '/../../../public/uploads/artes';
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  // INSERT dos itens do pedido
  foreach ($carrinho as $index => $item) {
    $produto_id = $item['id'];
    $quantidade = $item['quantidade'];
    $preco_unit = floatval($item['preco']);
    $tamanho = isset($item['tamanho']) ? "'" . mysqli_real_escape_string($conn, $item['tamanho']) . "'" : "NULL";
    $observacoes = isset($item['observacoes']) && trim($item['observacoes']) !== ''
      ? "'" . mysqli_real_escape_string($conn, $item['observacoes']) . "'"
      : "NULL";
    $arte_personalizada = "NULL";
    $arte_status = "'Pendente'";

    $fileKey = 'arte_' . $index;
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] !== UPLOAD_ERR_NO_FILE) {
      if ($_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Erro no envio do arquivo de arte: ' . $_FILES[$fileKey]['error']);
      }

      $allowedTypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg',
        'image/jpg' => 'jpg',
        'image/webp' => 'webp'
      ];
      $fileType = mime_content_type($_FILES[$fileKey]['tmp_name']);

      if (!array_key_exists($fileType, $allowedTypes)) {
        throw new Exception('Formato de imagem inválido. Use PNG, JPG ou WEBP.');
      }

      $extension = $allowedTypes[$fileType];
      $safeName = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($_FILES[$fileKey]['name'], PATHINFO_FILENAME));
      $newFileName = $safeName . '_' . time() . '.' . $extension;
      $destination = $uploadDir . '/' . $newFileName;

      if (!move_uploaded_file($_FILES[$fileKey]['tmp_name'], $destination)) {
        throw new Exception('Erro ao salvar o arquivo de arte.');
      }

      $arte_personalizada = "'" . mysqli_real_escape_string($conn, $newFileName) . "'";
    }

    $sql_item = "INSERT INTO itens_pedidos (pedido_id, produto_id, quantidade, preco_unit, tamanho, observacoes, arte_personalizada, arte_status) 
                     VALUES ($pedido_id, $produto_id, $quantidade, $preco_unit, $tamanho, $observacoes, $arte_personalizada, $arte_status)";

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
