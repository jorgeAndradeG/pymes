<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre(*)')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email(*)')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña(*)')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña(*)')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

             <!-- Dirección -->
             <div class="mt-4">
                <x-label for="direccion" :value="__('Direccion')" />

                <x-input id="direccion" class="block mt-1 w-full"
                                type="text"
                                name="direccion" />
            </div>

             <!-- Ciudad -->
             <div class="mt-4">
                <x-label for="ciudad" :value="__('Ciudad')" />

                <x-input id="ciudad" class="block mt-1 w-full"
                                type="text"
                                name="ciudad" />
            </div>

            <!-- Teléfono -->
            <div class="mt-4">
                <x-label for="telefono" :value="__('Telefono')" />

                <x-input id="telefono" class="block mt-1 w-full"
                                type="number"
                                name="telefono" placeholder="987654321"/>
            </div>

           

            <!-- Instagram -->
            <div class="mt-4">
                <x-label for="instagram" :value="__('Instagram')" />

                <x-input id="instagram" class="block mt-1 w-full"
                                type="text"
                                name="instagram" placeholder="@usuario"/>
            </div>

            <!-- Facebook -->
            <div class="mt-4">
                <x-label for="facebook" :value="__('Facebook')" />

                <x-input id="facebook" class="block mt-1 w-full"
                                type="text"
                                name="facebook" placeholder="facebook.com/usuario"/>
            </div>

            <div class="mt-4">
            <p style="color:gray"><i>(*) Campos Obligatorios<i></p>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
