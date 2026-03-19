<div class="flex flex-col h-full" wire:poll.3s x-data="voiceRecorder()">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation): ?>
        <!-- Chat Header -->
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-3">
            <a href="<?php echo e(route('messages.index')); ?>" class="md:hidden text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <img class="h-10 w-10 rounded-full object-cover"
                 src="<?php echo e($conversation->avatar_url); ?>"
                 alt="<?php echo e($conversation->display_name); ?>">
            <div class="flex-1">
                <h3 class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e($conversation->display_name); ?></h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation->type === 'group'): ?>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <?php echo e($conversation->activeParticipants()->count()); ?> participants
                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <!-- Messages -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4" id="messages-container">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $isOwnMessage = $msg->user_id === auth()->id(); ?>
                <div class="flex <?php echo e($isOwnMessage ? 'justify-end' : 'justify-start'); ?>">
                    <div class="flex items-end space-x-2 max-w-[75%] <?php echo e($isOwnMessage ? 'flex-row-reverse space-x-reverse' : ''); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isOwnMessage): ?>
                            <img class="h-8 w-8 rounded-full object-cover flex-shrink-0"
                                 src="<?php echo e($msg->user->profile_photo_url); ?>"
                                 alt="<?php echo e($msg->user->name); ?>">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="group">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isOwnMessage && $conversation->type === 'group'): ?>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-1"><?php echo e($msg->user->profile?->display_name ?? $msg->user->name); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="<?php echo e($isOwnMessage ? 'bg-indigo-600 text-white rounded-2xl rounded-br-md' : 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white rounded-2xl rounded-bl-md'); ?> px-4 py-2.5 relative">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($msg->type === 'voice' && $msg->voice_note): ?>
                                    <div class="flex items-center space-x-2">
                                        <button @click="playAudio('<?php echo e(Storage::url($msg->voice_note)); ?>')" class="p-2 rounded-full <?php echo e($isOwnMessage ? 'bg-indigo-500 hover:bg-indigo-400' : 'bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500'); ?> transition-colors">
                                            <svg class="h-4 w-4 <?php echo e($isOwnMessage ? 'text-white' : 'text-gray-700 dark:text-gray-300'); ?>" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </button>
                                        <div class="flex-1">
                                            <div class="h-1 bg-<?php echo e($isOwnMessage ? 'indigo-400' : 'gray-300 dark:bg-gray-500'); ?> rounded-full">
                                                <div class="h-1 bg-<?php echo e($isOwnMessage ? 'white' : 'indigo-500'); ?> rounded-full w-0"></div>
                                            </div>
                                        </div>
                                        <span class="text-xs <?php echo e($isOwnMessage ? 'text-indigo-200' : 'text-gray-500'); ?>">Voice</span>
                                    </div>
                                <?php else: ?>
                                    <p class="text-sm whitespace-pre-wrap"><?php echo e($msg->body); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <!-- Message Reactions -->
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($msg->reactions && $msg->reactions->count() > 0): ?>
                                    <div class="absolute -bottom-2 <?php echo e($isOwnMessage ? 'left-2' : 'right-2'); ?> flex -space-x-1">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $msg->reactions->groupBy('emoji')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emoji => $reactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="inline-flex items-center justify-center h-5 px-1.5 bg-white dark:bg-gray-800 rounded-full text-xs shadow border border-gray-200 dark:border-gray-600" title="<?php echo e($reactions->pluck('user.name')->join(', ')); ?>">
                                                <?php echo e($emoji); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reactions->count() > 1): ?><span class="ml-0.5 text-gray-500"><?php echo e($reactions->count()); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="flex items-center mt-1 <?php echo e($isOwnMessage ? 'justify-end' : 'justify-start'); ?>">
                                <p class="text-xs text-gray-400 dark:text-gray-500">
                                    <?php echo e($msg->created_at->format('g:i A')); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($msg->edited_at): ?>
                                        <span class="italic ml-1">(edited)</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Read Receipts -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($readBy) > 0): ?>
                <div class="flex justify-end">
                    <div class="flex items-center space-x-1 text-xs text-gray-500 dark:text-gray-400">
                        <span>Seen by</span>
                        <div class="flex -space-x-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($readBy, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img class="h-4 w-4 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover"
                                     src="<?php echo e($reader['profile_photo_url'] ?? 'https://ui-avatars.com/api/?name='.urlencode($reader['name'])); ?>"
                                     alt="<?php echo e($reader['name']); ?>"
                                     title="<?php echo e($reader['name']); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($readBy) > 3): ?>
                            <span>+<?php echo e(count($readBy) - 3); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Typing Indicator -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($typingUsers) > 0): ?>
                <div class="flex justify-start">
                    <div class="flex items-center space-x-2">
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-bl-md px-4 py-3">
                            <div class="flex space-x-1">
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0ms"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 150ms"></span>
                                <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 300ms"></span>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($typingUsers) === 1): ?>
                                <?php echo e($typingUsers[0]); ?> is typing...
                            <?php elseif(count($typingUsers) === 2): ?>
                                <?php echo e($typingUsers[0]); ?> and <?php echo e($typingUsers[1]); ?> are typing...
                            <?php else: ?>
                                Several people are typing...
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Message Input -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <form wire:submit="sendMessage" class="flex items-center space-x-2">
                <!-- Attachment Button -->
                <button type="button" class="p-2 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>

                <div class="flex-1 relative">
                    <input wire:model.live.debounce.300ms="message"
                           wire:blur="stopTyping"
                           type="text"
                           placeholder="Type a message..."
                           class="w-full rounded-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pr-10"
                           autocomplete="off">

                    <!-- Emoji Button -->
                    <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Voice Record / Send Button -->
                <template x-if="!isRecording && '<?php echo e(strlen(trim($message))); ?>' === '0'">
                    <button type="button" @click="startRecording" class="inline-flex items-center justify-center p-2.5 rounded-full text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                </template>

                <template x-if="isRecording">
                    <div class="flex items-center space-x-2">
                        <span class="text-red-500 animate-pulse flex items-center">
                            <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                            <span x-text="recordingTime" class="text-sm font-mono"></span>
                        </span>
                        <button type="button" @click="cancelRecording" class="p-2 rounded-full text-gray-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <button type="button" @click="stopRecording" class="inline-flex items-center justify-center p-2.5 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </div>
                </template>

                <template x-if="!isRecording && '<?php echo e(strlen(trim($message))); ?>' !== '0'">
                    <button type="submit" class="inline-flex items-center justify-center p-2.5 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </template>
            </form>
        </div>
    <?php else: ?>
        <!-- No Conversation Selected -->
        <div class="flex-1 flex items-center justify-center">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No conversation selected</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Choose a conversation from the list to start chatting.
                </p>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

    <?php
        $__scriptKey = '2828783038-0';
        ob_start();
    ?>
<script>
    Alpine.data('voiceRecorder', () => ({
        isRecording: false,
        mediaRecorder: null,
        audioChunks: [],
        recordingTime: '0:00',
        recordingInterval: null,
        startTime: null,
        audioPlayer: null,

        async startRecording() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                this.mediaRecorder = new MediaRecorder(stream);
                this.audioChunks = [];

                this.mediaRecorder.ondataavailable = (event) => {
                    this.audioChunks.push(event.data);
                };

                this.mediaRecorder.onstop = () => {
                    const audioBlob = new Blob(this.audioChunks, { type: 'audio/webm' });
                    const reader = new FileReader();
                    reader.readAsDataURL(audioBlob);
                    reader.onloadend = () => {
                        $wire.sendVoiceNote(reader.result);
                    };
                    stream.getTracks().forEach(track => track.stop());
                };

                this.mediaRecorder.start();
                this.isRecording = true;
                this.startTime = Date.now();

                this.recordingInterval = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                    const minutes = Math.floor(elapsed / 60);
                    const seconds = elapsed % 60;
                    this.recordingTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                }, 1000);
            } catch (err) {
                console.error('Error accessing microphone:', err);
                alert('Unable to access microphone. Please check your permissions.');
            }
        },

        stopRecording() {
            if (this.mediaRecorder && this.isRecording) {
                this.mediaRecorder.stop();
                this.isRecording = false;
                clearInterval(this.recordingInterval);
                this.recordingTime = '0:00';
            }
        },

        cancelRecording() {
            if (this.mediaRecorder && this.isRecording) {
                this.mediaRecorder.stream.getTracks().forEach(track => track.stop());
                this.isRecording = false;
                clearInterval(this.recordingInterval);
                this.recordingTime = '0:00';
                this.audioChunks = [];
            }
        },

        playAudio(url) {
            if (this.audioPlayer) {
                this.audioPlayer.pause();
            }
            this.audioPlayer = new Audio(url);
            this.audioPlayer.play();
        }
    }));

    $wire.on('messageSent', () => {
        setTimeout(() => {
            const container = document.getElementById('messages-container');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }, 100);
    });

    // Scroll to bottom on load
    setTimeout(() => {
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    }, 100);
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/livewire/messages/chat-box.blade.php ENDPATH**/ ?>