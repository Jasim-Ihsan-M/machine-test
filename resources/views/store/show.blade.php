<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Invoice Details</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p>Invoice Date: {{ $invoice->currentDate }}</p>
                <p>Name:{{$invoice->name}}</p>
                <p>Email:{{$invoice->email}}</p>
                <p>Tax:{{$invoice->tax}}%</p>
                <p>Quantity: {{ $invoice->qty }}</p>
                <p>Amount: {{$invoice->amount}}</p>
                <p>Net Amount: {{$invoice->netamount}}</p>
                <p></p>
            </div>
        </div>
    </div>
</x-app-layout>
