<div id="editRiskModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Edit Risk</h3>
                <button onclick="closeEditRiskModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <input type="hidden" id="edit_risk_id" name="risk_id">
                <div class="mb-4">
                    <label for="edit_risk_description" class="block text-gray-700 mb-2">Risk Description</label>
                    <textarea id="edit_risk_description" name="risk_description" class="w-full px-3 py-2 border rounded" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit_risk_project_id" class="block text-gray-700 mb-2">Project</label>
                    <select id="edit_risk_project_id" name="risk_project_id" class="w-full px-3 py-2 border rounded" required>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="edit_probability" class="block text-gray-700 mb-2">Probability</label>
                        <select id="edit_probability" name="probability" class="w-full px-3 py-2 border rounded" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div>
                        <label for="edit_impact" class="block text-gray-700 mb-2">Impact</label>
                        <select id="edit_impact" name="impact" class="w-full px-3 py-2 border rounded" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="edit_mitigation" class="block text-gray-700 mb-2">Mitigation Plan</label>
                    <textarea id="edit_mitigation" name="mitigation" class="w-full px-3 py-2 border rounded" rows="3" required></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditRiskModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="edit_risk" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Update Risk</button>
                </div>
            </form>
        </div>
    </div>