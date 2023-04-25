

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label for="is_admin">Is Admin</label>
                <select class="form-control" id="is_admin" name="is_admin">
                    <option value="0" @if(!$user->is_admin) selected @endif>No</option>
                    <option value="1" @if($user->is_admin) selected @endif>Yes</option>
                </select>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $user->position) }}">
            </div>

            <div class="form-group">
                <label for="password">New Password (optional)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

