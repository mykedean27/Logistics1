<div id="addProgressModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Add Progress Report</h3>
                <button onclick="closeAddProgressModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="report_project_id" class="block text-gray-700 mb-2">Project</label>
                    <select id="report_project_id" name="report_project_id" class="w-full px-3 py-2 border rounded" required>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="submission_date" class="block text-gray-700 mb-2">Submission Date</label>
                    <input type="date" id="submission_date" name="submission_date" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="report_status" class="block text-gray-700 mb-2">Status</label>
                    <select id="report_status" name="report_status" class="w-full px-3 py-2 border rounded" required>
                        <option value="On Track">On Track</option>
                        <option value="Delayed">Delayed</option>
                        <option value="At Risk">At Risk</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="details" class="block text-gray-700 mb-2">Details</label>
                    <textarea id="details" name="details" class="w-full px-3 py-2 border rounded" rows="5" required></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddProgressModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="add_progress_report" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Save Report</button>
                </div>
            </form>
        </div>
    </div>