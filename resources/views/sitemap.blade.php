<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home')  }}</loc>
    </url>

    <url>
        <loc>{{ route('items')  }}</loc>
    </url>

        @if($projects->count())
        @foreach ($projects as $project)
        <url>
            <loc>{{ route('projects.show', ['project' => $project->slug]) }}</loc>
        </url>
        @endforeach
        @endif

    @if($items->count())
        @foreach ($items as $item)
        <url>
            <loc>{{ route('items.show', ['item' => $item->slug]) }}</loc>
        </url>
        @endforeach
        @endif
</urlset>
