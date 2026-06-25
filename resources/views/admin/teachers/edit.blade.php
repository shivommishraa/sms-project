<div class="row">

    <div class="col-md-6">

        <div class="form-group">

            <label>

                Class Teacher Of (Class)

            </label>

            <select
                name="class_master_id"
                class="form-control">

                <option value="">

                    Select Class

                </option>

                @foreach($classes as $class)

                    <option
                        value="{{ $class->id }}"
                        {{
                            optional(
                                $teacher->classTeacherAssignment
                            )->class_master_id == $class->id
                            ? 'selected'
                            : ''
                        }}>

                        {{ $class->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

    <div class="col-md-6">

        <div class="form-group">

            <label>

                Section

            </label>

            <select
                name="section_id"
                class="form-control">

                <option value="">

                    Select Section

                </option>

                @foreach($sections as $section)

                    <option
                        value="{{ $section->id }}"
                        {{
                            optional(
                                $teacher->classTeacherAssignment
                            )->section_id == $section->id
                            ? 'selected'
                            : ''
                        }}>

                        {{ $section->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</div>