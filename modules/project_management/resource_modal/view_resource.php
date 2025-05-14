<div id="viewResourceModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center modal hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-[#4A628A]">All Resources</h3>
                <button onclick="closeViewResourceModal()" class="text-gray-500 hover:text-gray-700">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border">Name</th>
                            <th class="py-2 px-4 border">Type</th>
                            <th class="py-2 px-4 border">Availability</th>
                            <th class="py-2 px-4 border">Quantity</th>
                            <th class="py-2 px-4 border">Assigned Project</th>
                            <th class="py-2 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (getAllResources($conn) as $resource): ?>
                            <tr>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($resource['name']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($resource['type']); ?></td>
                                <td class="py-2 px-4 border">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                    <?php echo $resource['availability'] === 'Available' ? 'bg-green-100 text-green-800' : ($resource['availability'] === 'Limited' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800'); ?>">
                                        <?php echo htmlspecialchars($resource['availability']); ?>
                                    </span>
                                </td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($resource['quantity']); ?></td>
                                <td class="py-2 px-4 border"><?php echo htmlspecialchars($resource['project_name'] ?? 'Not assigned'); ?></td>
                                <td class="py-2 px-4 border">
                                    <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditResourceModal(<?php echo (int)$resource['id']; ?>)">
                                        <span class="material-icons text-sm">edit</span>
                                    </button>
                                    <form method="get" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this resource?');">
                                        <input type="hidden" name="delete_resource" value="<?php echo (int)$resource['id']; ?>">
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <span class="material-icons text-sm">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeViewResourceModal()" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">Close</button>
            </div>
        </div>
    </div>