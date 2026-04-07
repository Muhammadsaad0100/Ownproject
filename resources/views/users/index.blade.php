 @extends('layouts.app')
 @section('content')
         <div class="nxl-container">
             <div class="nxl-content">
                 <!-- Page Header - exactly from first design -->
                 <div class="page-header">
                     <div class="page-header-left d-flex align-items-center">
                         <div class="page-header-title">
                             <h5 class="m-b-10">Employees</h5>
                         </div>
                         <ul class="breadcrumb ms-3">

                             <li class="breadcrumb-item active">Employees</li>
                         </ul>
                     </div>
                     <div class="page-header-right ms-auto">
                         <div class="page-header-right-items">
                             <div class="d-flex align-items-center gap-2">
                                 <!-- Create button - matches 2nd code functionality -->
                                 <a href="{{ route('users.create') }}" class="btn btn-primary" id="createEmployeeBtn">
                                     <i class="fas fa-plus me-2"></i>
                                     <span>Create Employee</span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Main Table Card - matches first design table structure but with 2nd code columns -->
                 <div class="card stretch stretch-full">
                     <div class="card-body p-0">
                         <div class="table-responsive">

                             <table class="table table-hover" id="leadList">
                                 <thead>
                                     <tr>
                                         <th class="wd-30">
                                             <div class="btn-group mb-1">
                                                 <div class="custom-control custom-checkbox ms-1">
                                                     <input type="checkbox" class="custom-control-input" id="checkAllLead">
                                                     <label class="custom-control-label" for="checkAllLead"></label>
                                                 </div>
                                             </div>
                                         </th>
                                         <th>Name</th>
                                         <th>Email</th>
                                         <th>Date of Joining</th>
                                         <th>Status</th>
                                         <th class="text-end">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($users as $user)
                                    
                                         <tr class="single-item" data-user-id="{{ $user->id }}">
                                             <td>
                                                 <div class="item-checkbox ms-1">
                                                     <div class="custom-control custom-checkbox">
                                                         <input type="checkbox" class="form-check-input checkbox"
                                                             value="{{ $user->id }}">
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="employee-card">
                                                     {{-- <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/logo.png') }}"
                                                         alt="Avatar" class="employee-avatar"
                                                         onerror="this.src='https://via.placeholder.com/40?text=User'"> --}}
                                                     <div class="employee-details">
                                                         <span class="employee-name">{{ ucfirst($user->name) }}</span>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                             <td>{{ $user->date_of_joining ? \Carbon\Carbon::parse($user->date_of_joining)->format('Y-m-d') : '-' }}
                                             </td>
                                             <td>
                                                 @php $isActive = $user->status == 1; @endphp
                                                 <button type="button"
                                                     class="status-btn {{ $isActive ? 'active-status' : 'inactive-status' }}"
                                                     data-id="{{ $user->id }}" data-status="{{ $isActive ? 1 : 0 }}">
                                                     {{ $isActive ? 'Active' : 'Inactive' }}
                                                 </button>
                                             </td>
                                             <td>
                                                 <div class="hstack gap-2 justify-content-end">
                                                     <a href="{{ route('users.edit', $user->id) }}"
                                                         class="btn btn-sm btn-warning action-btn" title="Edit">
                                                         <i class="fas fa-pencil-alt"></i>
                                                     </a>
                                                     
                                                     <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                         class="d-inline delete-form"
                                                         onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn btn-sm btn-danger action-btn"
                                                             title="Delete">
                                                             <i class="fas fa-trash-alt"></i>
                                                         </button>
                                                     </form>
                                                     <a href="{{ route('users.show', $user->id) }}"
   class="btn btn-sm btn-info action-btn" title="View">
   <i class="fas fa-eye"></i>
</a>

                                                 </div>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
         <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
         {{-- <script>
             $(document).ready(function() {
                 // Initialize DataTable - same as 2nd code
                 var dataTable = $('#employeeTable').DataTable({
                     "paging": true,
                     "pageLength": 10,
                     "lengthChange": false,
                     "ordering": true,
                     "info": true,
                     "autoWidth": false,
                     "language": {
                         "search": "Quick Filter:"
                     }
                 });

                 // Update statistics
                 function updateStats() {
                     var total = {{ count($users) }};
                     var active = $('.status-btn.active-status').length;
                     var inactive = $('.status-btn.inactive-status').length;

                     // Calculate new this month (from PHP data)
                     var newThisMonth = 0;
                     @foreach ($users as $user)
                         @if ($user->date_of_joining && \Carbon\Carbon::parse($user->date_of_joining)->month == now()->month)
                             newThisMonth++;
                         @endif
                     @endforeach

                     $('#totalEmployees').text(total);
                     $('#activeEmployees').text(active);
                     $('#inactiveEmployees').text(inactive);
                     $('#newEmployees').text(newThisMonth);

                     // Calculate growth percentage (mock calculation)
                     var growth = total > 0 ? Math.round((active / total) * 100) : 0;
                     $('#totalGrowth').text(growth + '%');
                 }

                 updateStats();

                 // Toggle Status - exactly from 2nd code with AJAX
                 $(document).on('click', '.status-btn', function() {
                     const btn = $(this);
                     const userId = btn.data('id');
                     const currentStatus = btn.data('status');
                     const newStatus = currentStatus == 1 ? 0 : 1;
                     const statusText = newStatus == 1 ? 'Active' : 'Inactive';

                     $.ajax({
                         url: `/users/${userId}/status`,
                         type: 'POST',
                         data: {
                             status: newStatus,
                             _token: '{{ csrf_token() }}'
                         },
                         success: function(response) {
                             // Update button appearance
                             btn.text(statusText);
                             btn.data('status', newStatus);
                             if (newStatus == 1) {
                                 btn.removeClass('inactive-status').addClass('active-status');
                             } else {
                                 btn.removeClass('active-status').addClass('inactive-status');
                             }
                             updateStats();

                             // Show success message
                             var toast = `<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div class="toast show" role="alert">
                            <div class="toast-header bg-success text-white">
                                <strong class="me-auto">Success</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body">Status updated successfully!</div>
                        </div>
                    </div>`;
                             $('body').append(toast);
                             setTimeout(function() {
                                 $('.toast').closest('.position-fixed').remove();
                             }, 2000);
                         },
                         error: function() {
                             alert('Failed to update status. Please try again.');
                         }
                     });
                 });

                 // Select All functionality
                 $('#checkAllEmployee').on('change', function() {
                     $('.checkbox').prop('checked', $(this).prop('checked'));
                 });

                 // Filter functionality
                 $('.filter-option').on('click', function() {
                     var filter = $(this).data('filter');
                     if (filter === 'all') {
                         dataTable.search('').draw();
                     } else if (filter === 'active') {
                         dataTable.search('Active').draw();
                     } else if (filter === 'inactive') {
                         dataTable.search('Inactive').draw();
                     }
                 });

                 // View Employee Details
                 $(document).on('click', '.view-employee', function() {
                     var userId = $(this).data('id');
                     var row = $(this).closest('tr');
                     var name = row.find('.employee-name').text();
                     var email = row.find('td:eq(2)').text().trim();
                     var joiningDate = row.find('td:eq(3)').text();
                     var status = row.find('.status-btn').text();
                     var avatarSrc = row.find('.employee-avatar').attr('src');

                     var modalContent = `
                <div class="text-center mb-3">
                    <img src="${avatarSrc}" class="rounded-circle" width="80" height="80" style="object-fit: cover;">
                    <h4 class="mt-2">${name}</h4>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>${email}</td>
                    </tr>
                    <tr>
                        <td><strong>Date of Joining:</strong></td>
                        <td>${joiningDate}</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td><span class="badge ${status === 'Active' ? 'bg-success' : 'bg-danger'}">${status}</span></td>
                    </tr>
                </table>
            `;
                     $('#employeeDetailsContent').html(modalContent);
                     $('#viewEmployeeModal').modal('show');
                 });

                 // Print Employee Profile
                 $(document).on('click', '.print-employee', function() {
                     var empName = $(this).data('name');
                     var printWindow = window.open('', '_blank');
                     printWindow.document.write('<html><head><title>Employee Profile</title>');
                     printWindow.document.write(
                         '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">'
                         );
                     printWindow.document.write('</head><body>');
                     printWindow.document.write('<div class="container mt-5"><h2>Employee: ' + empName +
                     '</h2>');
                     printWindow.document.write('<p>This is a printable profile for ' + empName + '</p>');
                     printWindow.document.write(
                         '<button onclick="window.print()" class="btn btn-primary">Print</button>');
                     printWindow.document.write('</div></body></html>');
                     printWindow.document.close();
                 });

                 // Send Reminder
                 $(document).on('click', '.remind-employee', function() {
                     var empName = $(this).data('name');
                     alert(`Reminder sent to ${empName} successfully!`);
                 });

                 // Export functionality
                 $('#exportCSV').on('click', function() {
                     var csvData = [];
                     var headers = ['Employee Name', 'Email', 'Date of Joining', 'Status'];
                     csvData.push(headers.join(','));

                     $('tbody tr').each(function() {
                         var name = $(this).find('.employee-name').text();
                         var email = $(this).find('td:eq(2)').text().trim();
                         var joiningDate = $(this).find('td:eq(3)').text();
                         var status = $(this).find('.status-btn').text();
                         csvData.push([name, email, joiningDate, status].join(','));
                     });

                     var blob = new Blob([csvData.join('\n')], {
                         type: 'text/csv'
                     });
                     var link = document.createElement('a');
                     link.href = URL.createObjectURL(blob);
                     link.download = 'employees_export.csv';
                     link.click();
                 });

                 $('#printTable').on('click', function() {
                     window.print();
                 });

                 $('#exportPDF').on('click', function() {
                     alert('PDF export would be implemented with a library like jsPDF in production');
                 });

                 // Feather icons replacement
                 if (typeof feather !== 'undefined') {
                     feather.replace();
                 }

                 // Delete form confirmation enhancement
                 $('.delete-form').on('submit', function(e) {
                     if (!confirm(
                         'Are you sure you want to delete this employee? This action cannot be undone.')) {
                         e.preventDefault();
                         return false;
                     }
                 });
             });
                <script src="assets/vendors/js/dataTables.min.js"></script>
    <script src="assets/vendors/js/dataTables.bs5.min.js"></script>
         </script> --}}
 

     
 @endsection










  