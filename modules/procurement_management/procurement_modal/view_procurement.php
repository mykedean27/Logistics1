<div id="viewProjectsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
        <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">All Projects</h3>
                <button onclick="closeViewProjectsModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border">Project Name</th>
                            <th class="py-2 px-4 border">Start Date</th>
                            <th class="py-2 px-4 border">End Date</th>
                            <th class="py-2 px-4 border">Status</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getAllProjects($conn) as $project): ?>
                            <tr>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($project['name']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($project['start_date']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($project['end_date']); ?></td>
                                <td class="py-2 px-4 border">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                    <?php echo $project['status'] === 'Completed' ? 'bg-green-100 text-green-800' : ($project['status'] === 'In Progress' ? 'bg-blue-100 text-blue-800' : ($project['status'] === 'On Hold' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')); ?>">
                                        <?php echo htmlspecialchars($project['status']); ?>
                                    </span>
                                </td>
                                <td class="py-2 px-4 border">
                                    <button onclick="openEditProjectModal(<?php echo $project['id']; ?>)" class="text-blue-500 hover:text-blue-700 mr-2">
                                        <span class="material-icons text-sm">edit</span>
                                    </button>
                                    <a href="?delete_project=<?php echo $project['id']; ?>" onclick="return confirm('Are you sure you want to delete this project?')" class="text-red-500 hover:text-red-700">
                                        <span class="material-icons text-sm">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeViewProjectsModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
            </div>
        </div>
    </div>