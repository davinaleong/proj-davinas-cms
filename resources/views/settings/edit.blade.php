@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.index') }}">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modify</li>
@endsection

@section('page-icon')
    <i class="pe-7s-settings icon-gradient bg-mixed-hopes"></i>
@endsection

@section('page-title', 'Settings')

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Modify Settings</h5>
            <form method="POST" action="{{ route('settings.store') }}">
                @csrf
                <table id="settingsTable" class="mb-3 table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $setting)
                            <tr>
                                <td>
                                    <input type="text" name="names[]" class="form-control" placeholder="Name"
                                        value="{{ $setting->name }}" required>
                                </td>
                                <td>
                                    <input type="text" name="keys[]" class="form-control" placeholder="Key"
                                        value="{{ $setting->key }}" required>
                                </td>
                                <td>
                                    <input type="text" name="values[]" class="form-control" placeholder="Value"
                                        value="{{ $setting->value }}" required>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"
                                        onclick="this.parentNode.parentNode.remove();">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                @include('components.errors')
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                            <td>
                                <button id="addButton" type="button" class="btn btn-info">Add</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const settingsTable = document.querySelector("#settingsTable tbody");
        const addButton = document.querySelector("#addButton");
        addButton.addEventListener('click', e => addRow(settingsTable));

        function addRow(table) {
            const newNameInput = document.createElement('input');
            newNameInput.setAttribute('type', 'text');
            newNameInput.setAttribute('name', 'names[]');
            newNameInput.setAttribute('class', 'form-control');
            newNameInput.setAttribute('placeholder', 'Name');
            newNameInput.setAttribute('required', 'required');

            const newNameTd = document.createElement('td');
            newNameTd.appendChild(newNameInput);


            const newKeyInput = document.createElement('input');
            newKeyInput.setAttribute('type', 'text');
            newKeyInput.setAttribute('name', 'keys[]');
            newKeyInput.setAttribute('class', 'form-control');
            newKeyInput.setAttribute('placeholder', 'Key');
            newKeyInput.setAttribute('required', 'required');

            const newKeyTd = document.createElement('td');
            newKeyTd.appendChild(newKeyInput);


            const newValueInput = document.createElement('input');
            newValueInput.setAttribute('type', 'text');
            newValueInput.setAttribute('name', 'values[]');
            newValueInput.setAttribute('class', 'form-control');
            newValueInput.setAttribute('placeholder', 'Value');
            newValueInput.setAttribute('required', 'required');

            const newValueTd = document.createElement('td');
            newValueTd.appendChild(newValueInput);


            const newDeleteButton = document.createElement('button');
            newDeleteButton.setAttribute('type', 'button');
            newDeleteButton.setAttribute('class', 'btn btn-danger');
            newDeleteButton.innerText = 'Remove';
            newDeleteButton.addEventListener('click', e => deleteRow(e.target));

            const newButtonTd = document.createElement('td');
            newButtonTd.appendChild(newDeleteButton);

            const newTr = document.createElement('tr');
            newTr.appendChild(newNameTd);
            newTr.appendChild(newKeyTd);
            newTr.appendChild(newValueTd);
            newTr.appendChild(newButtonTd);


            settingsTable.appendChild(newTr);
        }

        function deleteRow(target) {
            target.parentNode.parentNode.remove();
        }
    </script>
@endsection
