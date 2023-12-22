<x-app-layout>
 
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Invoice List</h1>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Invoice Date</th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $invoice->currentDate }} {{$invoice->name}}</td>

                              
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-500 hover:underline">View</a>
                                    <a href="{{ route('invoices.update', $invoice->id) }}" class="text-yellow-500 hover:underline">Edit</a>

                                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
 