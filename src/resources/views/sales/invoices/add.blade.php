<x-admin-base title="New Invoice" nosidebar item2="Invoices" link2="{{ route('admin.invoices.index') }}">

<form action="{{route('admin.invoices.store')}}" method="post">
    @csrf
<div class="card">
    <div class="card-body">
        <div class="row">
            <x-admin-select required col="md-6" name="Customer" fname="customer_id">
                <x-slot name="option">
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </x-slot>
                <x-slot name="addBtn">
                    <a href="{{route('admin.contacts.create',['type'=>'customer', 'page' => 'admin.invoices.create'])}}" class="btn btn-outline-primary">New Customer</a>
                </x-slot>
            </x-admin-select>

            <x-admin-select col="md-6" name="Currency" required fname="currency_code">
                @slot('option')
                    <option value="INR">Indian Rupees</option>
                    <option value="USD">United American Doller</option>
                @endslot
                @slot('addBtn')
                    <a href="{{route('admin.currencies.create',['page' => 'admin.invoices.create'])}}" class="btn btn-outline-primary">New Currency</a>
                @endslot
            </x-admin-select>

            <x-admin-input col="md-6" name="Invoice Date" required type="date" value="{{ date('Y-m-d', strtotime($data->invoiced_at)) }}" />
            <x-admin-input col="md-6" name="Due Date" required type="date" value="{{ date('Y-m-d', strtotime($data->due_at)) }}" />
            <x-admin-input col="md-6" name="Invoice Number" required value="{{$data->invoice_number}}" />
            <x-admin-input col="md-6" name="Order Number" />

            <livewire:admin-invoice />

            <x-admin-textarea col="md-6" name="Notes" />
            <x-admin-textarea col="md-6" name="Footer" />

            <x-admin-select col="md-6" name="Category" required fname="category_id">
                @slot('option')
                    <option value="">Select Option</option>
                    <option value="1">Sale</option>
                    <option value="2">Deposit</option>
                @endslot
                @slot('addBtn')
                    <a href="{{route('admin.categories.create',['type'=>'customer', 'page' => 'admin.invoices.create'])}}" class="btn btn-outline-primary">New Categories</a>
                @endslot
            </x-admin-select>
            {{-- <x-admin-select col="md-6" name="Recurring">
                @slot('option')
                    <option value="no">No</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                @endslot
            </x-admin-select> --}}
        </div>
    </div>
    <div class="card-footer text-right">
        <div class="btn-group">
            <button class="btn btn-success" type="submit">Submit</button>
            <a href="{{route('admin.invoices.index')}}" class="btn btn-secondary">Close</a>
        </div>
    </div>
</div>
</form>
</x-admin-base>
