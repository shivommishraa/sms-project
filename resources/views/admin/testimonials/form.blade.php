{{-- resources/views/admin/testimonials/form.blade.php --}}

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $testimonial->name ?? '') }}"
               class="form-control">

        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Designation</label>
        <input type="text"
               name="designation"
               value="{{ old('designation', $testimonial->designation ?? '') }}"
               class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Image</label>
        <input type="file"
               name="image"
               class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Rating</label>

        <select name="rating" class="form-control">

            @for($i=1;$i<=5;$i++)

            <option value="{{ $i }}"
                {{ old('rating',$testimonial->rating ?? 5)==$i ? 'selected' : '' }}>
                {{ $i }} Star
            </option>

            @endfor

        </select>

    </div>

    <div class="col-md-12 mb-3">
        <label>Message</label>

        <textarea name="message"
                  rows="5"
                  class="form-control">{{ old('message',$testimonial->message ?? '') }}</textarea>
    </div>

    <div class="col-md-12 mb-3">

        <div class="form-check">

            <input type="checkbox"
                   name="status"
                   value="1"
                   class="form-check-input"
                   {{ old('status',$testimonial->status ?? 1) ? 'checked' : '' }}>

            <label class="form-check-label">
                Active
            </label>

        </div>

    </div>

</div>