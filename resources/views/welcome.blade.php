<x-app>
    @if($text = app(\App\Settings\GeneralSettings::class)->welcome_text)
        <div class="prose mb-4">{!! $text !!}</div>
    @endif
        <div class="my-5">
            <div class="flex flex-col justify-center">
                <div class="dark:text-white text-lg font-semibold">Join our community 👇</div>
                <div class="flex items-center space-x-4 mt-1">
                    <a href="https://discord.gg/5YdseZnK2Z" target="_blank" rel="nofollow noopener" class="flex items-center text-blue-500 hover:text-blue-600 transition-colors ease-in-out duration-200">
                        <svg class="w-6 h-6 !w-5 !h-5 text-discord mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z"></path></svg>
                        Discord
                    </a>
                    <a href="https://www.facebook.com/groups/inovector" target="_blank" rel="nofollow noopener" class="flex items-center text-blue-500 hover:text-blue-600 transition-colors ease-in-out duration-200">
                        <svg class="w-6 h-6 !w-5 !h-5 text-facebook mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                        Facebook Private Group
                    </a>
                </div>
            </div>
        </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        @foreach(app(\App\Settings\GeneralSettings::class)->dashboard_items as $item)
            <div class="space-y-2 col-span-{{ $item['column_span'] ?? 1 }}">
                <h2 class="text-lg tracking-tight font-bold">{{ trans('general.'. $item['type']) }}</h2>

                <livewire:is component="welcome.{{ $item['type'] }}"/>
            </div>
        @endforeach
    </div>
</x-app>
