<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Closure;
use Filament\Tables;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;

class Items extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Item::query()->with('board.project');
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 20, 30, 40, 50, 60];
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')->wrap()->label(trans('table.title'))->searchable(),
            Tables\Columns\TextColumn::make('total_votes')->label(trans('table.total-votes'))->sortable(),
            Tables\Columns\TextColumn::make('project.title')->label(trans('table.project')),
            Tables\Columns\TextColumn::make('board.title')->label(trans('table.board')),
            Tables\Columns\TextColumn::make('created_at')
                ->label(trans('table.created_at'))
                ->sortable()
                ->formatStateUsing(fn(Carbon|string $state) => (is_string($state) ? Carbon::parse($state) : $state)->isoFormat('L LTS')),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return function ($record) {
            if (!$record->board) {
                return route('items.show', $record);
            }

            if (!$record->project) {
                return route('items.show', $record);
            }

            return route('projects.items.show', [$record->project, $record]);
        };
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    public function render()
    {
        return view('livewire.items');
    }
}
