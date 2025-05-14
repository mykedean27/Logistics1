<!-- Add Task Modal -->
    <div id="addTaskModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">Add New Task</h3>
                <button onclick="closeAddTaskModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="task_name" class="block text-gray-700 mb-2">Task Name</label>
                    <input type="text" id="task_name" name="task_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="project_id" class="block text-gray-700 mb-2">Project</label>
                    <select id="project_id" name="project_id" class="w-full px-3 py-2 border rounded" required>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="task_start_date" class="block text-gray-700 mb-2">Start Date</label>
                        <input type="date" id="task_start_date" name="task_start_date" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label for="task_end_date" class="block text-gray-700 mb-2">End Date</label>
                        <input type="date" id="task_end_date" name="task_end_date" class="w-full px-3 py-2 border rounded" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="task_status" class="block text-gray-700 mb-2">Status</label>
                    <select id="task_status" name="task_status" class="w-full px-3 py-2 border rounded" required>
                        <option value="Not Started">Not Started</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                        <option value="Blocked">Blocked</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddTaskModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit" name="add_task" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">Save Task</button>
                </div>
            </form>
        </div>
    </div>