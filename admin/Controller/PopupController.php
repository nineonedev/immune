<?php
require_once "../../inc/lib/base.class.php";
require_once "../core/Validator.php";
require_once "../Model/PopupModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/popups";

    $validator = new Validator();

    // INSERT
    if ($mode === 'insert') {
        $data = [
            'title'         => trim($input['title'] ?? ''),
            'branch_id'     => !empty($input['branch_id']) ? (int)$input['branch_id'] : null,
            'popup_type'    => (int)($input['popup_type'] ?? 0),
            'has_link'      => (int)($input['has_link'] ?? 2),
            'link_url'      => trim($input['link_url'] ?? ''),
            'is_target'     => (int)($input['is_target'] ?? 1),
            'is_active'     => (int)($input['is_active'] ?? 1),
            'description'   => trim($input['description'] ?? ''),
            'start_at'      => trim($input['start_at'] ?? null),
            'end_at'        => trim($input['end_at'] ?? null),
            'is_unlimited'  => (int)($input['is_unlimited'] ?? 1),
        ];

        // ✅ sort_no 자동 처리
        $sortNo = isset($input['sort_no']) && (int)$input['sort_no'] > 0
            ? (int)$input['sort_no']
            : PopupModel::getMaxSortNo() + 1;

        $data['sort_no'] = $sortNo;

        $validator->require('title', $data['title'], '제목');
        $validator->require('branch_id', $data['branch_id'], '지점');
        $validator->require('popup_type', $data['popup_type'], '팝업 위치');

        $image = imageUpload($upload_path, $_FILES['popup_image'] ?? []);
        if (empty($image['saved'])) {
            $validator->require('popup_image', '', '팝업 이미지');
        } else {
            $data['popup_image'] = $image['saved'];
        }

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $result = PopupModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '팝업이 등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }



    // UPDATE
    if ($mode === 'update') {
        $id = (int)($input['id'] ?? 0);
        if (!$id) throw new Exception("ID가 없습니다.");

        $data = [
            'title'         => trim($input['title'] ?? ''),
            'branch_id'     => !empty($input['branch_id']) ? (int)$input['branch_id'] : null,
            'popup_type'    => (int)($input['popup_type'] ?? 0),
            'has_link'      => (int)($input['has_link'] ?? 2),
            'link_url'      => trim($input['link_url'] ?? ''),
            'is_target'     => (int)($input['is_target'] ?? 1),
            'is_active'     => (int)($input['is_active'] ?? 1),
            'description'   => trim($input['description'] ?? ''),
            'start_at'      => trim($input['start_at'] ?? null),
            'end_at'        => trim($input['end_at'] ?? null),
            'is_unlimited'  => (int)($input['is_unlimited'] ?? 1),
        ];

        $newSortNo = (int)($input['sort_no'] ?? 0);
        $data['sort_no'] = $newSortNo;

        $validator->require('title', $data['title'], '제목');
        $validator->require('branch_id', $data['branch_id'], '지점');
        $validator->require('popup_type', $data['popup_type'], '팝업 위치');

        $existing = PopupModel::find($id);
        if (!$existing) {
            echo json_encode(['success' => false, 'message' => '데이터를 찾을 수 없습니다.']);
            exit;
        }

        // ✅ 정렬 충돌 처리
        $oldSortNo = (int)$existing['sort_no'];
        if ($newSortNo !== $oldSortNo && $newSortNo > 0) {
            PopupModel::shiftSortNosForUpdate($oldSortNo, $newSortNo, $id);
        }

        $hasNewImage = !empty($_FILES['popup_image']) && $_FILES['popup_image']['error'] !== UPLOAD_ERR_NO_FILE;

        if ($hasNewImage) {
            imageDelete($upload_path . '/' . $existing['popup_image']);
            $image = imageUpload($upload_path, $_FILES['popup_image']);
            $data['popup_image'] = $image['saved'];
        } elseif (empty($existing['popup_image'])) {
            $validator->require('popup_image', '', '팝업 이미지');
        }

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $result = PopupModel::update($id, $data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '수정되었습니다.' : '수정 실패'
        ]);
        exit;
    }


    // DELETE
    if ($mode === 'delete') {
        $id = (int)($input['id'] ?? 0);
        if (!$id) throw new Exception("ID가 없습니다.");

        $existing = PopupModel::find($id);
        if ($existing) {
            imageDelete($upload_path . '/' . $existing['popup_image']);
        }

        $result = PopupModel::delete($id);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '삭제되었습니다.' : '삭제 실패'
        ]);
        exit;
    }

    // DELETE ARRAY
    if ($mode === 'delete_array') {
        $ids = json_decode($input['ids'] ?? '[]', true);

        if (!is_array($ids) || empty($ids)) {
            throw new Exception("삭제할 ID 목록이 없습니다.");
        }

        foreach ($ids as $id) {
            $existing = PopupModel::find((int)$id);
            if ($existing) {
                imageDelete($upload_path . '/' . $existing['popup_image']);
            }
        }

        $result = PopupModel::deleteMultiple($ids);

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