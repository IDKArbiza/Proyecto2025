<div class="max-w-md mx-auto mt-10">
    <form wire:submit.prevent="login" class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Iniciar sesión</h2>

        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <input type="email" wire:model="email" placeholder="Correo" class="w-full mb-3 p-2 border rounded">

        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <input type="password" wire:model="password" placeholder="Contraseña" class="w-full mb-3 p-2 border rounded">

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Entrar</button>
    </form>
</div>
