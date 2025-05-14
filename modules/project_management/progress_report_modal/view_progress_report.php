<div id="viewProgressModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal">
    <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-[#4A628A]">All Progress Reports</h3>
            <button onclick="closeViewProgressModal()" class="text-gray-500 hover:text-gray-700">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">Project</th>
                        <th class="py-2 px-4 border">Submission Date</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Details Preview</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getAllProgressReports($conn) as $report): ?>
                        <tr id="report-row-<?php echo (int)$report['id']; ?>">
                            <td class="py-2 px-4 border"><?php echo htmlspecialchars($report['project_name']); ?></td>
                            <td class="py-2 px-4 border"><?php echo htmlspecialchars($report['submission_date']); ?></td>
                            <td class="py-2 px-4 border">
                                <span class="px-2 py-1 rounded-full text-xs 
                <?php echo $report['status'] === 'On Track' ? 'bg-green-100 text-green-800' : ($report['status'] === 'Delayed' ? 'bg-yellow-100 text-yellow-800' : ($report['status'] === 'At Risk' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800')); ?>">
                                    <?php echo htmlspecialchars($report['status']); ?>
                                </span>
                            </td>
                            <td class="py-2 px-4 border"><?php echo htmlspecialchars(substr($report['details'], 0, 50)); ?>...</td>
                            <td class="py-2 px-4 border">
                                <button
                                    class="text-blue-500 hover:text-blue-700 mr-2"
                                    title="Edit"
                                    onclick="openEditProgressReportModal(<?php echo (int)$report['id']; ?>)"
                                    type="button">
                                    <span class="material-icons text-sm">edit</span>
                                </button>
                                <a
                                    href="?delete_progress_report=<?php echo (int)$report['id']; ?>"
                                    class="text-red-500 hover:text-red-700"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this progress report?');">
                                    <span class="material-icons text-sm">delete</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <div class="flex justify-end mt-4">
            <button onclick="closeViewProgressModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
        </div>
    </div>
</div>