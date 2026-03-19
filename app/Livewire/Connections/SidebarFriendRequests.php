<?php

namespace App\Livewire\Connections;

use Livewire\Component;

class SidebarFriendRequests extends Component
{
    public function acceptRequest($connectionId)
    {
        $request = auth()->user()->receivedConnections()
            ->friends()
            ->pending()
            ->where('id', $connectionId)
            ->first();

        if ($request) {
            $request->accept();
            $this->dispatch('friend-request-accepted');
        }
    }

    public function declineRequest($connectionId)
    {
        $request = auth()->user()->receivedConnections()
            ->friends()
            ->pending()
            ->where('id', $connectionId)
            ->first();

        if ($request) {
            $request->decline();
            $this->dispatch('friend-request-declined');
        }
    }

    public function render()
    {
        $pendingRequests = auth()->user()->pendingFriendRequests();

        return view('livewire.connections.sidebar-friend-requests', [
            'pendingRequests' => $pendingRequests,
        ]);
    }
}
