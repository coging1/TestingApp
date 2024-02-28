{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>

	{{-- per page status --}}
	@if ( session('status') )
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Profile</h2>
		</div>
	</div>

	<div class="row justify-content-center mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Profile information</h2>
        <p class="mt-1 text-sm text-gray-600">
          {{ __("Update your account's profile information and email address.") }}
        </p>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
        </form>
				<form method="POST" action="{{ route('profile.update') }}">

					@csrf
					@method('patch')

					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
								<x-input-error class="mt-2" :messages="$errors->get('name')" />
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
								<x-input-error class="mt-2" :messages="$errors->get('email')" />

                  @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                  <div>
                      <p class="text-sm mt-2 text-gray-800">
                          {{ __('Your email address is unverified!') }}
  
                          <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              {{ __('Click here to re-send the verification email.') }}
                          </button>
                      </p>
  
                      @if (session('status') === 'verification-link-sent')
                          <p class="mt-2 font-medium text-sm text-green-600">
                              {{ __('A new verification link has been sent to your email address.') }}
                          </p>
                      @endif
                  </div>
                  @endif
							</div>
						</div>

					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
            @if (session('status') === 'Profile Updated!')
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

			</div>

      <div class="card card-body border-0 shadow mb-4">
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
      </div>

      <div class="card card-body border-0 shadow mb-4">
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
      </div>

		</div>
	</div>
</x-app-layout>
