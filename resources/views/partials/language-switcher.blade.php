<div class="flex items-center gap-0.5 text-sm font-medium text-gray-400" role="group" aria-label="{{ __('Language Switcher') }}">
    <a href="{{ route('language.switch', 'id') }}" 
       class="px-2.5 py-1 rounded transition-colors {{ app()->getLocale() === 'id' ? 'text-gray-900' : 'hover:text-gray-700' }}"
       aria-pressed="{{ app()->getLocale() === 'id' ? 'true' : 'false' }}">ID</a>
    <span class="text-gray-300">/</span>
    <a href="{{ route('language.switch', 'en') }}" 
       class="px-2.5 py-1 rounded transition-colors {{ app()->getLocale() === 'en' ? 'text-gray-900' : 'hover:text-gray-700' }}"
       aria-pressed="{{ app()->getLocale() === 'en' ? 'true' : 'false' }}">EN</a>
</div>