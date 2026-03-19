@auth
<div class="lg:col-span-3 space-y-6">
    <!-- Friend Requests (Livewire so Accept/Decline work) -->
    @livewire('connections.sidebar-friend-requests')

    <!-- People You May Know -->
    <x-ui.card>
        <div class="flex items-center justify-between mb-4">
            <h4 class="font-semibold text-surface-900 dark:text-surface-100">People You May Know</h4>
        </div>
        @livewire('suggestions.friend-suggestions')
    </x-ui.card>

    <!-- Upcoming Events -->
    <x-ui.card>
        <div class="flex items-center justify-between mb-4">
            <h4 class="font-semibold text-surface-900 dark:text-surface-100">Upcoming Events</h4>
            <a wire:navigate href="{{ route('events.index') }}" class="text-sm text-primary-600 dark:text-primary-400 hover:underline">See all</a>
        </div>
        <p class="text-sm text-surface-500 dark:text-surface-400 text-center py-4">No upcoming events</p>
    </x-ui.card>

    <!-- Trending Topics -->
    <x-ui.card>
        <div class="flex items-center justify-between mb-4">
            <h4 class="font-semibold text-surface-900 dark:text-surface-100">Trending</h4>
        </div>
        @livewire('suggestions.trending')
    </x-ui.card>

    <!-- Footer Links -->
    <div class="text-xs text-surface-500 space-y-2 px-2">
        <div class="flex flex-wrap gap-x-2 gap-y-1">
            <a wire:navigate href="#" class="hover:underline">About</a>
            <a wire:navigate href="#" class="hover:underline">Privacy</a>
            <a wire:navigate href="#" class="hover:underline">Terms</a>
            <a wire:navigate href="#" class="hover:underline">Help</a>
        </div>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}</p>
    </div>
</div>
@endauth
