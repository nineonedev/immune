<?php

class AccountModel {
    
    public static function insert($data) {
    $db = DB::getInstance();

    global $NO_SITE_UNIQUE_KEY;

    $sql = "
        INSERT INTO nb_admin (uid, upwd, uname, email, phone, active_status, sitekey, created_at)
        VALUES (:uid, :upwd, :uname, :email, :phone, :active_status, :sitekey, :created_at)
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':uid' => $data['uid'],
        ':upwd' => $data['upwd'],
        ':uname' => $data['uname'],
        ':email' => $data['email'],
        ':phone' => $data['phone'],
        ':active_status' => $data['active_status'] ?? 'Y',
        ':sitekey' => $NO_SITE_UNIQUE_KEY,
        ':created_at' => date('Y-m-d H:i:s'),
    ]);

    return $db->lastInsertId();
}

}