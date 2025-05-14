<div id="editResourceModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Edit Resource</h3>
                <button onclick="closeEditResourceModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <input type="hidden" id="edit_resource_id" name="resource_id">
                <div class="mb-4">
                    <label for="edit_resource_name" class="block text-gray-700 mb-2">Resource Name</label>
                    <input type="text" id="edit_resource_name" name="resource_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="edit_resource_type" class="block text-gray-700 mb-2">Type</label>
                    <select id="edit_resource_type" name="resource_type" class="w-full px-3 py-2 border rounded" required>
                        <option value="Material">Material</option>
                        <option value="Equipment">Equipment</option>
                        <option value="Human">Human Resource</option>
                        <option value="Financial">Financial</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="edit_availability" class="block text-gray-700 mb-2">Availability</label>
                    <select id="edit_availability" name="availability" class="w-full px-3 py-2 border rounded" required>
                        <option value="Available">Available</option>
                        <option value="Limited">Limited</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="edit_quantity" class="block text-gray-700 mb-2">Quantity</label>
                    <input type="number" id="edit_quantity" name="quantity" class="w-full px-3 py-2 border rounded" required min="1">
                </div>
                <div class="mb-4">
                    <label for="edit_resource_project_id" class="block text-gray-700 mb-2">Assigned to Project (Optional)</label>
                    <select id="edit_resource_project_id" name="resource_project_id" class="w-full px-3 py-2 border rounded">
                        <option value="">None</option>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditResourceModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="edit_resource" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Update Resource</button>
                </div>
            </form>
        </div>
    </div>