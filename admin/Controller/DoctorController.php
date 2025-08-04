<?php
require_once "../../inc/lib/base.class.php";
require_once "../core/Validator.php";
require_once "../Model/DoctorModel.php";

header('Content-Type: application/json');

try {
    $input = $_POST;
    $mode = $input['mode'] ?? '';
    $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/doctors";

    $validator = new Validator();

    // INSERT
    if ($mode === 'insert') {
        $data = [
            'title'               => trim($input['title'] ?? ''),
            'branch_id'           => (int)($input['branch_id'] ?? 0),
            'position'            => trim($input['position'] ?? ''),
            'department'          => (int)($input['department'] ?? 0),
            'keywords'            => trim($input['keywords'] ?? ''),
            'career'              => trim($input['career'] ?? ''),
            'activity'            => trim($input['activity'] ?? ''),
            'education'           => trim($input['education'] ?? ''),
            'publication_visible' => (int)($input['publication_visible'] ?? 1),
            'publications'        => trim($input['publications'] ?? ''),
            'sort_no'             => (int)($input['sort_no'] ?? 0),
            'is_active'           => (int)($input['is_active'] ?? 1),
        ];

        $validator->require('title', $data['title'], '이름');
        $validator->require('branch_id', $data['branch_id'], '지점');

        if ($validator->fails()) {
            echo json_encode(['success' => false, 'errors' => $validator->getErrors()]);
            exit;
        }

        $thumb = imageUpload($upload_path, $_FILES['thumb_image'] ?? []);
        $detail = imageUpload($upload_path, $_FILES['detail_image'] ?? []);
        $data['thumb_image'] = $thumb['saved'] ?? '';
        $data['detail_image'] = $detail['saved'] ?? '';

        $result = DoctorModel::insert($data);

        echo json_encode([
            'success' => $result,
            'message' => $result ? '의료진이 등록되었습니다.' : '등록 실패'
        ]);
        exit;
    }

    // UPDATE
    if ($mode === 'update') {
        $id = (int)($input['id'] ?? 0);
        if (!$id) throw new Exception("ID가 없습니다.");

        $data = [
            'title'               => trim($input['title'] ?? ''),
            'branch_id'           => (int)($input['branch_id'] ?? 0),
            'position'            => trim($input['position'] ?? ''),
            'department'          => (int)($input['department'] ?? 0),
            'keywords'            => trim($input['keywords'] ?? ''),
            'career'              => trim($input['career'] ?? ''),
            'activity'            => trim($input['activity'] ?? ''),
            'education'           => trim($input['education'] ?? ''),
            'publication_visible' => (int)($input['publication_visible'] ?? 1),
            'publications'        => trim($input['publications'] ?? ''),
            'sort_no'             => (int)($input['sort_no'] ?? 0),
            'is_active'           => (int)($input['is_active'] ?? 1),
        ];

        $validator->require('title', $data['title'], '이름');
        $validator->require('branch_id', $data['branch_id'], '지점');

        if ($validator->fails()) {
            echo json_encode(['success' => false, 'errors' => $validator->getErrors()]);
            exit;
        }

        $existing = DoctorModel::find($id);
        if (!$existing) {
            echo json_encode(['success' => false, 'message' => '데이터를 찾을 수 없습니다.']);
            exit;
        }

        if (!empty($_FILES['thumb_image']) && $_FILES['thumb_image']['error'] !== UPLOAD_ERR_NO_FILE) {
            imageDelete($upload_path . '/' . $existing['thumb_image']);
            $thumb = imageUpload($upload_path, $_FILES['thumb_image']);
            $data['thumb_image'] = $thumb['saved'];
        }

        if (!empty($_FILES['detail_image']) && $_FILES['detail_image']['error'] !== UPLOAD_ERR_NO_FILE) {
            imageDelete($upload_path . '/' . $existing['detail_image']);
            $detail = imageUpload($upload_path, $_FILES['detail_image']);
            $data['detail_image'] = $detail['saved'];
        }

        $result = DoctorModel::update($id, $data);

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

        $existing = DoctorModel::find($id);
        
        if ($existing) {
            imageDelete($upload_path . '/' . $existing['thumb_image']);
            imageDelete($upload_path . '/' . $existing['detail_image']);
        }

        $result = DoctorModel::delete($id);

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

        // 이미지 삭제
        foreach ($ids as $id) {
            $existing = DoctorModel::find((int)$id);
            if ($existing) {
                imageDelete($upload_path . '/' . $existing['thumb_image']);
                imageDelete($upload_path . '/' . $existing['detail_image']);
            }
        }

        $result = DoctorModel::deleteMultiple($ids);

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