<?php

require_once "../../inc/lib/base.class.php";
require_once "../Model/SettingModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // ============ insert ============
    if ($mode === 'insert') {
        $title = trim($input['title'] ?? '');
        $tag = trim($input['tag_content'] ?? '');

        if (empty($title) || empty($tag)) {
            echo json_encode([
                'success' => false,
                'message' => '제목과 태그 내용을 모두 입력해주세요.'
            ]);
            exit;
        }

        $result = SiteTagModel::insert([
            'title' => $title,
            'tag_content' => $tag,
            'is_active' => 1
        ]);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }

    // ============ update ============
    if ($mode === 'update') {
        $id = (int)($input['id'] ?? 0);
        $title = trim($input['title'] ?? '');
        $tag = trim($input['tag_content'] ?? '');
        $is_active = isset($input['is_active']) ? (int)$input['is_active'] : 1;

        if (!$id || empty($title) || empty($tag)) {
            echo json_encode([
                'success' => false,
                'message' => 'ID, 제목, 태그 내용은 필수입니다.'
            ]);
            exit;
        }

        $result = SiteTagModel::update($id, [
            'title' => $title,
            'tag_content' => $tag,
            'is_active' => $is_active
        ]);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '수정되었습니다.' : '수정 실패'
        ]);
        exit;
    }

    // ============ delete ============
    if ($mode === 'delete') {
        $id = (int)($input['id'] ?? 0);

        if (!$id) {
            echo json_encode([
                'success' => false,
                'message' => 'ID가 없습니다.'
            ]);
            exit;
        }

        $result = SiteTagModel::delete($id);

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

         $result = SiteTagModel::deleteMultiple($ids);
         
        echo json_encode([
            'success' => $result,
            'message' => $result ? '선택 항목이 삭제되었습니다.' : '삭제 실패'
        ]);
        exit;
    }



    echo json_encode([
        'success' => false,
        'message' => '유효하지 않은 요청입니다.'
    ]);
    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => '처리 중 오류 발생: ' . $e->getMessage()
    ]);
}