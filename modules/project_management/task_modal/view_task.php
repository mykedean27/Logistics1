<div id="viewTaskModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">All Tasks</h3>
                <button onclick="closeViewTaskModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border">Task Name</th>
                            <th class="py-2 px-4 border">Project</th>
                            <th class="py-2 px-4 border">Start Date</th>
                            <th class="py-2 px-4 border">End Date</th>
                            <th class="py-2 px-4 border">Status</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getAllTasks($conn) as $task): ?>
                            <tr>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($task['name']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($task['project_name']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($task['start_date']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($task['end_date']); ?></td>
                                <td class="py-2 px-4 border">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                    <?php echo $task['status'] === 'Completed' ? 'bg-green-100 text-green-800' : ($task['status'] === 'In Progress' ? 'bg-blue-100 text-blue-800' : ($task['status'] === 'Blocked' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')); ?>">
                                        <?php echo htmlspecialchars($task['status']); ?>
                                    </span>
                                </td>
                                <td class="py-2 px-4 border">
                                    <button onclick="openEditTaskModal(<?php echo $task['id']; ?>)" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <span class="material-icons text-sm">edit</span>
                                    </button>
                                    <a href="?delete_task=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')" class="text-red-500 hover:text-red-700">
                                        <span class="material-icons text-sm">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeViewTaskModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
            </div>
        </div>
    </div>