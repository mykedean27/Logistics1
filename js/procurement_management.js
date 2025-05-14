// --- Procurement Modals ---

        // --- Procurement Modals ---
        function openAddProcurementModal() {
            const modal = document.getElementById("addProcurementModal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }
        function closeAddProcurementModal() {
            const modal = document.getElementById("addProcurementModal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }
        function openViewProcurementModal() {
          document.getElementById("viewProcurementModal").classList.remove("hidden");
        }
        function closeViewProcurementModal() {
          document.getElementById("viewProcurementModal").classList.add("hidden");
        }
        function openEditProcurementModal(procurementId) {
          const rows = document.querySelectorAll("#viewProcurementModal tbody tr");
          let data = {};
          rows.forEach(row => {
            const btn = row.querySelector('button[onclick^="openEditProcurementModal"]');
            if (btn && btn.getAttribute("onclick").includes(procurementId)) {
              const cells = row.querySelectorAll("td");
              data = {
                id: procurementId,
                date: cells[0]?.innerText.trim() || "",
                total: cells[1]?.innerText.trim() || "",
                status: cells[2]?.innerText.trim() || "",
                supplier: cells[3]?.innerText.trim() || ""
              };
            }
          });
          document.getElementById("edit_procurement_id").value = data.id || "";
          document.getElementById("edit_procurement_date").value = data.date || "";
          document.getElementById("edit_total_amount").value = data.total || "";
          document.getElementById("edit_status").value = data.status || "";
          document.getElementById("edit_supplier_id").value = data.supplier || "";
          const modal = document.getElementById("editProcurementModal");
          modal.classList.remove("hidden");
          modal.classList.add("flex");
        }
        function closeEditProcurementModal() {
          const modal = document.getElementById("editProcurementModal");
          modal.classList.remove("flex");
          modal.classList.add("hidden");
        }
        
// --- Procurement Item Modals ---
function openAddProcurementItemModal() {
  document.getElementById("addProcurementItemModal").classList.remove("hidden");
}
function closeAddProcurementItemModal() {
  document.getElementById("addProcurementItemModal").classList.add("hidden");
}
function openViewProcurementItemModal() {
  document.getElementById("viewProcurementItemModal").classList.remove("hidden");
}
function closeViewProcurementItemModal() {
  document.getElementById("viewProcurementItemModal").classList.add("hidden");
}
function openEditProcurementItemModal(itemId) {
  const rows = document.querySelectorAll("#viewProcurementItemModal tbody tr");
  let data = {};
  rows.forEach(row => {
    const btn = row.querySelector('button[onclick^="openEditProcurementItemModal"]');
    if (btn && btn.getAttribute("onclick").includes(itemId)) {
      const cells = row.querySelectorAll("td");
      data = {
        id: itemId,
        procurement: cells[0]?.innerText.trim() || "",
        name: cells[1]?.innerText.trim() || "",
        quantity: cells[2]?.innerText.trim() || "",
        unit_price: cells[3]?.innerText.trim() || ""
      };
    }
  });
  document.getElementById("edit_item_id").value = data.id || "";
  document.getElementById("edit_procurement_id").value = data.procurement || "";
  document.getElementById("edit_item_name").value = data.name || "";
  document.getElementById("edit_quantity").value = data.quantity || "";
  document.getElementById("edit_unit_price").value = data.unit_price || "";
  const modal = document.getElementById("editProcurementItemModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function closeEditProcurementItemModal() {
  const modal = document.getElementById("editProcurementItemModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

// --- Supplier Modals ---
function openAddSupplierModal() {
  document.getElementById("addSupplierModal").classList.remove("hidden");
}
function closeAddSupplierModal() {
  document.getElementById("addSupplierModal").classList.add("hidden");
}
function openViewSupplierModal() {
  document.getElementById("viewSupplierModal").classList.remove("hidden");
}
function closeViewSupplierModal() {
  document.getElementById("viewSupplierModal").classList.add("hidden");
}
function openEditSupplierModal(supplierId) {
  const rows = document.querySelectorAll("#viewSupplierModal tbody tr");
  let data = {};
  rows.forEach(row => {
    const btn = row.querySelector('button[onclick^="openEditSupplierModal"]');
    if (btn && btn.getAttribute("onclick").includes(supplierId)) {
      const cells = row.querySelectorAll("td");
      data = {
        id: supplierId,
        name: cells[0]?.innerText.trim() || "",
        contact: cells[1]?.innerText.trim() || "",
        rating: cells[2]?.innerText.trim() || ""
      };
    }
  });
  document.getElementById("edit_supplier_id").value = data.id || "";
  document.getElementById("edit_supplier_name").value = data.name || "";
  document.getElementById("edit_contact_info").value = data.contact || "";
  document.getElementById("edit_rating").value = data.rating || "";
  const modal = document.getElementById("editSupplierModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function closeEditSupplierModal() {
  const modal = document.getElementById("editSupplierModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

// --- Warehouse Modals ---
function openAddWarehouseModal() {
  document.getElementById("addWarehouseModal").classList.remove("hidden");
}
function closeAddWarehouseModal() {
  document.getElementById("addWarehouseModal").classList.add("hidden");
}
function openViewWarehouseModal() {
  document.getElementById("viewWarehouseModal").classList.remove("hidden");
}
function closeViewWarehouseModal() {
  document.getElementById("viewWarehouseModal").classList.add("hidden");
}
function openEditWarehouseModal(warehouseId) {
  const rows = document.querySelectorAll("#viewWarehouseModal tbody tr");
  let data = {};
  rows.forEach(row => {
    const btn = row.querySelector('button[onclick^="openEditWarehouseModal"]');
    if (btn && btn.getAttribute("onclick").includes(warehouseId)) {
      const cells = row.querySelectorAll("td");
      data = {
        id: warehouseId,
        location: cells[0]?.innerText.trim() || "",
        capacity: cells[1]?.innerText.trim() || ""
      };
    }
  });
  document.getElementById("edit_warehouse_id").value = data.id || "";
  document.getElementById("edit_location").value = data.location || "";
  document.getElementById("edit_capacity").value = data.capacity || "";
  const modal = document.getElementById("editWarehouseModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function closeEditWarehouseModal() {
  const modal = document.getElementById("editWarehouseModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

// --- Optional: Attach delete confirmation for all delete links ---
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('a[onclick*="delete"]').forEach(link => {
    link.onclick = function (e) {
      if (!confirm("Are you sure you want to delete this item?")) {
        e.preventDefault();
      }
    };
  });
});
