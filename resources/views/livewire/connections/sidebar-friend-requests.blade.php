<div>
    @if($pendingRequests->count() > 0)
        <x-ui.card>
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-surface-900 dark:text-surface-100">Friend Requests</h4>
                <span class="text-xs font-bold bg-red-500 text-white px-2 py-0.5 rounded-full">{{ $pendingRequests->count() }}</span>
            </div>
            <div class="space-y-4">
                @foreach($pendingRequests->take(3) as $request)
                    @php $from = $request->user; @endphp
                    @if($from)
                        <div class="flex items-start gap-3">
                            <img src="{{ $from->profile_photo_url ?? ('https://ui-avatars.com/api/?name=' . urlencode($from->name)) }}" alt="{{ $from->name }}" class="w-12 h-12 rounded-xl object-cover">
                            <div class="flex-1 min-w-0">
                                <a wire:navigate href="{{ route('profile.view', $from) }}" class="font-medium text-surface-900 dark:text-surface-100 hover:text-primary-600 dark:hover:text-primary-400">
                                    {{ $from->name }}
                                </a>
                                <p class="text-xs text-surface-500 mb-2">{{ $from->mutual_friends_count ?? 0 }} mutual friends</p>
                                <div class="flex gap-2">
                                    <button wire:click="acceptRequest({{ $request->id }})" type="button" class="flex-1 px-3 py-1.5 text-xs font-medium bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors">
                                        Accept
                                    </button>
                                    <button wire:click="declineRequest({{ $request->id }})" type="button" class="flex-1 px-3 py-1.5 text-xs font-medium bg-surface-200 dark:bg-surface-700 text-surface-700 dark:text-surface-300 rounded-lg hover:bg-surface-300 dark:hover:bg-surface-600 transition-colors">
                                        Decline
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if($pendingRequests->count() > 3)
                <a wire:navigate href="{{ route('friends.requests') }}" class="block w-full text-center py-2.5 mt-4 text-sm font-medium text-primary-600 dark:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-xl transition-colors">
                    See All Requests
                </a>
            @endif
        </x-ui.card>
    @endif
</div>
