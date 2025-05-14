<div id="addResourceModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Add New Resource</h3>
                <button onclick="closeAddResourceModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="resource_name" class="block text-gray-700 mb-2">Resource Name</label>
                    <input type="text" id="resource_name" name="resource_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="resource_type" class="block text-gray-700 mb-2">Type</label>
                    <select id="resource_type" name="resource_type" class="w-full px-3 py-2 border rounded" required>
                        <option value="Material">Material</option>
                        <option value="Equipment">Equipment</option>
                        <option value="Human">Human Resource</option>
                        <option value="Financial">Financial</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="availability" class="block text-gray-700 mb-2">Availability</label>
                    <select id="availability" name="availability" class="w-full px-3 py-2 border rounded" required>
                        <option value="Available">Available</option>
                        <option value="Limited">Limited</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 mb-2">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="w-full px-3 py-2 border rounded" required min="1">
                </div>
                <div class="mb-4">
                    <label for="resource_project_id" class="block text-gray-700 mb-2">Assigned to Project (Optional)</label>
                    <select id="resource_project_id" name="resource_project_id" class="w-full px-3 py-2 border rounded" required >
                        <option value="">None</option>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddResourceModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="add_resource" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Save Resource</button>
                </div>
            </form>
        </div>
    </div>