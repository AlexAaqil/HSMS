<x-authenticated-layout class="Users">
    <x-slot name="extra_head">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.jquery.min.js"
            integrity="sha512-QDFkCUyzB5IRy3BahmTctuO/sx2f9TvD9YOR5YRvtSnQ68gYJrh3oW6hSO1wUKHS3uZFzsQ3DQx6Fc1fXe/aNA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.css"
            integrity="sha512-76BNKk2jyPvigKMmFJv0bXYW0DpIQsx68RlN/cm91gDEpf2QR5WFLwZQr0rS70qGgeqAoYro9Nk72lvyKsow+w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>

    <div class="custom_form">
        <header>
            <p>Update Student</p>
        </header>

        <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="gender" value="{{ config('globals.students_gender', $student->gender) }}">

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" name="registration_number" id="registration_number"
                        value="{{ old('registration_number', $student->registration_number) }}">
                    <span class="inline_alert">{{ $errors->first('registration_number') }}</span>
                </div>

                <div class="input_group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name"
                        value="{{ old('first_name', $student->first_name) }}">
                    <span class="inline_alert">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="input_group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name"
                        value="{{ old('last_name', $student->last_name) }}">
                    <span class="inline_alert">{{ $errors->first('last_name') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="class_section_id">Class Section</label>
                    <select name="class_section_id" id="class_section_id">
                        <option value="">Select Class</option>
                        @foreach ($class_sections as $class_section)
                            <option value="1"
                                {{ old('class_section_id', $student->class_section_id) == $class_section->id ? 'selected' : '' }}>
                                {{ $class_section->title }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_section_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="class_id">Dorm</label>
                    <select name="dorm_id" id="dorm_id">
                        <option value="">Select Dorm</option>
                        <option value="">xxx</option>
                    </select>
                    <span class="inline_alert">{{ $errors->first('dorm_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="dorm_room_number">Dorm Room Number</label>
                    <input type="text" name="dorm_room_number" id="dorm_room_number"
                        value="{{ old('dorm_room_number') }}">
                    <span class="inline_alert">{{ $errors->first('dorm_room_number') }}</span>
                </div>
            </div>

            <div class="row_input_group_3">
                <div class="input_group">
                    <label for="year_admitted">Year Admitted</label>
                    <input type="number" id="year_admitted" name="year_admitted" min="2000" max="2060"
                        step="1" value="{{ old('year_admitted', $student->year_admitted) }}">
                    <span class="inline_alert">{{ $errors->first('year_admitted') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_status">Graduation Status?</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="yes"
                                value="1"
                                {{ old('graduation_status', $student->graduation_status) == '1' ? 'checked' : '' }}>
                            <span>Graduated</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="graduation_status" id="no"
                                value="0"
                                {{ old('graduation_status', $student->graduation_status) == '0' ? 'checked' : '' }}>
                            <span>Not</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('graduation_status') }}</span>
                </div>

                <div class="input_group">
                    <label for="graduation_date">Graudation Date</label>
                    <input type="date" id="graduation_date" name="graduation_date"
                        value="{{ old('graduation_date', $student->graduation_date) }}">
                    <span class="inline_alert">{{ $errors->first('graduation_date') }}</span>
                </div>
            </div>

            <div class="row_input_group">
                <div class="input_group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="{{ old('dob', $student->dob) }}">
                    <span class="inline_alert">{{ $errors->first('dob') }}</span>
                </div>

                <div class="input_group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        placeholder="Leave blank for default st123456">
                    <span class="inline_alert">{{ $errors->first('password') }}</span>
                </div>
            </div>

            <div class="another_section">
                <p class="title">Parent Information</p>
            </div>
            <div class="row_input_group">
                <div class="input_group">
                    <label for="parent_id">Select Parent</label>
                    <select name="parent_id" id="parent_id" class="searchable_select">
                        <option value="">Search for a parent</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}"
                                {{ old('parent_id', $student->parent_id) == $parent->id ? 'selected' : '' }}>
                                {{ $parent->phone_main }} - {{ $parent->first_name }} {{ $parent->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('parent_id') }}</span>
                </div>
            </div>

            <div class="buttons">
                <button type="submit">Update</button>

                <button type="button" class="delete_btn" onclick="deleteItem({{ $student->id }}, 'student');"
                    form="deleteForm_{{ $student->id }}">
                    <i class="fas fa-trash-alt delete"></i>
                    <span>Delete</span>
                </button>
            </div>
        </form>

        <form id="deleteForm_{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}"
            method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <x-slot name="javascript">
        <script>
            $(document).ready(function() {
                $('.searchable_select').chosen();
            })
        </script>
        <x-sweetalert />
    </x-slot>
</x-authenticated-layout>
