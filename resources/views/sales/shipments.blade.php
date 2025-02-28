@extends('layouts.master')
@section('main-content')

<div class="breadcrumb">
    <h1>{{ __('Shipments') }}</h1>
</div>

<div class="separator-breadcrumb border-top"></div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Table Actions -->
                    <div class="mt-2 mb-3">
                        <button onclick="exportToPDF()" class="btn btn-sm btn-outline-success ripple m-1">
                            <i class="i-File-Copy"></i> PDF
                        </button>
                        <button onclick="exportToExcel()" class="btn btn-sm btn-outline-danger ripple m-1">
                            <i class="i-File-Excel"></i> EXCEL
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            </div>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="searchInput" 
                                placeholder="{{ __('Search this table') }}"
                            >
                        </div>
                    </div>

                    <!-- Main Table -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Date') }}</th>  
                                <th>{{ __('Shipment Ref') }}</th>
                                <th>{{ __('Sale Ref') }}</th>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Warehouse') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->date }}</td>
                                    <td>{{ $shipment->Ref }}</td>
                                    <td>{{ optional($shipment->sale)->Ref }}</td>
                                    <td>{{ optional(optional($shipment->sale)->client)->username }}</td>
                                    <td>{{ optional(optional($shipment->sale)->warehouse)->name }}</td>
                                    <td>
                                        <span class="badge badge-{{ 
                                            $shipment->status == 'delivered' ? 'success' : 
                                            ($shipment->status == 'packed' ? 'info' : 
                                            ($shipment->status == 'shipped' ? 'secondary' : 
                                            ($shipment->status == 'ordered' ? 'warning' : 'danger'))) 
                                        }}">
                                            {{ __(ucfirst($shipment->status)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editShipment({{ $shipment->id }})">
                                            <i class="i-Edit text-white"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteShipment({{ $shipment->id }})">
                                            <i class="i-Close-Window text-white"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">{{ __('No shipments found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $shipments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">{{ __('Edit Shipment') }}</h5>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">{{ __('Status') }} *</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="ordered">{{ __('Ordered') }}</option>
                            <option value="packed">{{ __('Packed') }}</option>
                            <option value="shipped">{{ __('Shipped') }}</option>
                            <option value="delivered">{{ __('Delivered') }}</option>
                            <option value="cancelled">{{ __('Cancelled') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="delivered_to">{{ __('Delivered To') }}</label>
                        <input type="text" class="form-control" id="delivered_to" name="delivered_to">
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">{{ __('Address') }}</label>
                        <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="shipping_details">{{ __('Shipping Details') }}</label>
                        <textarea class="form-control" id="shipping_details" name="shipping_details" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('page-js')
<script>
// Table search functionality
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Modify existing modal and form handling
    function editShipment(id) {
        $.ajax({
            url: `/shipment/shipments/${id}/edit`,
            method: 'GET',
            success: function(response) {
                if (response.shipment) {
                    const shipment = response.shipment;
                    $('#editForm').attr('action', `/shipment/shipments/${id}`);
                    $('#status').val(shipment.status);
                    $('#delivered_to').val(shipment.delivered_to);
                    $('#shipping_address').val(shipment.shipping_address);
                    $('#shipping_details').val(shipment.shipping_details);
                    $('#editModal').modal('show');
                }
            },
            error: function(xhr) {
                alert('Error fetching shipment data');
            }
        });
    }

    // Handle form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const url = form.attr('action');
        
        $.ajax({
            url: url,
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                alert('Error updating shipment');
            }
        });
    });

    // Handle modal close buttons
    $('.close-modal, .btn-secondary').on('click', function() {
        $('#editModal').modal('hide');
    });

    // Close modal on backdrop click
    $(document).on('click', '.modal', function(e) {
        if ($(e.target).hasClass('modal')) {
            $('#editModal').modal('hide');
        }
    });

    // Reset form when modal is hidden
    $('#editModal').on('hidden.bs.modal', function() {
        $('#editForm')[0].reset();
    });
});

// Delete shipment
function deleteShipment(id) {
    if (confirm('Are you sure you want to delete this shipment?')) {
        $.ajax({
            url: `/shipment/shipments/${id}`,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Error deleting shipment');
            }
        });
    }
}
</script>
@endsection