<?php
// Hàm mã hóa ID
function encryptId($id, $key = 'my_secret_key') {
    return base64_encode($id . '|' . hash_hmac('sha256', $id, $key));
}

// Hàm giải mã ID
function decryptId($encodedId, $key = 'my_secret_key') {
    $decoded = base64_decode($encodedId);
    $parts = explode('|', $decoded);
    
    if (count($parts) === 2) {
        $id = $parts[0];
        $hash = $parts[1];
        
        // Kiểm tra tính hợp lệ của ID đã giải mã
        if (hash_hmac('sha256', $id, $key) === $hash) {
            return $id;
        }
    }
    return false; // Trả về false nếu giải mã không hợp lệ
}
?>
