
<div class="row">

    {{-- Name --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $user->name ?? '') }}"
               class="form-control" required>
    </div>

    {{-- Email --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $user->email ?? '') }}"
               class="form-control" required>
    </div>

  

    {{-- Date of Joining --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Date of Joining</label>
        <input type="date" name="date_of_joining"
               value="{{ old('date_of_joining', $user->date_of_joining ?? '') }}"
               class="form-control">
    </div>

    {{-- Status --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ old('status', $user->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $user->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
</div>

