<?php

namespace App\Http\Livewire\Welcome;

use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Feedback extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortBy = 'top';
    public string $filter = 'all_not_completed';

    protected $queryString = [
        'page' => ['except' => 1, 'as' => 'page'],
        'search' => ['except' => '', 'as' => 'search'],
        'sortBy' => ['except' => 'top', 'as' => 'sortBy'],
        'filter' => ['except' => 'all_not_completed', 'as' => 'filter'],
    ];

    public function resetPage($pageName = 'page'): void
    {
        $this->setPage(1, $pageName);

        $this->dispatchBrowserEvent('scroll-to-top');
    }

    public function toggleUpvote(): void
    {
        $this->item->toggleUpvote();
        $this->item = $this->item->refresh();
    }

    protected function getSortingColumn(): string
    {
        return match ($this->sortBy) {
            'newest' => 'created_at',
            default => 'total_votes',
        };
    }

    protected function getStatusColumn(): string|bool
    {
        return match ($this->filter) {
            'planned' => 'Planned',
            'in_progress' => 'In Progress',
            'completed' => 'Completed',
            default => false
        };
    }

    public function render(): View
    {
        $items = Item::query()
            ->with('board')
            ->withCount('comments')
            ->visibleForCurrentUser()
            ->latest($this->getSortingColumn())
            ->when($this->search, function (Builder $query) {
                $query->where('title', 'like', "%$this->search%");
            })
            ->when($this->filter === 'all_not_completed', function (Builder $query) {
                $query->whereDoesntHave('board', function (Builder $query) {
                    $query->where('title', 'Completed');
                });
            })
            ->when($this->filter === 'suggested', function (Builder $query) {
                $query->whereDoesntHave('board');
            })
            ->when($this->filter === 'my' && !Auth::guest(), function (Builder $query) {
                $query->where('user_id', Auth::id());
            })
            ->when($this->getStatusColumn(), function (Builder $query, $status) {
                $query->whereHas('board', function (Builder $query) use ($status) {
                    $query->where('title', $status);
                });
            })
            ->paginate(25);

        return view('livewire.feedback.feedback', [
            'items' => $items,
        ]);
    }
}
