@switch($booking->payment_status)
    @case('Pending')
        <span class="bg-yellow-200 text-yellow-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Pending</span>
    @break

    @case('Success')
        <span class="bg-green-200 text-green-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Success</span>
    @break

    @case('Failed')
        <span class="bg-red-200 text-red-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Failed</span>
    @break

    @default
        <span class="bg-yellow-200 text-yellow-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Pending</span>
@endswitch
