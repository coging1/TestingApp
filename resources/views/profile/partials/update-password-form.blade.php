<section>
    <header>
        <h2 class="h5 mb-4">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        {{-- <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input class="form-control" id="current_password" name="current_password" type="password" placeholder="Current Password" autocomplete="current-password">
              <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" style="color:red;"/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="update_password_password">New Password</label>
              <input class="form-control" id="update_password_password" name="password" type="password" placeholder="New Password" autocomplete="new-password">
              <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color:red;"/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="update_password_password_confirmation">Confirm Password</label>
              <input class="form-control" id="update_password_password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" autocomplete="new-password">
              <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color:red;"/>
            </div>
          </div>
        </div>

        <div class="mt-3">
          <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
            @if (session('status') === 'Password Updated!')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
