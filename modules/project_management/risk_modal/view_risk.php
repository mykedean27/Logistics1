<div id="viewRiskModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center modal hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">All Risks</h3>
                <button onclick="closeViewRiskModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border">Description</th>
                            <th class="py-2 px-4 border">Project</th>
                            <th class="py-2 px-4 border">Probability</th>
                            <th class="py-2 px-4 border">Impact</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getAllRisks($conn) as $risk): ?>
                            <tr>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars(substr($risk['description'], 0, 50)); ?>...</td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($risk['project_name']); ?></td>
                                <td class="py-2 px-4 border">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                    <?php echo $risk['probability'] === 'High' ? 'bg-red-100 text-red-800' : ($risk['probability'] === 'Medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'); ?>">
                                        <?php echo htmlspecialchars($risk['probability']); ?>
                                    </span>
                                </td>
                                <td class="py-2 px-4 border">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                    <?php echo $risk['impact'] === 'High' ? 'bg-red-100 text-red-800' : ($risk['impact'] === 'Medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'); ?>">
                                        <?php echo htmlspecialchars($risk['impact']); ?>
                                    </span>
                                </td>
                                <td class="py-2 px-4 border">
                                    <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditRiskModal(<?php echo (int)$risk['id']; ?>)">
                                        <span class="material-icons text-sm">edit</span>
                                    </button>
                                    <a href="?delete_risk=<?php echo (int)$risk['id']; ?>" 
                                       class="text-red-500 hover:text-red-700"
                                       onclick="return confirm('Are you sure you want to delete this risk?');">
                                        <span class="material-icons text-sm">delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeViewRiskModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
            </div>
        </div>
    </div>