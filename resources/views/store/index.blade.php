<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold">Invoices</h1>
    </x-slot>

    <div class="py-10 ">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('invoices.store') }}" id="invoiceForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="invoice_date" class="block text-sm font-medium text-gray-600">Invoice Date</label>
                        <input type="date" id="invoice_date" name="invoice_date" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-600">Customer Name</label>
                        <input type="text" id="customer_name" name="customer_name" class="mt-1 p-2 border rounded-md w-full" pattern="[A-Za-z ]+" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_email" class="block text-sm font-medium text-gray-600">Customer Email</label>
                        <input type="email" id="customer_email" name="customer_email" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="file_upload" class="block text-sm font-medium text-gray-600">File Upload (JPG, PNG, PDF)</label>
                        <input type="file" id="file_upload" name="file_upload" accept=".jpg, .jpeg, .png, .pdf" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-600">Amount</label>
                        <input type="number" id="amount" name="amount" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="qty" class="block text-sm font-medium text-gray-600">Qty</label>
                        <input type="number" id="qty" name="qty" class="mt-1 p-2 border rounded-md w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="tax_amount" class="block text-sm font-medium text-gray-600">Tax Amount</label>
                        <input type="text" id="tax_amount" name="tax_amount" class="mt-1 p-2 border rounded-md w-full" readonly>
                    </div>
                   
                    <div class="mb-4">
                        <label for="tax_percentage" class="block text-sm font-medium text-gray-600">Tax Percentage</label>
                        <select id="tax_percentage" name="tax_percentage" class="mt-1 p-2 border rounded-md w-full" required>
                            <option value="0">0%</option>
                            <option value="5">5%</option>
                            <option value="12">12%</option>
                            <option value="18">18%</option>
                            <option value="28">28%</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="total_amount" class="block text-sm font-medium text-gray-600">Total Amount</label>
                        <input type="text" id="total_amount" name="total_amount" class="mt-1 p-2 border rounded-md w-full" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="net_amount" class="block text-sm font-medium text-gray-600">Net Amount</label>
                        <input type="text" id="net_amount" name="net_amount" class="mt-1 p-2 border rounded-md w-full" readonly>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 text-black  px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
          
            function calculateAmounts() {
                var qty = parseFloat($('#qty').val()) || 0;
                var amount = parseFloat($('#amount').val()) || 0;
                var taxPercentage = parseFloat($('#tax_percentage').val()) || 0;

            
                var totalAmount = qty * amount;
                $('#total_amount').val(totalAmount.toFixed(2));

            
                var taxAmount = (totalAmount * taxPercentage) / 100;
                $('#tax_amount').val(taxAmount.toFixed(2));

                var netAmount = totalAmount + taxAmount;
                $('#net_amount').val(netAmount.toFixed(2));
            }

   
            $('#qty, #amount, #tax_percentage').on('input', calculateAmounts);

          
        });
    </script>
</x-app-layout>
