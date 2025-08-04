<?php

require_once "../../inc/lib/base.class.php";
require_once "../Model/SeoModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // ============ INSERT ============
    if ($mode === 'insert') {
        $branch_id = (int)($input['branch_id'] ?? 0);
        $path = trim($input['path'] ?? '');
        $page_title = trim($input['page_title'] ?? '');
        $meta_title = trim($input['meta_title'] ?? '');
        $meta_description = trim($input['meta_description'] ?? '');
        $meta_keywords = trim($input['meta_keywords'] ?? '');

        if (!$branch_id || !$path || !$page_title) {
            echo json_encode([
                'success' => false,
                'message' => '지점, 경로, 페이지 제목은 필수입니다.'
            ]);
            exit;
        }

        $result = SeoModel::insert([
            'branch_id' => $branch_id,
            'path' => $path,
            'page_title' => $page_title,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords
        ]);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }

    // ============ UPDATE ============
    if ($mode === 'update') {
        $id = (int)($input['id'] ?? 0);

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID가 없습니다.']);
            exit;
        }

        $data = [
            'branch_id' => (int)($input['branch_id'] ?? 0),
            'path' => trim($input['path'] ?? ''),
            'page_title' => trim($input['page_title'] ?? ''),
            'meta_title' => trim($input['meta_title'] ?? ''),
            'meta_description' => trim($input['meta_description'] ?? ''),
            'meta_keywords' => trim($input['meta_keywords'] ?? ''),
        ];

        // 필수값 유효성 검사
        if (!$data['branch_id'] || !$data['path'] || !$data['page_title']) {
            echo json_encode([
                'success' => false,
                'message' => '지점, 경로, 페이지 제목은 필수 입력 항목입니다.'
            ]);
            exit;
        }

        $result = SeoModel::update($id, $data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '수정되었습니다.' : '수정 실패'
        ]);
        exit;
    }


    // ============ DELETE ============
    if ($mode === 'delete') {
        $id = (int)($input['id'] ?? 0);

        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'ID가 없습니다.']);
            exit;
        }

        $result = SeoModel::delete($id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '삭제되었습니다.' : '삭제 실패'
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