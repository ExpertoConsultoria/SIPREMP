@props(['color' => 'blue', 'disabled' => false])
@php
switch ($color) {
    case 'ligth':
        $bg         =   'bg-white dark:bg-gray-200';
        $text       =   'dark:text-white';
        $hoverActive=   'hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300';
        $focus      =   'focus:ring-indigo-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    case 'gray':
        $bg         =   'bg-gray-800 dark:bg-gray-200';
        $text       =   'text-white dark:text-gray-800';
        $hoverActive=   'hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300';
        $focus      =   'focus:ring-indigo-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    case 'dark':
        $bg         =   'bg-gray-800 dark:bg-gray-400';
        $text       =   'text-white dark:text-gray-800';
        $hoverActive=   'hover:bg-gray-900 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300';
        $focus      =   'focus:ring-indigo-500';
        $darkFocus  =   'dark:hover:bg-white dark:focus:ring-offset-gray-800';
        break;
    case 'red':
        $bg         =   'bg-red-500';
        $text       =   'text-white';
        $hoverActive=   'hover:bg-red-700 active:bg-red-700';
        $focus      =   'focus:ring-red-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    case 'yellow':
        $bg         =   'bg-yellow-500';
        $text       =   'text-white dark:text-gray-300';
        $hoverActive=   'hover:bg-yellow-700 active:bg-yellow-700';
        $focus      =   'focus:ring-yellow-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    case 'green':
        $bg         =   'bg-green-500';
        $text       =   'text-white';
        $hoverActive=   'hover:bg-green-700 active:bg-green-700';
        $focus      =   'focus:ring-green-500';
        $darkFocus  =   'dark:text-gray-300 dark:focus:ring-offset-gray-300';
        break;
    case 'pink':
        $bg         =   'bg-pink-600';
        $text       =   'text-white dark:text-gray-300';
        $hoverActive=   'hover:bg-pink-500 active:bg-pink-700';
        $focus      =   'focus:ring-pink-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    case 'purple':
        $bg         =   'bg-purple-600';
        $text       =   'text-white';
        $hoverActive=   'hover:bg-purple-500 active:bg-purple-700';
        $focus      =   'focus:ring-purple-500';
        $darkFocus  =   'dark:text-gray-300 dark:focus:ring-offset-gray-800';
        break;
    case 'indigo':
        $bg         =   'bg-indigo-500';
        $text       =   'text-white dark:text-gray-300';
        $hoverActive=   'hover:bg-indigo-700 active:bg-indigo-700';
        $focus      =   'focus:ring-indigo-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
    default:
        $bg         =   'bg-blue-600';
        $text       =   'text-white dark:text-gray-300';
        $hoverActive=   'hover:bg-blue-500 active:bg-blue-700';
        $focus      =   'focus:ring-blue-500';
        $darkFocus  =   'dark:focus:ring-offset-gray-800';
        break;
}
// https://tailwindcss.com/docs/customizing-colors
    //      Gray,               Slate , Zinc ,  Neutral , Stone ,
    //      Red, Yellow,        Orange, Amber ,
    //      Green,              Lime, Emerald, Teal
    //      Blue, Indigo,       Cyan, Sky,
    //      Purple, Pink,       Violet, Fuchsia, Rose,
@endphp

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'disabled:opacity-25 transition-all active:translate-y-1 inline-flex items-center justify-center px-4 py-2 '
                .$bg.' border border-transparent rounded-md font-semibold text-xs '
                .$text.' uppercase tracking-widest '
                .$hoverActive.' focus:outline-none focus:ring-2 '
                .$focus.' focus:ring-offset-2 '
                .$darkFocus.' transition ease-in-out duration-150'
    ]) }}
    {{ $disabled ?? false ? ' disabled' : '' }} >
    {{ $slot }}
</button>
