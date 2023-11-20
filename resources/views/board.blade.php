@section('title', $project->title . ' - ' . $board->title)@show
@section('image', $board->getOgImage($board->description, 'Roadmap - Board'))@show
@section('description', $board->description)@show

<x-app :breadcrumbs="[
    ['title' => $project->title, 'url' => route('projects.show', $project)],
    ['title' => $board->title, 'url' => '']
]">
    <main class="h-full flex space-x-10">
        <x-card>
            <section class="flex-1">
                <livewire:project.items :project="$project" :board="$board"/>
            </section>
        </x-card>

        @if($board->canUsersCreateItem())
            <section class="w-96 sticky top-0">
                <div class="bg-white rounded-lg shadow p-5">
                    <livewire:item.create :project="$project" :board="$board"/>
                </div>
            </section>
        @endif
    </main>
</x-app>
