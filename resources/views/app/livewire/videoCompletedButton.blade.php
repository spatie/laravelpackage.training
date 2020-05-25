<div>
    @if ($video->hasBeenCompletedByCurrentUser())
        <button wire:click="toggleCompleted" class="button complete">
            Mark as completed
        </button>
    @else
        <button wire:click="toggleCompleted" class="button bg-green-500 hover:bg-green-600">
            <i class="fas fa-check mr-1"></i> Completed
        </button>
    @endif
</div>
