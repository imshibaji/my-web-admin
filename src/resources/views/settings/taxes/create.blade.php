<x-admin-base nosidebar title="New Tax" item2="Tax List" link2="{{ route('admin.taxes.index') }}">
<form action="{{ route('admin.taxes.store') }}" method="post">
    @csrf
    <input type="hidden" name="business_id" value="{{ business()->id }}" />
    <div class="card">
        <div class="card-body">
            <div class="row">
                <x-admin-input col="md-6" name="Name" required />
                <x-admin-input col="md-6"  name="Rate" />
                <x-admin-select col="md-6"  name="Type" required>
                    <x-slot name="option">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ Str::ucfirst($type) }}</option>
                        @endforeach
                    </x-slot>
                </x-admin-select>
                <x-admin-switch-btn col="md-6"  name="Enabled" on="true" off="false" checked="true" />
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success" type="submit">Save</button>
            <a href="{{ route('admin.taxes.index') }}" class="btn btn-secondary">Close</a>
        </div>
    </div>
</form>
</x-admin-base>
