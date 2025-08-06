<?php

class DoctorModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();
        $sql = "
            INSERT INTO nb_doctors (
                title, branch_id, position, department, keywords,
                career, activity, education,
                publication_visible, publications,
                thumb_image, detail_image,
                sort_no, is_active, is_ceo, created_at, updated_at
            ) VALUES (
                :title, :branch_id, :position, :department, :keywords,
                :career, :activity, :education,
                :publication_visible, :publications,
                :thumb_image, :detail_image,
                :sort_no, :is_active, :is_ceo, NOW(), NOW()
            )
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':title'               => $data['title'],
            ':branch_id'           => $data['branch_id'],
            ':position'            => $data['position'],
            ':department'          => $data['department'],
            ':keywords'            => $data['keywords'],
            ':career'              => $data['career'],
            ':activity'            => $data['activity'],
            ':education'           => $data['education'],
            ':publication_visible' => $data['publication_visible'],
            ':publications'        => $data['publications'],
            ':thumb_image'         => $data['thumb_image'],
            ':detail_image'        => $data['detail_image'],
            ':sort_no'             => $data['sort_no'],
            ':is_active'           => $data['is_active'],
            ':is_ceo'              => $data['is_ceo'],
        ]);
    }


    public static function update($id, $data)
    {
        $db = DB::getInstance();

        $fields = [
            'title', 'branch_id', 'position', 'department', 'keywords',
            'career', 'activity', 'education',
            'publication_visible', 'publications',
            'sort_no', 'is_active', 'is_ceo'
        ];

        if (!empty($data['thumb_image'])) $fields[] = 'thumb_image';
        if (!empty($data['detail_image'])) $fields[] = 'detail_image';

        $setClauses = array_map(fn($f) => "$f = :$f", $fields);
        $setClauses[] = "updated_at = NOW()";

        $sql = "UPDATE nb_doctors SET " . implode(", ", $setClauses) . " WHERE id = :id";
        $stmt = $db->prepare($sql);

        $data['id'] = $id;
        return $stmt->execute($data);
    }


    public static function delete($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_doctors WHERE id = :id");
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

        $sql = "DELETE FROM nb_doctors WHERE id IN (" . implode(', ', $placeholders) . ")";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }


    public static function find($id)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM nb_doctors WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}