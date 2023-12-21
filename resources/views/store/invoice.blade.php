<!-- resources/views/invoices/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Invoice List</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Invoice Date</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tax Amount</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Net Amount</th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->currentDate }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->amount }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->tax }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->netamount }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
