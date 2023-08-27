@switch($booking->booking_status)
    @case('Pending')
        <span class="bg-yellow-200 text-yellow-900 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
    @break

    @case('On Delivery')
        <span class="bg-gray-200 text-gray-900 text-xs font-medium px-2.5 py-0.5 rounded">On
            Delivery</span>
    @break

    @case('On Rent')
        <span class="bg-blue-200 text-blue-900 text-xs font-medium px-2.5 py-0.5 rounded">On
            Rent</span>
    @break

    @case('Finished')
        <span class="bg-green-200 text-green-900 text-xs font-medium px-2.5 py-0.5 rounded">Finished</span>
    @break

    @case('Cancel')
        <span class="bg-red-200 text-red-900 text-xs font-medium px-2.5 py-0.5 rounded">Cancel</span>
    @break

    @default
        <span class="bg-yellow-200 text-yellow-900 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
@endswitch
