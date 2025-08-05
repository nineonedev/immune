<?php

class PopupModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();
        $sql = "
            INSERT INTO nb_popups (
                title, branch_id, popup_type, has_link, link_url,
                sort_no, is_active, description, start_at, end_at, popup_image,
                is_unlimited,
                created_at, updated_at
            ) VALUES (
                :title, :branch_id, :popup_type, :has_link, :link_url,
                :sort_no, :is_active, :description, :start_at, :end_at, :popup_image,
                :is_unlimited,
                NOW(), NOW()
            )
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':title'         => $data['title'],
            ':branch_id'     => $data['branch_id'],
            ':popup_type'    => $data['popup_type'],
            ':has_link'      => $data['has_link'],
            ':link_url'      => $data['link_url'],
            ':sort_no'       => $data['sort_no'],
            ':is_active'     => $data['is_active'],
            ':description'   => $data['description'],
            ':start_at'      => $data['start_at'],
            ':end_at'        => $data['end_at'],
            ':popup_image'   => $data['popup_image'],
            ':is_unlimited'  => $data['is_unlimited'],
        ]);
    }

    public static function update($id, $data)
    {
        $db = DB::getInstance();

        $fields = [
            'title', 'branch_id', 'popup_type', 'has_link', 'link_url',
            'sort_no', 'is_active', 'description', 'start_at', 'end_at',
            'is_unlimited'
        ];

        if (!empty($data['popup_image'])) {
            $fields[] = 'popup_image';
        }

        $setClauses = array_map(fn($f) => "$f = :$f", $fields);
        $setClauses[] = "updated_at = NOW()";

        $sql = "UPDATE nb_popups SET " . implode(", ", $setClauses) . " WHERE id = :id";
        $stmt = $db->prepare($sql);

        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public static function delete($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_popups WHERE id = :id");
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

        $sql = "DELETE FROM nb_popups WHERE id IN (" . implode(', ', $placeholders) . ")";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }

    public static function find($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM nb_popups WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}