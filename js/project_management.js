//  project management to open and close modals
function openAddProjectModal() {
  document.getElementById("addProjectModal").classList.remove("hidden");
}

function closeAddProjectModal() {
  document.getElementById("addProjectModal").classList.add("hidden");
}

function openViewProjectsModal() {
  document.getElementById("viewProjectsModal").classList.remove("hidden");
}

function closeViewProjectsModal() {
  document.getElementById("viewProjectsModal").classList.add("hidden");
}
// Create similar functions for other edit modals (editTaskModal, editEmployeeModal, etc.)
//EDIT PROJECT MODAL
function openEditProjectModal(projectId) {
  // Get project data from the table row
  // Find the row in the projects table
  const rows = document.querySelectorAll("#viewProjectsModal tbody tr");
  let projectData = {};
  rows.forEach((row) => {
    const editBtn = row.querySelector(
      'button[onclick^="openEditProjectModal"]'
    );
    if (editBtn && editBtn.getAttribute("onclick").includes(projectId)) {
      const cells = row.querySelectorAll("td");
      projectData = {
        id: projectId,
        name: cells[0].innerText.trim(),
        start_date: cells[1].innerText.trim(),
        end_date: cells[2].innerText.trim(),
        status: cells[3].innerText.trim(),
      };
    }
  });

  // Set values in the edit modal
  document.getElementById("edit_project_id").value = projectData.id || "";
  document.getElementById("edit_project_name").value = projectData.name || "";
  document.getElementById("edit_start_date").value =
    projectData.start_date || "";
  document.getElementById("edit_end_date").value = projectData.end_date || "";
  document.getElementById("edit_status").value = projectData.status || "";

  // Show the modal
  document.getElementById("editProjectModal").classList.remove("hidden");
  document.getElementById("editProjectModal").classList.add("flex");
}

function closeEditProjectModal() {
  document.getElementById("editProjectModal").classList.add("hidden");
  document.getElementById("editProjectModal").classList.remove("flex");
}

//  task management to open and close modals
// Task Modal Functions
function openAddTaskModal() {
  document.getElementById("addTaskModal").classList.remove("hidden");
}
//  EMPLOYEE MANAGEMENT to open and close modals
function openAddEmployeeModal() {
  document.getElementById("addEmployeeModal").classList.remove("hidden");
}

function closeAddEmployeeModal() {
  document.getElementById("addEmployeeModal").classList.add("hidden");
}

function openViewEmployeeModal() {
  document.getElementById("viewEmployeeModal").classList.remove("hidden");
}

function closeViewEmployeeModal() {
  document.getElementById("viewEmployeeModal").classList.add("hidden");
}
// Edit Employee Modal
function openEditEmployeeModal(employeeId) {
  const employeeRows = document.querySelectorAll("#viewEmployeeModal tbody tr");
  let employeeData = {};
  employeeRows.forEach((row) => {
    // Find the edit button and check if its onclick attribute contains the correct employeeId
    const editBtn = row.querySelector(
      'button[onclick^="openEditEmployeeModal"]'
    );
    if (
      editBtn &&
      editBtn.getAttribute("onclick").replace(/\s/g, "") ===
        `openEditEmployeeModal(${employeeId})`
    ) {
      const cells = row.querySelectorAll("td");
      employeeData = {
        id: employeeId,
        name: cells[0] ? cells[0].innerText.trim() : "",
        role: cells[1] ? cells[1].innerText.trim() : "",
        department: cells[2] ? cells[2].innerText.trim() : "",
        contact: cells[3] ? cells[3].innerText.trim() : "",
      };
    }
  });

  document.getElementById("edit_employee_id").value = employeeData.id || "";
  document.getElementById("edit_employee_name").value = employeeData.name || "";
  document.getElementById("edit_role").value = employeeData.role || "";
  document.getElementById("edit_department").value =
    employeeData.department || "";
  document.getElementById("edit_contact").value = employeeData.contact || "";

  // Remove 'hidden' before adding 'flex'
  const modal = document.getElementById("editEmployeeModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeEditEmployeeModal() {
  // Remove 'flex' before adding 'hidden'
  const modal = document.getElementById("editEmployeeModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

//  Resource management to open and close modals
function openAddResourceModal() {
  document.getElementById("addResourceModal").classList.remove("hidden");
}

function closeAddResourceModal() {
  document.getElementById("addResourceModal").classList.add("hidden");
}

function openViewResourceModal() {
  document.getElementById("viewResourceModal").classList.remove("hidden");
}

function closeViewResourceModal() {
  document.getElementById("viewResourceModal").classList.add("hidden");
}

// Edit Resource Modal
function openEditResourceModal(resourceId) {
  // Find the row in the resources table
  const rows = document.querySelectorAll("#viewResourceModal tbody tr");
  let resourceData = {};
  rows.forEach((row) => {
    // Assume the edit button is the first button in the actions cell
    const editBtn = row.querySelector("button span.material-icons.text-sm");
    if (
      editBtn &&
      editBtn.innerText.trim() === "edit" &&
      row.querySelector('form input[name="delete_resource"]') &&
      row.querySelector('form input[name="delete_resource"]').value ==
        resourceId
    ) {
      const cells = row.querySelectorAll("td");
      resourceData = {
        id: resourceId,
        name: cells[0] ? cells[0].innerText.trim() : "",
        type: cells[1] ? cells[1].innerText.trim() : "",
        availability: cells[2] ? cells[2].innerText.trim() : "",
        quantity: cells[3] ? cells[3].innerText.trim() : "",
        project_name: cells[4] ? cells[4].innerText.trim() : "",
      };
    }
  });

  document.getElementById("edit_resource_id").value = resourceData.id || "";
  document.getElementById("edit_resource_name").value = resourceData.name || "";
  document.getElementById("edit_resource_type").value = resourceData.type || "";
  document.getElementById("edit_availability").value =
    resourceData.availability || "";
  document.getElementById("edit_quantity").value = resourceData.quantity || "";
  // Optionally set project if you have project id mapping

  // Show the modal
  const modal = document.getElementById("editResourceModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeEditResourceModal() {
  const modal = document.getElementById("editResourceModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}
//  Risk management to open and close modals
function openAddRiskModal() {
  document.getElementById("addRiskModal").classList.remove("hidden");
}

function closeAddRiskModal() {
  document.getElementById("addRiskModal").classList.add("hidden");
}

function openViewRiskModal() {
  document.getElementById("viewRiskModal").classList.remove("hidden");
}

function closeViewRiskModal() {
  document.getElementById("viewRiskModal").classList.add("hidden");
}

// Edit Risk Modal
function openEditRiskModal(riskId) {
  // Find the row in the risks table
  const rows = document.querySelectorAll("#viewRiskModal tbody tr");
  let riskData = {};
  rows.forEach((row) => {
    // The edit button is the first button in the actions cell
    const editBtn = row.querySelector("button .material-icons.text-sm");
    // Find the hidden input or use a data attribute for riskId if available
    // We'll use the description cell as a unique identifier for now
    // (You should add a hidden input or data attribute for riskId for reliability)
    if (
      editBtn &&
      editBtn.innerText.trim() === "edit" &&
      row.querySelector('button[onclick^="openEditRiskModal"]') &&
      row
        .querySelector('button[onclick^="openEditRiskModal"]')
        .getAttribute("onclick")
        .includes(riskId)
    ) {
      const cells = row.querySelectorAll("td");
      riskData = {
        id: riskId,
        description: cells[0]
          ? cells[0].innerText.replace(/\.{3,}$/, "").trim()
          : "",
        project: cells[1] ? cells[1].innerText.trim() : "",
        probability: cells[2] ? cells[2].innerText.trim() : "",
        impact: cells[3] ? cells[3].innerText.trim() : "",
        // Mitigation is not shown in the table, so you'll need to fetch it another way if needed
      };
    }
  });

  // Set values in the edit modal
  document.getElementById("edit_risk_id").value = riskData.id || "";
  document.getElementById("edit_risk_description").value =
    riskData.description || "";
  // Set project select by name (ideally by id, but only name is available here)
  const projectSelect = document.getElementById("edit_risk_project_id");
  if (projectSelect && riskData.project) {
    for (let i = 0; i < projectSelect.options.length; i++) {
      if (projectSelect.options[i].text === riskData.project) {
        projectSelect.selectedIndex = i;
        break;
      }
    }
  }
  document.getElementById("edit_probability").value =
    riskData.probability || "Low";
  document.getElementById("edit_impact").value = riskData.impact || "Low";
  // Mitigation is not available from the table, so leave as is

  // Show the modal
  const modal = document.getElementById("editRiskModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeEditRiskModal() {
  const modal = document.getElementById("editRiskModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

// Progress management to open and close modals
function openAddProgressModal() {
  document.getElementById("addProgressModal").classList.remove("hidden");
}

function closeAddProgressModal() {
  document.getElementById("addProgressModal").classList.add("hidden");
}

function openViewProgressModal() {
  document.getElementById("viewProgressModal").classList.remove("hidden");
}

function closeViewProgressModal() {
  document.getElementById("viewProgressModal").classList.add("hidden");
}

// Edit Progress Report Modal
function openEditProgressReportModal(reportId) {
  // Locate the data of the report using the ID
  const row = document.querySelector(`#report-row-${reportId}`);
  if (!row) return;

  const cells = row.querySelectorAll("td");
  const reportData = {
    id: reportId,
    project: cells[0] ? cells[0].innerText.trim() : "",
    submission_date: cells[1] ? cells[1].innerText.trim() : "",
    status: cells[2] ? cells[2].innerText.trim() : "",
    details: cells[3] ? cells[3].innerText.replace(/\.{3,}$/, "").trim() : "",
  };

  // Set values in the edit modal
  document.getElementById("edit_report_id").value = reportData.id || "";
  const projectSelect = document.getElementById("edit_report_project_id");
  if (projectSelect && reportData.project) {
    for (let i = 0; i < projectSelect.options.length; i++) {
      if (projectSelect.options[i].text === reportData.project) {
        projectSelect.selectedIndex = i;
        break;
      }
    }
  }
  document.getElementById("edit_submission_date").value =
    reportData.submission_date || "";
  document.getElementById("edit_report_status").value =
    reportData.status || "On Track";
  document.getElementById("edit_details").value = reportData.details || "";

  // Show the modal
  const modal = document.getElementById("editProgressReportModal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeEditProgressReportModal() {
  const modal = document.getElementById("editProgressReportModal");
  modal.classList.remove("flex");
  modal.classList.add("hidden");
}

// Attach event listeners for edit and delete buttons
document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll("#viewProgressModal tbody tr");
  rows.forEach((row) => {
    // Attach edit functionality
    const editBtn = row.querySelector(
      'button[onclick^="openEditProgressReportModal"]'
    );
    if (editBtn) {
      const reportId = editBtn.getAttribute("onclick").match(/\d+/)[0]; // Extract ID from onclick attribute
      editBtn.onclick = function () {
        openEditProgressReportModal(reportId);
      };
    }

    // Ensure delete buttons retain their functionality
    const deleteBtn = row.querySelector("a[onclick]");
    if (deleteBtn) {
      deleteBtn.onclick = function (e) {
        if (!confirm("Are you sure you want to delete this progress report?")) {
          e.preventDefault();
        }
      };
    }
  });
});
