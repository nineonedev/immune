<?php
require_once "../../inc/lib/base.class.php";
require_once "../Model/FaqModel.php";
require_once "../core/Validator.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';

    // INSERT
    if ($mode === 'insert') {
        $validator = new Validator();
        $validator->require('branch_id', $input['branch_id'] ?? '', '지점');
        $validator->require('categories', $input['categories'] ?? '', '카테고리');
        $validator->require('question', $input['question'] ?? '', '질문');
        $validator->require('answer', $input['answer'] ?? '', '답변');

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $sortNo = isset($input['sort_no']) && (int)$input['sort_no'] > 0
            ? (int)$input['sort_no']
            : FaqModel::getMaxSortNo() + 1;

        $data = [
            'branch_id'   => (int)$input['branch_id'],
            'categories'  => (int)$input['categories'],
            'question'    => trim($input['question']),
            'answer'      => trim($input['answer']),
            'sort_no'     => $sortNo,
            'is_active'   => (int)($input['is_active'] ?? 1)
        ];

        $result = FaqModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? 'FAQ가 등록되었습니다.' : '등록 실패'
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
        $validator->require('branch_id', $input['branch_id'] ?? '', '지점');
        $validator->require('categories', $input['categories'] ?? '', '카테고리');
        $validator->require('question', $input['question'] ?? '', '질문');
        $validator->require('answer', $input['answer'] ?? '', '답변');

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $newSortNo = (int)($input['sort_no'] ?? 0);

        // ✅ 현재 sort_no 조회
        $stmt = DB::getInstance()->prepare("SELECT sort_no FROM nb_faqs WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $oldSortNo = (int) $stmt->fetchColumn();

        // ✅ sort_no 변경 시 밀어내기 처리
        if ($newSortNo !== $oldSortNo && $newSortNo > 0) {
            FaqModel::shiftSortNosForUpdate($oldSortNo, $newSortNo, $id);
        }

        $data = [
            'branch_id'   => (int)$input['branch_id'],
            'categories'  => (int)$input['categories'],
            'question'    => trim($input['question']),
            'answer'      => trim($input['answer']),
            'sort_no'     => $newSortNo,
            'is_active'   => (int)($input['is_active'] ?? 1)
        ];

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