<?php

class FacilityModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();
        $sql = "
            INSERT INTO nb_facilities (
                title, branch_id, categories, thumb_image,
                sort_no, is_active, created_at, updated_at
            ) VALUES (
                :title, :branch_id, :categories, :thumb_image,
                :sort_no, :is_active, NOW(), NOW()
            )
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':title'      => $data['title'],
            ':branch_id'  => $data['branch_id'],
            ':categories' => $data['categories'],
            ':thumb_image'=> $data['thumb_image'],
            ':sort_no'    => $data['sort_no'],
            ':is_active'  => $data['is_active'],
        ]);
    }

    public static function update($id, $data)
    {
        $db = DB::getInstance();

        $fields = [
            'title', 'branch_id', 'categories',
            'sort_no', 'is_active'
        ];

        if (!empty($data['thumb_image'])) $fields[] = 'thumb_image';

        $setClauses = array_map(fn($f) => "$f = :$f", $fields);
        $setClauses[] = "updated_at = NOW()";

        $sql = "UPDATE nb_facilities SET " . implode(", ", $setClauses) . " WHERE id = :id";
        $stmt = $db->prepare($sql);

        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public static function delete($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_facilities WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public static function deleteMultiple(array $ids)
    {
        if (empty($ids)) return false;

        $db = DB::getInstance();

        $placeholders = [];
        $params = [];
        foreach ($ids as $index => $id) {
            $key = ":id$index";
            $placeholders[] = $key;
            $params[$key] = (int)$id;
        }

        $sql = "DELETE FROM nb_facilities WHERE id IN (" . implode(', ', $placeholders) . ")";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function find($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM nb_facilities WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}