<?php

class NonPayModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();
        $sql = "
            INSERT INTO nb_nonpay_items 
                (category_primary, category_secondary, title, cost, sort_no, is_active, created_at, updated_at)
            VALUES 
                (:category_primary, :category_secondary, :title, :cost, :sort_no, :is_active, NOW(), NOW())
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':category_primary'   => $data['category_primary'],
            ':category_secondary' => $data['category_secondary'],
            ':title'              => $data['title'],
            ':cost'               => $data['cost'],
            ':sort_no'            => $data['sort_no'],
            ':is_active'          => $data['is_active'],
        ]);
    }

    public static function update($id, $data)
    {
        $db = DB::getInstance();
        $sql = "
            UPDATE nb_nonpay_items SET
                category_primary   = :category_primary,
                category_secondary = :category_secondary,
                title              = :title,
                cost               = :cost,
                sort_no            = :sort_no,
                is_active          = :is_active,
                updated_at         = NOW()
            WHERE id = :id
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':category_primary'   => $data['category_primary'],
            ':category_secondary' => $data['category_secondary'],
            ':title'              => $data['title'],
            ':cost'               => $data['cost'],
            ':sort_no'            => $data['sort_no'],
            ':is_active'          => $data['is_active'],
            ':id'                 => $id
        ]);
    }

    public static function delete($id)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM nb_nonpay_items WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function deleteMultiple(array $ids): bool
    {
        if (empty($ids)) return false;

        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_nonpay_items WHERE id IN ($placeholders)");

        return $stmt->execute($ids);
    }

    public static function getMaxSortNo(): int
    {
        $db = DB::getInstance();
        $stmt = $db->query("SELECT MAX(sort_no) FROM nb_nonpay_items");
        return (int) $stmt->fetchColumn();
    }

    public static function shiftSortNosForUpdate(int $oldNo, int $newNo, int $id): void
    {
        $db = DB::getInstance();

        if ($newNo === $oldNo) return;

        if ($newNo < $oldNo) {
            // 위로 올리기
            $sql = "UPDATE nb_nonpay_items SET sort_no = sort_no + 1 
                    WHERE sort_no >= :newNo AND sort_no < :oldNo AND id != :id";
        } else {
            // 아래로 내리기
            $sql = "UPDATE nb_nonpay_items SET sort_no = sort_no - 1 
                    WHERE sort_no > :oldNo AND sort_no <= :newNo AND id != :id";
        }

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':newNo' => $newNo,
            ':oldNo' => $oldNo,
            ':id'    => $id,
        ]);
    }


}