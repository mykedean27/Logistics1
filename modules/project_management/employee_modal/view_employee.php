<div id="viewEmployeeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">All Employees</h3>
                <button onclick="closeViewEmployeeModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border">Name</th>
                            <th class="py-2 px-4 border">Role</th>
                            <th class="py-2 px-4 border">Department</th>
                            <th class="py-2 px-4 border">Contact</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getAllEmployees($conn) as $employee): ?>
                            <tr>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($employee['name']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($employee['role']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($employee['department']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($employee['contact']); ?></td>
                                <td class="py-2 px-4 border">
                                    <button onclick="openEditEmployeeModal(<?php echo $employee['id']; ?>)" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <span class="material-icons text-sm">edit</span>
                                    </button>
                                    <a href="?delete_employee=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?')" class="text-red-500 hover:text-red-700">
                                        <span class="material-icons text-sm">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeViewEmployeeModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
            </div>
        </div>
    </div>