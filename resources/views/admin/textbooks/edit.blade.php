<x-authenticated-layout class="Textbooks">
    <x-searchable-select-header />

    <div class="custom_form">
        <header>
            <p>Update Textbook Issue</p>
        </header>

        <form action="{{ route('textbooks.update', $textbook->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="student_id">Student</label>
                    <select name="student_id" id="student_id" class="searchable_select">
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id', $textbook->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->registration_number . ' - ' . $student->first_name . ' ' . $student->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="book_number">Book Number</label>
                    <input type="text" name="book_number" id="book_number"
                        value="{{ old('book_number', $textbook->book_number) }}">
                    <span class="inline_alert">{{ $errors->first('book_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="book_name">Book Name</label>
                    <input type="text" name="book_name" id="book_name"
                        value="{{ old('book_name', $textbook->book_name) }}">
                    <span class="inline_alert">{{ $errors->first('book_name') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="date_issued">Date Issued</label>
                    <input type="date" name="date_issued" id="date_issued"
                        value="{{ old('date_issued', $textbook->date_issued) }}">
                    <span class="inline_alert">{{ $errors->first('date_issued') }}</span>
                </div>

                <div class="input_group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="">Select Status</option>
                        @foreach (App\Models\Textbooks::STATUSES as $status)
                            <option value="{{ $status }}"
                                {{ old('status', $textbook->status) == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>

                <div class="input_group">
                    <label for="date_returned">Date Returned</label>
                    <input type="date" name="date_returned" id="date_returned"
                        value="{{ old('date_returned', $textbook->date_returned) }}">
                    <span class="inline_alert">{{ $errors->first('date_returned') }}</span>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="btn_danger" onclick="deleteItem({{ $textbook->id }}, 'textbook');"
                    form="deleteForm_{{ $textbook->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $textbook->id }}" action="{{ route('textbooks.destroy', $textbook->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <x-searchable-select-js />
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
