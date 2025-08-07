<?php
require_once "../../inc/lib/base.class.php";
require_once "../core/Validator.php";
require_once "../Model/BannerModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/banners";

    $validator = new Validator();

    // INSERT
    if ($mode === 'insert') {
        $data = [
            'title'         => trim($input['title'] ?? ''),
            'branch_id'     => !empty($input['branch_id']) ? (int)$input['branch_id'] : null,
            'banner_type'   => (int)($input['banner_type'] ?? 0),
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
        $data['sort_no'] = isset($input['sort_no']) && (int)$input['sort_no'] > 0
            ? (int)$input['sort_no']
            : BannerModel::getMaxSortNo() + 1;

        $validator->require('title', $data['title'], '제목');
        $validator->require('banner_type', $data['banner_type'], '배너 위치');
        $validator->require('branch_id', $data['branch_id'], '지점');

        $image = imageUpload($upload_path, $_FILES['banner_image'] ?? []);
        if (empty($image['saved'])) {
            $validator->require('banner_image', '', '배너 이미지');
        } else {
            $data['banner_image'] = $image['saved'];
        }

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $result = BannerModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '배너가 등록되었습니다.' : '등록 실패'
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
            'banner_type'   => (int)($input['banner_type'] ?? 0),
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
        $validator->require('banner_type', $data['banner_type'], '배너 위치');
        $validator->require('branch_id', $data['branch_id'], '지점');

        $existing = BannerModel::find($id);
        if (!$existing) {
            echo json_encode(['success' => false, 'message' => '데이터를 찾을 수 없습니다.']);
            exit;
        }

        // ✅ 정렬 밀어내기 처리
        $oldSortNo = (int)$existing['sort_no'];
        if ($newSortNo !== $oldSortNo && $newSortNo > 0) {
            BannerModel::shiftSortNosForUpdate($oldSortNo, $newSortNo, $id);
        }

        $hasNewImage = !empty($_FILES['banner_image']) && $_FILES['banner_image']['error'] !== UPLOAD_ERR_NO_FILE;
        if ($hasNewImage) {
            imageDelete($upload_path . '/' . $existing['banner_image']);
            $image = imageUpload($upload_path, $_FILES['banner_image']);
            $data['banner_image'] = $image['saved'];
        } elseif (empty($existing['banner_image'])) {
            $validator->require('banner_image', '', '배너 이미지');
        }

        if ($validator->fails()) {
            echo json_encode([
                'success' => false,
                'message' => implode("\n", $validator->getErrors())
            ]);
            exit;
        }

        $result = BannerModel::update($id, $data);

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

        $existing = BannerModel::find($id);
        if ($existing) {
            imageDelete($upload_path . '/' . $existing['banner_image']);
        }

        $result = BannerModel::delete($id);

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
            $existing = BannerModel::find((int)$id);
            if ($existing) {
                imageDelete($upload_path . '/' . $existing['banner_image']);
            }
        }

        $result = BannerModel::deleteMultiple($ids);

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