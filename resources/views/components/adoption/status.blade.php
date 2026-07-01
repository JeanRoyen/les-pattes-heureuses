<span
    @class([
        'whitespace-nowrap rounded-full px-4 py-1.5 text-sm font-medium text-white',
        'bg-green-600' => $status === 'available',
        'bg-orange-500' => $status === 'in_care',
    ])>
    {{ __('animals.status_' . $status) }}
</span>
