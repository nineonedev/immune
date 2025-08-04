<?php

class SeoModel
{
    public static function insert($data)
    {
        $db = DB::getInstance();

        $sql = "
            INSERT INTO nb_branch_seos 
                (branch_id, path, page_title, meta_title, meta_description, meta_keywords)
            VALUES 
                (:branch_id, :path, :page_title, :meta_title, :meta_description, :meta_keywords)
        ";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':branch_id' => $data['branch_id'],
            ':path' => $data['path'],
            ':page_title' => $data['page_title'],
            ':meta_title' => $data['meta_title'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
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
}