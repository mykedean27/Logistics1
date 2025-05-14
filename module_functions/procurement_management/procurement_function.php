<?php
// --- FUNCTION IMPLEMENTATIONS ---
// Procurement
function getAllProcurements($conn) {
    $query = "SELECT * FROM procurement";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function addProcurement($conn, $date, $total, $status, $supplier_id) {
    $query = "INSERT INTO procurement (procurement_date, total_amount, status, supplier_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdsi", $date, $total, $status, $supplier_id);
    return $stmt->execute();
}
function editProcurement($conn, $id, $date, $total, $status, $supplier_id) {
    $stmt = $conn->prepare("UPDATE procurement SET procurement_date=?, total_amount=?, status=?, supplier_id=? WHERE procurement_id=?");
    $stmt->bind_param("sdsii", $date, $total, $status, $supplier_id, $id);
    return $stmt->execute();
}
function deleteProcurement($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM procurement WHERE procurement_id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function getProcurementById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM procurement WHERE procurement_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Procurement Item
function getAllProcurementItems($conn) {
    $query = "SELECT * FROM procurement_item";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function addProcurementItem($conn, $procurement_id, $item_name, $quantity, $unit_price) {
    $query = "INSERT INTO procurement_item (procurement_id, item_name, quantity, unit_price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isid", $procurement_id, $item_name, $quantity, $unit_price);
    return $stmt->execute();
}
function editProcurementItem($conn, $id, $procurement_id, $item_name, $quantity, $unit_price) {
    $stmt = $conn->prepare("UPDATE procurement_item SET procurement_id=?, item_name=?, quantity=?, unit_price=? WHERE item_id=?");
    $stmt->bind_param("isidi", $procurement_id, $item_name, $quantity, $unit_price, $id);
    return $stmt->execute();
}
function deleteProcurementItem($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM procurement_item WHERE item_id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function getProcurementItemById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM procurement_item WHERE item_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Supplier
function getAllSuppliers($conn) {
    $query = "SELECT * FROM supplies";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function addSupplier($conn, $name, $contact, $rating) {
    $query = "INSERT INTO supplies (supplier_name, contact_info, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $name, $contact, $rating);
    return $stmt->execute();
}
function editSupplier($conn, $id, $name, $contact, $rating) {
    $stmt = $conn->prepare("UPDATE supplies SET supplier_name=?, contact_info=?, rating=? WHERE supplier_id=?");
    $stmt->bind_param("ssii", $name, $contact, $rating, $id);
    return $stmt->execute();
}
function deleteSupplier($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM supplies WHERE supplier_id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function getSupplierById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM supplies WHERE supplier_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Warehouse
function getAllWarehouses($conn) {
    $query = "SELECT * FROM warehouse";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function addWarehouse($conn, $location, $capacity) {
    $query = "INSERT INTO warehouse (location, capacity) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $location, $capacity);
    return $stmt->execute();
}
function editWarehouse($conn, $id, $location, $capacity) {
    $stmt = $conn->prepare("UPDATE warehouse SET location=?, capacity=? WHERE warehouse_id=?");
    $stmt->bind_param("sii", $location, $capacity, $id);
    return $stmt->execute();
}
function deleteWarehouse($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM warehouse WHERE warehouse_id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function getWarehouseById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM warehouse WHERE warehouse_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

?>
