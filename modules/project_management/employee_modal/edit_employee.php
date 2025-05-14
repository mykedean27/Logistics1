<div id="editEmployeeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Edit Employee</h3>
                <button onclick="closeEditEmployeeModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <input type="hidden" id="edit_employee_id" name="employee_id">
                <div class="mb-4">
                    <label for="edit_employee_name" class="block text-gray-700 mb-2">Employee Name</label>
                    <input type="text" id="edit_employee_name" name="employee_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit_role" class="block text-gray-700 mb-2">Role</label>
                    <input type="text" id="edit_role" name="role" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit_department" class="block text-gray-700 mb-2">Department</label>
                    <input type="text" id="edit_department" name="department" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit_contact" class="block text-gray-700 mb-2">Contact Information</label>
                    <input type="text" id="edit_contact" name="contact" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditEmployeeModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="edit_employee" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Update Employee</button>
                </div>
            </form>
        </div>
    </div>