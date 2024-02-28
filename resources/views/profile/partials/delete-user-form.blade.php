<section>
    <header>
        <h2 class="h5 mb-4">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    {{-- <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>
    

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal> --}}

    <button onclick="confirmUserDeletion()" class="btn btn-danger">Delete Account</button>
  
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">Are you sure you want to delete your account?</h5>
                        <button onclick="closeModal()" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <p>
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                        </p>
    
                        <div class="mt-3">
                            <label for="password" class="sr-only">Password</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="Password"
                            />
                            <div id="passwordError" class="mt-2" style="color:red;"></div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button onclick="closeModal()" class="btn btn-secondary" aria-label="Close">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function confirmUserDeletion() {
            $('#confirmUserDeletionModal').modal('show');
        }
        function closeModal() {
          // Logic to close the modal
          $('#confirmUserDeletionModal').modal('hide');
        }
        // Assume you have a JavaScript variable containing the error message
        var passwordErrorMessage = "<?php echo addslashes($errors->userDeletion->get('password')[0] ?? ''); ?>";

        // Display the error message if it exists
        if (passwordErrorMessage) {
            document.getElementById('passwordError').innerHTML = passwordErrorMessage;
        }
    </script>
  
  
</section>
