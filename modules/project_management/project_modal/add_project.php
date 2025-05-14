<div id="addProjectModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Add New Project</h3>
                <button onclick="closeAddProjectModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="project_name" class="block text-gray-700 mb-2">Project Name</label>
                    <input type="text" id="project_name" name="project_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="start_date" class="block text-gray-700 mb-2">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label for="end_date" class="block text-gray-700 mb-2">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="w-full px-3 py-2 border rounded" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border rounded" required>
                        <option value="Not Started">Not Started</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                        <option value="On Hold">On Hold</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddProjectModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="add_project" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Save Project</button>
                </div>
            </form>
        </div>
    </div>