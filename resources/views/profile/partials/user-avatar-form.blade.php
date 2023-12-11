
<style>
    img{
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }
</style>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>

        <img src="/storage/{{$user->avatar}}" alt="user avatar""/>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or update user avatar
        </p>
    </header>

    @if (session('message'))
        <p class="text-red-500">
            {{ session('message') }}
        </p>
    @endif
    <form action="/profile/avatar" enctype="multipart/form-data" method="post" class="mt-6 space-y-6">
        @method('patch')
        @csrf

        <div>
            <x-input-label for="avatar" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                 autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
