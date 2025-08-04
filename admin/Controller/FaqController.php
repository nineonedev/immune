<?php
require_once "../../inc/lib/base.class.php";
require_once "../Model/FaqModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // INSERT
    if ($mode === 'insert') {
        $data = [
            'branch_id'   => (int)($input['branch_id'] ?? 0),
            'categories'  => (int)($input['categories'] ?? 0),
            'question'    => trim($input['question'] ?? ''),
            'answer'      => trim($input['answer'] ?? ''),
            'sort_no'     => (int)($input['sort_no'] ?? 0),
            'is_active'   => (int)($input['is_active'] ?? 1)
        ];

        if (!$data['branch_id'] || !$data['categories'] || !$data['question']) {
            echo json_encode(['success' => false, 'message' => '지점, 카테고리, 질문은 필수입니다.']);
            exit;
        }

        $result = FaqModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'FAQ가 등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }

    // UPDATE
    if ($mode === 'update') {
        
        $id = ($input['id'] ?? 0);
     
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID가 없습니다.']);
            exit;
        }

        $data = [
            'branch_id'   => (int)($input['branch_id'] ?? 0),
            'categories'  => (int)($input['categories'] ?? 0),
            'question'    => trim($input['question'] ?? ''),
            'answer'      => trim($input['answer'] ?? ''),
            'sort_no'     => (int)($input['sort_no'] ?? 0),
            'is_active'   => (int)($input['is_active'] ?? 1)
        ];

        if (!$data['branch_id'] || !$data['categories'] || !$data['question']) {
            echo json_encode(['success' => false, 'message' => '지점, 카테고리, 질문은 필수입니다.']);
            exit;
        }

        $result = FaqModel::update($id, $data);

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

        $result = FaqModel::delete($id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '삭제되었습니다.' : '삭제 실패'
        ]);
        exit;
    }

    // DELETE_ARRAY
    if ($mode === 'delete_array') {
        $ids = json_decode($input['ids'] ?? '[]', true);

        if (!is_array($ids) || count($ids) === 0) {
            echo json_encode(['success' => false, 'message' => '삭제할 항목이 없습니다.']);
            exit;
        }

        $result = FaqModel::deleteMultiple($ids);

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