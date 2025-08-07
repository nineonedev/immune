<?php

require_once "../../inc/lib/base.class.php";
require_once "../Model/NonPayModel.php";
require_once "../core/Validator.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // INSERT
    if ($mode === 'insert') {
        $validator = new Validator();
        $validator->require('category_primary', $input['category_primary'] ?? '', '1차 카테고리');
        $validator->require('category_secondary', $input['category_secondary'] ?? '', '2차 카테고리');
        $validator->require('title', $input['title'] ?? '', '항목명');
        $validator->require('cost', $input['cost'] ?? '', '금액');

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        // ✅ sort_no 자동 할당
        $sortNo = isset($input['sort_no']) && (int)$input['sort_no'] > 0
            ? (int)$input['sort_no']
            : NonPayModel::getMaxSortNo() + 1;

        $data = [
            'category_primary'   => (int)$input['category_primary'],
            'category_secondary' => (int)$input['category_secondary'],
            'title'              => trim($input['title']),
            'cost'               => (int)$input['cost'],
            'sort_no'            => $sortNo,
            'is_active'          => (int)($input['is_active'] ?? 1)
        ];

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

        $validator = new Validator();
        $validator->require('category_primary', $input['category_primary'] ?? '', '1차 카테고리');
        $validator->require('category_secondary', $input['category_secondary'] ?? '', '2차 카테고리');
        $validator->require('title', $input['title'] ?? '', '항목명');
        $validator->require('cost', $input['cost'] ?? '', '금액');

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $newSortNo = (int)($input['sort_no'] ?? 0);

        // ✅ 기존 sort_no 조회
        $stmt = DB::getInstance()->prepare("SELECT sort_no FROM nb_nonpay_items WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $oldSortNo = (int) $stmt->fetchColumn();

        // ✅ 정렬번호 충돌 처리
        if ($newSortNo !== $oldSortNo && $newSortNo > 0) {
            NonPayModel::shiftSortNosForUpdate($oldSortNo, $newSortNo, $id);
        }

        $data = [
            'category_primary'   => (int)$input['category_primary'],
            'category_secondary' => (int)$input['category_secondary'],
            'title'              => trim($input['title']),
            'cost'               => (int)$input['cost'],
            'sort_no'            => $newSortNo,
            'is_active'          => (int)($input['is_active'] ?? 1)
        ];

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