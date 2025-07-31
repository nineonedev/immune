<?php
header("Content-Type: application/json");
include_once "../inc/lib/base.class.php";

$data = json_decode(file_get_contents("php://input"), true);

// 유효성 검사
if (!isset($data['sortOrder']) || !is_array($data['sortOrder'])) {
    echo json_encode([
        "success" => false,
        "message" => "잘못된 요청입니다."
    ]);
    exit;
}

try {
    $pdo = DB::getInstance();

    // 요청받은 ID들을 추출
    $ids = array_column($data['sortOrder'], 'id');

    if (empty($ids)) {
        echo json_encode(["success" => false, "message" => "ID가 없습니다."]);
        exit;
    }

    // 현재 DB에서 해당 sort_no 조회
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT no, sort_no FROM nb_board WHERE no IN ($placeholders)");
    $stmt->execute($ids);
    $currentSortMap = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $currentSortMap[$row['no']] = (int)$row['sort_no'];
    }

    $stmtUpdate = $pdo->prepare("UPDATE nb_board SET sort_no = :sort_no WHERE no = :id");
    $updatedCount = 0;

    foreach ($data['sortOrder'] as $item) {
        $id = (int)$item['id'];
        $newSortNo = (int)$item['sort_no'];
        $currentSortNo = $currentSortMap[$id] ?? null;

        if ($currentSortNo !== null && $currentSortNo !== $newSortNo) {
            $stmtUpdate->execute([
                ':sort_no' => $newSortNo,
                ':id' => $id
            ]);
            $updatedCount++;
        }
    }

    if ($updatedCount === 0) {
        echo json_encode([
            "success" => false,
            "message" => "변경된 정렬 순서가 없습니다.",
            "skipped" => true
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "message" => "정렬 순서가 업데이트되었습니다.",
            "updated" => $updatedCount
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "DB 오류",
        "error" => $e->getMessage()
    ]);
}