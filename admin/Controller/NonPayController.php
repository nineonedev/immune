<?php

require_once "../../inc/lib/base.class.php";
require_once "../Model/NonPayModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // INSERT
    if ($mode === 'insert') {
        $data = [
            'category_primary'   => (int)($input['category_primary'] ?? 0),
            'category_secondary' => (int)($input['category_secondary'] ?? 0),
            'title'              => trim($input['title'] ?? ''),
            'cost'               => (int)($input['cost'] ?? 0),
            'notice'             => trim($input['notice'] ?? ''),
            'sort_no'            => (int)($input['sort_no'] ?? 0),
            'is_active'          => (int)($input['is_active'] ?? 1), 
        ];

        if (!$data['category_primary'] || !$data['category_secondary'] || !$data['title']) {
            echo json_encode(['success' => false, 'message' => '카테고리와 항목명은 필수입니다.']);
            exit;
        }

        $result = NonPayModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '비급여 항목이 등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }

    // UPDATE
    if ($mode === 'update') {
        
        $id = (int)($input['id'] ?? 0);
     
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID가 없습니다.']);
            exit;
        }

        $data = [
            'category_primary'   => (int)($input['category_primary'] ?? 0),
            'category_secondary' => (int)($input['category_secondary'] ?? 0),
            'title'              => trim($input['title'] ?? ''),
            'cost'               => (int)($input['cost'] ?? 0),
            'notice'             => trim($input['notice'] ?? ''),
            'sort_no'            => (int)($input['sort_no'] ?? 0),
            'is_active'          => (int)($input['is_active'] ?? 1), 
        ];

        if (!$data['category_primary'] || !$data['category_secondary'] || !$data['title']) {
            echo json_encode(['success' => false, 'message' => '카테고리와 항목명은 필수입니다.']);
            exit;
        }

        $result = NonPayModel::update($id, $data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '수정되었습니다.' : '수정 실패'
        ]);
        exit;
    }

    // DELETE
    if ($mode === 'delete') {
        $id = (int)($input['id'] ?? 0);
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID가 없습니다.']);
            exit;
        }

        $result = NonPayModel::delete($id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '삭제되었습니다.' : '삭제 실패'
        ]);
        exit;
    }

        // DELETE_ARRAY
    if ($mode === 'delete_array') {
        $ids = json_decode($input['ids'] ?? '[]', true);

        if (!is_array($ids) || empty($ids)) {
            echo json_encode(['success' => false, 'message' => '삭제할 항목이 없습니다.']);
            exit;
        }

        $result = NonPayModel::deleteMultiple($ids);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '선택 항목이 삭제되었습니다.' : '삭제 실패'
        ]);
        exit;
    }


    echo json_encode(['success' => false, 'message' => '유효하지 않은 요청입니다.']);
    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => '처리 중 오류 발생: ' . $e->getMessage()
    ]);
}