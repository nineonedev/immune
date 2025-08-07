<?php

class FaqModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();
        $sql = "
            INSERT INTO nb_faqs 
                (branch_id, categories, question, answer, sort_no, is_active)
            VALUES 
                (:branch_id, :categories, :question, :answer, :sort_no, :is_active)
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':branch_id'   => $data['branch_id'],
            ':categories'  => $data['categories'],
            ':question'    => $data['question'],
            ':answer'      => $data['answer'],
            ':sort_no'     => $data['sort_no'],
            ':is_active'   => $data['is_active'],
        ]);
    }

    public static function update($id, $data)
    {
        $db = DB::getInstance();
        $sql = "
            UPDATE nb_faqs SET
                branch_id   = :branch_id,
                categories  = :categories,
                question    = :question,
                answer      = :answer,
                sort_no     = :sort_no,
                is_active   = :is_active,
                updated_at  = CURRENT_TIMESTAMP
            WHERE id = :id
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':branch_id'   => $data['branch_id'],
            ':categories'  => $data['categories'],
            ':question'    => $data['question'],
            ':answer'      => $data['answer'],
            ':sort_no'     => $data['sort_no'],
            ':is_active'   => $data['is_active'],
            ':id'          => $id
        ]);
    }

    public static function getMaxSortNo(): int
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT MAX(sort_no) FROM nb_faqs");
        return (int) $stmt->fetchColumn();
    }


    public static function shiftSortNosForUpdate(int $oldNo, int $newNo, int $id): void
    {
        $db = DB::getInstance();

        if ($newNo === $oldNo) return;

        // 큰 → 작은 번호로 이동 (위로 올리기): 뒤에 있는 항목들을 밀어야 함
        if ($newNo < $oldNo) {
            $sql = "UPDATE nb_faqs SET sort_no = sort_no + 1 
                    WHERE sort_no >= :newNo AND sort_no < :oldNo AND id != :id";
        } 
        // 작은 → 큰 번호로 이동 (아래로 내리기): 앞 항목들을 당겨야 함
        else {
            $sql = "UPDATE nb_faqs SET sort_no = sort_no - 1 
                    WHERE sort_no > :oldNo AND sort_no <= :newNo AND id != :id";
        }

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':newNo' => $newNo,
            ':oldNo' => $oldNo,
            ':id'    => $id,
        ]);
    }

    public static function delete($id)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM nb_faqs WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }


    public static function deleteMultiple(array $ids): bool
    {
        if (empty($ids)) return false;

        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_faqs WHERE id IN ($placeholders)");

        return $stmt->execute($ids);
    }


}