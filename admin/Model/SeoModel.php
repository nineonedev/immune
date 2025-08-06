<?php

class SeoModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();

        $sql = "
            INSERT INTO nb_branch_seos 
                (branch_id, path, page_title, meta_title, meta_description, meta_keywords, section_title, topic_title)
            VALUES 
                (:branch_id, :path, :page_title, :meta_title, :meta_description, :meta_keywords, :section_title, :topic_title)
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':branch_id' => $data['branch_id'],
            ':path' => $data['path'],
            ':page_title' => $data['page_title'],
            ':meta_title' => $data['meta_title'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
            ':section_title' => $data['section_title'],
            ':topic_title' => $data['topic_title'],
        ]);
    }

    public static function update($id, $data)
    {
        $db = DB::getInstance();

        $sql = "
            UPDATE nb_branch_seos
            SET
                branch_id = :branch_id,
                path = :path,
                page_title = :page_title,
                meta_title = :meta_title,
                meta_description = :meta_description,
                meta_keywords = :meta_keywords,
                section_title = :section_title,
                topic_title = :topic_title,
                updated_at = CURRENT_TIMESTAMP
            WHERE id = :id
        ";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':branch_id' => $data['branch_id'],
            ':path' => $data['path'],
            ':page_title' => $data['page_title'],
            ':meta_title' => $data['meta_title'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
            ':section_title' => $data['section_title'],
            ':topic_title' => $data['topic_title'],
            ':id' => $id
        ]);
    }

    public static function delete($id)
    {
        $db = DB::getInstance();

        $sql = "DELETE FROM nb_branch_seos WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function deleteMultiple(array $ids): bool
    {
        if (empty($ids)) return false;

        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $db = DB::getInstance();
        $stmt = $db->prepare("DELETE FROM nb_branch_seos WHERE id IN ($placeholders)");

        return $stmt->execute($ids);
    }
}