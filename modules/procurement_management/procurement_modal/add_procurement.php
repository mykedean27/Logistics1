<div id="addProcurementModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-[#4A628A]">Add New Procurement</h3>
            <button onclick="closeAddProcurementModal()" class="text-gray-500 hover:text-gray-700">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <form method="POST" action="">
            <div class="mb-4">
                <label for="procurement_date" class="block text-gray-700 mb-2">Date</label>
                <input type="date" id="procurement_date" name="procurement_date" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="total_amount" class="block text-gray-700 mb-2">Total Amount</label>
                <input type="number" step="0.01" id="total_amount" name="total_amount" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 mb-2">Status</label>
                <select id="status" name="status" class="w-full px-3 py-2 border rounded" required>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Received">Received</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="supplier_id" class="block text-gray-700 mb-2">Supplier</label>
                <input type="text" id="supplier_id" name="supplier_id" class="w-full px-3 py-2 border rounded" required>
                <!-- Replace above with a <select> if you have a supplier list -->
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeAddProcurementModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                <button type="submit" name="add_procurement" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Save Procurement</button>
            </div>
        </form>
    </div>
</div>
